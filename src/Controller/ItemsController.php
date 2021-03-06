<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Items Controller
 *
 * @property \App\Model\Table\ItemsTable $Items
 *
 * @method \App\Model\Entity\Item[] paginate($object = null, array $settings = [])
 */
class ItemsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
		$this->viewBuilder()->layout('index_layout');
		$company_id=$this->Auth->User('company')->id;
		
        $this->paginate = [
            'contain' => ['Units', 'StockGroups', 'Companies']
        ];
        $items = $this->paginate($this->Items);

        $this->set(compact('items'));
        $this->set('_serialize', ['items']);
    }

    /**
     * View method
     *
     * @param string|null $id Item id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $item = $this->Items->get($id, [
            'contain' => ['Units', 'StockGroups', 'Companies']
        ]);

        $this->set('item', $item);
        $this->set('_serialize', ['item']);
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
		
        $item = $this->Items->newEntity();
        if ($this->request->is('post')) {
            $item = $this->Items->patchEntity($item, $this->request->getData());
			$item->company_id=$company_id;
            if ($this->Items->save($item)) {
                $this->Flash->success(__('The item has been saved.'));

                return $this->redirect(['action' => 'add']);
            }
			
            $this->Flash->error(__('The item could not be saved. Please, try again.'));
        }
        $units = $this->Items->Units->find('list', ['limit' => 200]);
        $stockGroups = $this->Items->StockGroups->find('list', ['limit' => 200]);
        $companies = $this->Items->Companies->find('list', ['limit' => 200]);
        $this->set(compact('item', 'units', 'stockGroups', 'companies'));
        $this->set('_serialize', ['item']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Item id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
		$this->viewBuilder()->layout('index_layout');
		$company_id=$this->Auth->User('company')->id;
		
        $item = $this->Items->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $item = $this->Items->patchEntity($item, $this->request->getData());
			$item->company_id=$company_id;
            if ($this->Items->save($item)) {
                $this->Flash->success(__('The item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
			pr($item); exit;
            $this->Flash->error(__('The item could not be saved. Please, try again.'));
        }
        $units = $this->Items->Units->find('list', ['limit' => 200]);
        $stockGroups = $this->Items->StockGroups->find('list', ['limit' => 200]);
        $companies = $this->Items->Companies->find('list', ['limit' => 200]);
        $this->set(compact('item', 'units', 'stockGroups', 'companies'));
        $this->set('_serialize', ['item']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Item id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $item = $this->Items->get($id);
        if ($this->Items->delete($item)) {
            $this->Flash->success(__('The item has been deleted.'));
        } else {
            $this->Flash->error(__('The item could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
