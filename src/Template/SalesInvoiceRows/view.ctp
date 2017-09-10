<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\SalesInvoiceRow $salesInvoiceRow
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sales Invoice Row'), ['action' => 'edit', $salesInvoiceRow->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sales Invoice Row'), ['action' => 'delete', $salesInvoiceRow->id], ['confirm' => __('Are you sure you want to delete # {0}?', $salesInvoiceRow->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sales Invoice Rows'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sales Invoice Row'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sales Invoices'), ['controller' => 'SalesInvoices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sales Invoice'), ['controller' => 'SalesInvoices', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="salesInvoiceRows view large-9 medium-8 columns content">
    <h3><?= h($salesInvoiceRow->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Sales Invoice') ?></th>
            <td><?= $salesInvoiceRow->has('sales_invoice') ? $this->Html->link($salesInvoiceRow->sales_invoice->id, ['controller' => 'SalesInvoices', 'action' => 'view', $salesInvoiceRow->sales_invoice->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Item') ?></th>
            <td><?= $salesInvoiceRow->has('item') ? $this->Html->link($salesInvoiceRow->item->name, ['controller' => 'Items', 'action' => 'view', $salesInvoiceRow->item->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($salesInvoiceRow->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($salesInvoiceRow->quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rate') ?></th>
            <td><?= $this->Number->format($salesInvoiceRow->rate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount') ?></th>
            <td><?= $this->Number->format($salesInvoiceRow->amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Discount Percentage') ?></th>
            <td><?= $this->Number->format($salesInvoiceRow->discount_percentage) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Discount Amount') ?></th>
            <td><?= $this->Number->format($salesInvoiceRow->discount_amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pnf Percentage') ?></th>
            <td><?= $this->Number->format($salesInvoiceRow->pnf_percentage) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pnf Amount') ?></th>
            <td><?= $this->Number->format($salesInvoiceRow->pnf_amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Taxable Value') ?></th>
            <td><?= $this->Number->format($salesInvoiceRow->taxable_value) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cgst Percentage') ?></th>
            <td><?= $this->Number->format($salesInvoiceRow->cgst_percentage) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cgst Amount') ?></th>
            <td><?= $this->Number->format($salesInvoiceRow->cgst_amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sgst Percentage') ?></th>
            <td><?= $this->Number->format($salesInvoiceRow->sgst_percentage) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sgst Amount') ?></th>
            <td><?= $this->Number->format($salesInvoiceRow->sgst_amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Igst Percentage') ?></th>
            <td><?= $this->Number->format($salesInvoiceRow->igst_percentage) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Igst Amount') ?></th>
            <td><?= $this->Number->format($salesInvoiceRow->igst_amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total') ?></th>
            <td><?= $this->Number->format($salesInvoiceRow->total) ?></td>
        </tr>
    </table>
</div>
