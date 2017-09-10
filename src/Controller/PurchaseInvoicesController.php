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
        $purchaseInvoice = $this->PurchaseInvoices->newEntity();
        if ($this->request->is('post')) {
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
