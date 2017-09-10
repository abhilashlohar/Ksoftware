<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SalesInvoices Controller
 *
 * @property \App\Model\Table\SalesInvoicesTable $SalesInvoices
 *
 * @method \App\Model\Entity\SalesInvoice[] paginate($object = null, array $settings = [])
 */
class SalesInvoicesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['PartyLedgers', 'SalesLedgers']
        ];
        $salesInvoices = $this->paginate($this->SalesInvoices);

        $this->set(compact('salesInvoices'));
        $this->set('_serialize', ['salesInvoices']);
    }

    /**
     * View method
     *
     * @param string|null $id Sales Invoice id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $salesInvoice = $this->SalesInvoices->get($id, [
            'contain' => ['PartyLedgers', 'SaleLedgers', 'SalesInvoiceRows']
        ]);

        $this->set('salesInvoice', $salesInvoice);
        $this->set('_serialize', ['salesInvoice']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
		$company_id=$this->Auth->User('company')->id;
		$this->viewBuilder()->layout('index_layout');
        $salesInvoice = $this->SalesInvoices->newEntity();
        if ($this->request->is('post')) {
            $salesInvoice = $this->SalesInvoices->patchEntity($salesInvoice, $this->request->getData());
			
			$Voucher_no = $this->SalesInvoices->find()->select(['voucher_no'])->where(['SalesInvoices.company_id'=>$company_id])->order(['SalesInvoices.voucher_no' => 'DESC'])->first();
			if($Voucher_no){
				$voucher_no=$Voucher_no->voucher_no+1;
			}else{
				$voucher_no=1;
			}
			$salesInvoice->voucher_no=$voucher_no;
		
            if ($this->SalesInvoices->save($salesInvoice)) {
                $this->Flash->success(__('The sales invoice has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sales invoice could not be saved. Please, try again.'));
        }
		//FETCH PARTY LEDGERS START//
		$partyParentGroups = $this->SalesInvoices->PartyLedgers->AccountingGroups->find()
						->where(['AccountingGroups.company_id'=>$company_id, 'AccountingGroups.sale_invoice_party'=>1]);
		
		$partyGroups=[]; $partyLedgers = [];
		foreach($partyParentGroups as $partyParentGroup)
		{
			$partyChildGroups = $this->SalesInvoices->PartyLedgers->AccountingGroups->find('children', ['for' => $partyParentGroup->id])->toArray();
			$partyGroups[]=$partyParentGroup->id;
			foreach($partyChildGroups as $partyChildGroup){
				$partyGroups[]=$partyChildGroup->id;
			}
		}
		if($partyGroups)
		{
			$partyLedgers = $this->SalesInvoices->PartyLedgers->find('list')
							->where(['PartyLedgers.accounting_group_id IN' =>$partyGroups,'PartyLedgers.company_id'=>$company_id]);
		}
		//FETCH PARTY LEDGERS END//
		
		
		//FETCH SALES LEDGERS START//
		$salesParentGroups = $this->SalesInvoices->SalesLedgers->AccountingGroups->find()
						->where(['AccountingGroups.company_id'=>$company_id, 'AccountingGroups.sale_invoice_sales_acc'=>1]);
		
		$salesGroups=[]; $salesLedgers = [];
		foreach($salesParentGroups as $salesParentGroup)
		{
			$salesChildGroups = $this->SalesInvoices->SalesLedgers->AccountingGroups->find('children', ['for' => $salesParentGroup->id])->toArray();
			$salesGroups[]=$salesParentGroup->id;
			foreach($salesChildGroups as $salesChildGroup){
				$salesGroups[]=$salesChildGroup->id;
			}
		}
		if($salesGroups)
		{
			$salesLedgers = $this->SalesInvoices->SalesLedgers->find('list')
							->where(['SalesLedgers.accounting_group_id IN' =>$salesGroups,'SalesLedgers.company_id'=>$company_id]);			
		}

		//FETCH SALES LEDGERS END//
		
		$cgstLedgers=$this->SalesInvoices->SalesInvoiceRows->CgstLedgers->find()
						->where(['CgstLedgers.tax_type'=>'CGST', 'CgstLedgers.input_output'=>'output']);
		$items = $this->SalesInvoices->SalesInvoiceRows->Items->find('list');
		pr($cgstLedgers->toArray()); exit;
        $this->set(compact('salesInvoice', 'partyLedgers', 'salesLedgers', 'items', 'cgstLedgers'));
        $this->set('_serialize', ['salesInvoice']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Sales Invoice id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $salesInvoice = $this->SalesInvoices->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $salesInvoice = $this->SalesInvoices->patchEntity($salesInvoice, $this->request->getData());
            if ($this->SalesInvoices->save($salesInvoice)) {
                $this->Flash->success(__('The sales invoice has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sales invoice could not be saved. Please, try again.'));
        }
        $partyLedgers = $this->SalesInvoices->PartyLedgers->find('list', ['limit' => 200]);
        $saleLedgers = $this->SalesInvoices->SaleLedgers->find('list', ['limit' => 200]);
        $this->set(compact('salesInvoice', 'partyLedgers', 'saleLedgers'));
        $this->set('_serialize', ['salesInvoice']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Sales Invoice id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $salesInvoice = $this->SalesInvoices->get($id);
        if ($this->SalesInvoices->delete($salesInvoice)) {
            $this->Flash->success(__('The sales invoice has been deleted.'));
        } else {
            $this->Flash->error(__('The sales invoice could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
