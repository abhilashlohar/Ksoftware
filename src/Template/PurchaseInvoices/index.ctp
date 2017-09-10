<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\PurchaseInvoice[]|\Cake\Collection\CollectionInterface $purchaseInvoices
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Purchase Invoice'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Purchase Invoice Rows'), ['controller' => 'PurchaseInvoiceRows', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Purchase Invoice Row'), ['controller' => 'PurchaseInvoiceRows', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="purchaseInvoices index large-9 medium-8 columns content">
    <h3><?= __('Purchase Invoices') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('voucher_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('transaction_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reference_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('party_ledger_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('purchase_ledger_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('purchase_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('company_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($purchaseInvoices as $purchaseInvoice): ?>
            <tr>
                <td><?= $this->Number->format($purchaseInvoice->id) ?></td>
                <td><?= $this->Number->format($purchaseInvoice->voucher_no) ?></td>
                <td><?= h($purchaseInvoice->transaction_date) ?></td>
                <td><?= h($purchaseInvoice->reference_no) ?></td>
                <td><?= $this->Number->format($purchaseInvoice->party_ledger_id) ?></td>
                <td><?= $this->Number->format($purchaseInvoice->purchase_ledger_id) ?></td>
                <td><?= h($purchaseInvoice->purchase_type) ?></td>
                <td><?= $purchaseInvoice->has('company') ? $this->Html->link($purchaseInvoice->company->name, ['controller' => 'Companies', 'action' => 'view', $purchaseInvoice->company->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $purchaseInvoice->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $purchaseInvoice->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $purchaseInvoice->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchaseInvoice->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
