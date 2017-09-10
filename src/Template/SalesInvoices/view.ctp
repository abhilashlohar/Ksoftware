<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\SalesInvoice $salesInvoice
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sales Invoice'), ['action' => 'edit', $salesInvoice->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sales Invoice'), ['action' => 'delete', $salesInvoice->id], ['confirm' => __('Are you sure you want to delete # {0}?', $salesInvoice->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sales Invoices'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sales Invoice'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sales Invoice Rows'), ['controller' => 'SalesInvoiceRows', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sales Invoice Row'), ['controller' => 'SalesInvoiceRows', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="salesInvoices view large-9 medium-8 columns content">
    <h3><?= h($salesInvoice->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Reference No') ?></th>
            <td><?= h($salesInvoice->reference_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($salesInvoice->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Voucher No') ?></th>
            <td><?= $this->Number->format($salesInvoice->voucher_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Party Ledger Id') ?></th>
            <td><?= $this->Number->format($salesInvoice->party_ledger_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sale Ledger Id') ?></th>
            <td><?= $this->Number->format($salesInvoice->sale_ledger_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Transaction Date') ?></th>
            <td><?= h($salesInvoice->transaction_date) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Sales Invoice Rows') ?></h4>
        <?php if (!empty($salesInvoice->sales_invoice_rows)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Sales Invoice Id') ?></th>
                <th scope="col"><?= __('Item Id') ?></th>
                <th scope="col"><?= __('Quantity') ?></th>
                <th scope="col"><?= __('Rate') ?></th>
                <th scope="col"><?= __('Amount') ?></th>
                <th scope="col"><?= __('Discount Percentage') ?></th>
                <th scope="col"><?= __('Discount Amount') ?></th>
                <th scope="col"><?= __('Pnf Percentage') ?></th>
                <th scope="col"><?= __('Pnf Amount') ?></th>
                <th scope="col"><?= __('Taxable Value') ?></th>
                <th scope="col"><?= __('Cgst Percentage') ?></th>
                <th scope="col"><?= __('Cgst Amount') ?></th>
                <th scope="col"><?= __('Sgst Percentage') ?></th>
                <th scope="col"><?= __('Sgst Amount') ?></th>
                <th scope="col"><?= __('Igst Percentage') ?></th>
                <th scope="col"><?= __('Igst Amount') ?></th>
                <th scope="col"><?= __('Total') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($salesInvoice->sales_invoice_rows as $salesInvoiceRows): ?>
            <tr>
                <td><?= h($salesInvoiceRows->id) ?></td>
                <td><?= h($salesInvoiceRows->sales_invoice_id) ?></td>
                <td><?= h($salesInvoiceRows->item_id) ?></td>
                <td><?= h($salesInvoiceRows->quantity) ?></td>
                <td><?= h($salesInvoiceRows->rate) ?></td>
                <td><?= h($salesInvoiceRows->amount) ?></td>
                <td><?= h($salesInvoiceRows->discount_percentage) ?></td>
                <td><?= h($salesInvoiceRows->discount_amount) ?></td>
                <td><?= h($salesInvoiceRows->pnf_percentage) ?></td>
                <td><?= h($salesInvoiceRows->pnf_amount) ?></td>
                <td><?= h($salesInvoiceRows->taxable_value) ?></td>
                <td><?= h($salesInvoiceRows->cgst_percentage) ?></td>
                <td><?= h($salesInvoiceRows->cgst_amount) ?></td>
                <td><?= h($salesInvoiceRows->sgst_percentage) ?></td>
                <td><?= h($salesInvoiceRows->sgst_amount) ?></td>
                <td><?= h($salesInvoiceRows->igst_percentage) ?></td>
                <td><?= h($salesInvoiceRows->igst_amount) ?></td>
                <td><?= h($salesInvoiceRows->total) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'SalesInvoiceRows', 'action' => 'view', $salesInvoiceRows->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'SalesInvoiceRows', 'action' => 'edit', $salesInvoiceRows->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'SalesInvoiceRows', 'action' => 'delete', $salesInvoiceRows->id], ['confirm' => __('Are you sure you want to delete # {0}?', $salesInvoiceRows->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
