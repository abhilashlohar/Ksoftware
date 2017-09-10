<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Customers Controller
 *
 * @property \App\Model\Table\CustomersTable $Customers
 *
 * @method \App\Model\Entity\Customer[] paginate($object = null, array $settings = [])
 */
class CustomersController extends AppController
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
        $customers = $this->paginate($this->Customers->find()->where(['company_id'=>$company_id]));

        $this->set(compact('customers'));
        $this->set('_serialize', ['customers']);
    }

    /**
     * View method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
		$this->viewBuilder()->layout('index_layout');
        $customer = $this->Customers->get($id, [
            'contain' => ['States', 'Companies']
        ]);

        $this->set('customer', $customer);
        $this->set('_serialize', ['customer']);
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
        $customer = $this->Customers->newEntity();
        if ($this->request->is('post')) {
            $customer = $this->Customers->patchEntity($customer, $this->request->getData());
			$customer->company_id=$company_id;
            if ($this->Customers->save($customer)) {
				
				//Create Ledger//
				$ledger = $this->Customers->Ledgers->newEntity();
				$ledger->name = $customer->name;
				$ledger->accounting_group_id = $customer->accounting_group_id;
				$ledger->company_id=$company_id;
				$ledger->customer_id=$customer->id;
				$this->Customers->Ledgers->save($ledger);
				
                $this->Flash->success(__('The customer has been created.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The customer could not be saved. Please, try again.'));
        }
		$SundryDebtor = $this->Customers->Ledgers->AccountingGroups->find()->where(['customer'=>1,'company_id'=>$company_id])->first();
		$accountingGroups = $this->Customers->Ledgers->AccountingGroups
							->find('children', ['for' => $SundryDebtor->id])
							->find('List')->toArray();
		$accountingGroups[$SundryDebtor->id]=$SundryDebtor->name;
		ksort($accountingGroups);
		
        $states = $this->Customers->States->find('list', ['limit' => 200]);
        $this->set(compact('customer', 'states', 'companies', 'accountingGroups'));
        $this->set('_serialize', ['customer']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
		$this->viewBuilder()->layout('index_layout');
		$company_id=$this->Auth->User('company')->id;
		
        $customer = $this->Customers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $customer = $this->Customers->patchEntity($customer, $this->request->getData());
            if ($this->Customers->save($customer)) {
				
				//Update ledger
				$ledger = $this->Customers->Ledgers->query();
				$ledger->update()
						->set(['name' =>$customer->name])
						->where(['company_id' => $company_id,'customer_id'=>$customer->id])
						->execute();
							
							
                $this->Flash->success(__('The customer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The customer could not be saved. Please, try again.'));
        }
		
		$SundryDebtor = $this->Customers->Ledgers->AccountingGroups->find()->where(['customer'=>1,'company_id'=>$company_id])->first();
		$accountingGroups = $this->Customers->Ledgers->AccountingGroups
							->find('children', ['for' => $SundryDebtor->id])
							->find('List')->toArray();
		$accountingGroups[$SundryDebtor->id]=$SundryDebtor->name;
		ksort($accountingGroups);
		
        $states = $this->Customers->States->find('list', ['limit' => 200]);
        $companies = $this->Customers->Companies->find('list', ['limit' => 200]);
        $this->set(compact('customer', 'states', 'companies', 'accountingGroups'));
        $this->set('_serialize', ['customer']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $customer = $this->Customers->get($id);
        if ($this->Customers->delete($customer)) {
            $this->Flash->success(__('The customer has been deleted.'));
        } else {
            $this->Flash->error(__('The customer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
