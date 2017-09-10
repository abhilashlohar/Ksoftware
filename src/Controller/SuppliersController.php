<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Suppliers Controller
 *
 * @property \App\Model\Table\SuppliersTable $Suppliers
 *
 * @method \App\Model\Entity\Supplier[] paginate($object = null, array $settings = [])
 */
class SuppliersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
		$company_id=$this->Auth->User('company')->id;
		$this->viewBuilder()->layout('index_layout');
        $this->paginate = [
            'contain' => ['States', 'Companies']
        ];
        $suppliers = $this->paginate($this->Suppliers->find()->where(['company_id'=>$company_id]));

        $this->set(compact('suppliers'));
        $this->set('_serialize', ['suppliers']);
    }

    /**
     * View method
     *
     * @param string|null $id Supplier id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $supplier = $this->Suppliers->get($id, [
            'contain' => ['States', 'Companies']
        ]);

        $this->set('supplier', $supplier);
        $this->set('_serialize', ['supplier']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
		$this->viewBuilder()->layout('index_layout');
		$company_id=$this->Auth->User('company')->id;
		
        $supplier = $this->Suppliers->newEntity();
        if ($this->request->is('post')) {
            $supplier = $this->Suppliers->patchEntity($supplier, $this->request->getData());
			$supplier->company_id=$company_id;
            if ($this->Suppliers->save($supplier)) {
				
				//Create Ledger//
				$AccountingGroup=$this->Suppliers->Ledgers->AccountingGroups->find()->where(['supplier'=>1,'company_id'=>$company_id])->first();
				
				$ledger = $this->Suppliers->Ledgers->newEntity();
				$ledger->name = $supplier->name;
				$ledger->accounting_group_id = $AccountingGroup->id;
				$ledger->company_id=$company_id;
				$ledger->supplier_id=$supplier->id;
				$this->Suppliers->Ledgers->save($ledger);
				
                $this->Flash->success(__('The supplier has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The supplier could not be saved. Please, try again.'));
        }
        $states = $this->Suppliers->States->find('list', ['limit' => 200]);
        $companies = $this->Suppliers->Companies->find('list', ['limit' => 200]);
        $this->set(compact('supplier', 'states', 'companies'));
        $this->set('_serialize', ['supplier']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Supplier id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
		$this->viewBuilder()->layout('index_layout');
		$company_id=$this->Auth->User('company')->id;
		
        $supplier = $this->Suppliers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $supplier = $this->Suppliers->patchEntity($supplier, $this->request->getData());
            if ($this->Suppliers->save($supplier)) {
				
				//Update ledger
				$ledger = $this->Suppliers->Ledgers->query();
				$ledger->update()
						->set(['name' =>$supplier->name])
						->where(['company_id' => $company_id,'supplier_id'=>$supplier->id])
						->execute();
						
						
                $this->Flash->success(__('The supplier has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The supplier could not be saved. Please, try again.'));
        }
        $states = $this->Suppliers->States->find('list', ['limit' => 200]);
        $companies = $this->Suppliers->Companies->find('list', ['limit' => 200]);
        $this->set(compact('supplier', 'states', 'companies'));
        $this->set('_serialize', ['supplier']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Supplier id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $supplier = $this->Suppliers->get($id);
        if ($this->Suppliers->delete($supplier)) {
            $this->Flash->success(__('The supplier has been deleted.'));
        } else {
            $this->Flash->error(__('The supplier could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
