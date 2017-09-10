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
                ['action' => 'delete', $purchaseInvoice->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $purchaseInvoice->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Purchase Invoices'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Purchase Invoice Rows'), ['controller' => 'PurchaseInvoiceRows', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Purchase Invoice Row'), ['controller' => 'PurchaseInvoiceRows', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="purchaseInvoices form large-9 medium-8 columns content">
    <?= $this->Form->create($purchaseInvoice) ?>
    <fieldset>
        <legend><?= __('Edit Purchase Invoice') ?></legend>
        <?php
            echo $this->Form->control('voucher_no');
            echo $this->Form->control('transaction_date');
            echo $this->Form->control('reference_no');
            echo $this->Form->control('party_ledger_id');
            echo $this->Form->control('purchase_ledger_id');
            echo $this->Form->control('purchase_type');
            echo $this->Form->control('company_id', ['options' => $companies]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
