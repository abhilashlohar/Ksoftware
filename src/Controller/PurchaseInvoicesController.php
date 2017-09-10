<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PurchaseInvoices Controller
 *
 * @property \App\Model\Table\PurchaseInvoicesTable $PurchaseInvoices
 *
 * @method \App\Model\Entity\PurchaseInvoice[] paginate($object = null, array $settings = [])
 */
class PurchaseInvoicesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['PartyLedgers', 'PurchaseLedgers', 'Companies']
        ];
        $purchaseInvoices = $this->paginate($this->PurchaseInvoices);

        $this->set(compact('purchaseInvoices'));
        $this->set('_serialize', ['purchaseInvoices']);
    }

    /**
     * View method
     *
     * @param string|null $id Purchase Invoice id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $purchaseInvoice = $this->PurchaseInvoices->get($id, [
            'contain' => ['PartyLedgers', 'PurchaseLedgers', 'Companies', 'PurchaseInvoiceRows']
        ]);

        $this->set('purchaseInvoice', $purchaseInvoice);
        $this->set('_serialize', ['purchaseInvoice']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
		$company_id=$this->Auth->User('company')->id;
		$company_state_id=$this->Auth->User('company')->state_id;
		$this->viewBuilder()->layout('index_layout');
        
        $purchaseInvoice = $this->PurchaseInvoices->newEntity();
        if ($this->request->is('post')) {
            $purchaseInvoice = $this->PurchaseInvoices->patchEntity($purchaseInvoice, $this->request->getData());
			
			$Voucher_no = $this->PurchaseInvoices->find()->select(['voucher_no'])->where(['PurchaseInvoices.company_id'=>$company_id])->order(['PurchaseInvoices.voucher_no' => 'DESC'])->first();
			if($Voucher_no){
				$voucher_no=$Voucher_no->voucher_no+1;
			}else{
				$voucher_no=1;
			}
			$purchaseInvoice->voucher_no=$voucher_no;			
			$purchaseInvoice->company_id= $company_id;
			pr($purchaseInvoice); exit;
			
            if ($this->PurchaseInvoices->save($purchaseInvoice)) {
                $this->Flash->success(__('The purchase invoice has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The purchase invoice could not be saved. Please, try again.'));
        }
		
		//FETCH PARTY LEDGERS START//
		$partyParentGroups = $this->PurchaseInvoices->PartyLedgers->AccountingGroups->find()
						->where(['AccountingGroups.company_id'=>$company_id, 'AccountingGroups.purchase_invoice_party'=>1]);
		$partyGroups=[]; $partyLedgers = [];
		foreach($partyParentGroups as $partyParentGroup)
		{
			$partyChildGroups = $this->PurchaseInvoices->PartyLedgers->AccountingGroups->find('children', ['for' => $partyParentGroup->id])->toArray();
			$partyGroups[]=$partyParentGroup->id;
			foreach($partyChildGroups as $partyChildGroup){
				$partyGroups[]=$partyChildGroup->id;
			}
		}
		if($partyGroups)
		{
			$partyLedgers = $this->PurchaseInvoices->PartyLedgers->find('list')
							->where(['PartyLedgers.accounting_group_id IN' =>$partyGroups,'PartyLedgers.company_id'=>$company_id]);
		}
		//FETCH PARTY LEDGERS END//				
		//FETCH Purchase LEDGERS START//
		$purchaseParentGroups = $this->PurchaseInvoices->PurchaseLedgers->AccountingGroups->find()
						->where(['AccountingGroups.company_id'=>$company_id, 'AccountingGroups.	purchase_invoice_purchase_acc'=>1]);
		
		$purchaseGroups=[]; $purchaseLedgers = [];
		foreach($purchaseParentGroups as $purchaseParentGroup)
		{
			$purchaseChildGroups = $this->PurchaseInvoices->PurchaseLedgers->AccountingGroups->find('children', ['for' => $purchaseParentGroup->id])->toArray();
			$purchaseGroups[]=$purchaseParentGroup->id;
			foreach($purchaseChildGroups as $purchaseChildGroup){
				$purchaseGroups[]=$purchaseChildGroup->id;
			}
		}
		if($purchaseGroups)
		{
			$purchaseLedgers = $this->PurchaseInvoices->PurchaseLedgers->find('list')
							->where(['PurchaseLedgers.accounting_group_id IN' =>$purchaseGroups,'PurchaseLedgers.company_id'=>$company_id]);			
		}

		//FETCH SALES LEDGERS END//
		
		$cgstLedgers=$this->PurchaseInvoices->PurchaseInvoiceRows->CgstLedgers->find()
						->where(['CgstLedgers.tax_type'=>'CGST', 'CgstLedgers.input_output'=>'input'])
						->order(['CgstLedgers.percentage_of_calculation'=>'ASC']);
		$cgstLedgerOptions=[];
		foreach($cgstLedgers as $cgstLedger){
			$cgstLedgerOptions[]=['text'=>$cgstLedger->percentage_of_calculation.'%', 'value'=>$cgstLedger->id, 'percentage_of_calculation'=>$cgstLedger->percentage_of_calculation];
		}
		
		$sgstLedgers=$this->PurchaseInvoices->PurchaseInvoiceRows->SgstLedgers->find()
						->where(['SgstLedgers.tax_type'=>'SGST', 'SgstLedgers.input_output'=>'input'])
						->order(['SgstLedgers.percentage_of_calculation'=>'ASC']);
		$sgstLedgerOptions=[];
		foreach($sgstLedgers as $sgstLedger){
			$sgstLedgerOptions[]=['text'=>$sgstLedger->percentage_of_calculation.'%', 'value'=>$sgstLedger->id, 'percentage_of_calculation'=>$sgstLedger->percentage_of_calculation];
		}
		
		$igstLedgers=$this->PurchaseInvoices->PurchaseInvoiceRows->IgstLedgers->find()
						->where(['IgstLedgers.tax_type'=>'CGST', 'IgstLedgers.input_output'=>'input'])
						->order(['IgstLedgers.percentage_of_calculation'=>'ASC']);
		$igstLedgerOptions=[];
		foreach($igstLedgers as $igstLedger){
			$igstLedgerOptions[]=['text'=>$igstLedger->percentage_of_calculation.'%', 'value'=>$igstLedger->id, 'percentage_of_calculation'=>$igstLedger->percentage_of_calculation];
		}		
		
		
		
		$items = $this->PurchaseInvoices->PurchaseInvoiceRows->Items->find('list');
        $companies = $this->PurchaseInvoices->Companies->find('list');
        $this->set(compact('purchaseInvoice','partyLedgers','purchaseLedgers','companies','items' ,'cgstLedgerOptions','sgstLedgerOptions','igstLedgerOptions','company_state_id'));
        $this->set('_serialize', ['purchaseInvoice']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Purchase Invoice id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $purchaseInvoice = $this->PurchaseInvoices->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $purchaseInvoice = $this->PurchaseInvoices->patchEntity($purchaseInvoice, $this->request->getData());
            if ($this->PurchaseInvoices->save($purchaseInvoice)) {
                $this->Flash->success(__('The purchase invoice has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The purchase invoice could not be saved. Please, try again.'));
        }
        $partyLedgers = $this->PurchaseInvoices->PartyLedgers->find('list', ['limit' => 200]);
        $purchaseLedgers = $this->PurchaseInvoices->PurchaseLedgers->find('list', ['limit' => 200]);
        $companies = $this->PurchaseInvoices->Companies->find('list', ['limit' => 200]);
        $this->set(compact('purchaseInvoice', 'partyLedgers', 'purchaseLedgers', 'companies'));
        $this->set('_serialize', ['purchaseInvoice']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Purchase Invoice id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $purchaseInvoice = $this->PurchaseInvoices->get($id);
        if ($this->PurchaseInvoices->delete($purchaseInvoice)) {
            $this->Flash->success(__('The purchase invoice has been deleted.'));
        } else {
            $this->Flash->error(__('The purchase invoice could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
