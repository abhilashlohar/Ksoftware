<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $salesInvoice->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $salesInvoice->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Sales Invoices'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sales Invoice Rows'), ['controller' => 'SalesInvoiceRows', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sales Invoice Row'), ['controller' => 'SalesInvoiceRows', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="salesInvoices form large-9 medium-8 columns content">
    <?= $this->Form->create($salesInvoice) ?>
    <fieldset>
        <legend><?= __('Edit Sales Invoice') ?></legend>
        <?php
            echo $this->Form->control('voucher_no');
            echo $this->Form->control('transaction_date');
            echo $this->Form->control('reference_no');
            echo $this->Form->control('party_ledger_id');
            echo $this->Form->control('sale_ledger_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
