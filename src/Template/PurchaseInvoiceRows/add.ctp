<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Purchase Invoice Rows'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Purchase Invoices'), ['controller' => 'PurchaseInvoices', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Purchase Invoice'), ['controller' => 'PurchaseInvoices', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="purchaseInvoiceRows form large-9 medium-8 columns content">
    <?= $this->Form->create($purchaseInvoiceRow) ?>
    <fieldset>
        <legend><?= __('Add Purchase Invoice Row') ?></legend>
        <?php
            echo $this->Form->control('purchase_invoice_id', ['options' => $purchaseInvoices]);
            echo $this->Form->control('item_id', ['options' => $items]);
            echo $this->Form->control('quantity');
            echo $this->Form->control('rate');
            echo $this->Form->control('amount');
            echo $this->Form->control('discount_percentage');
            echo $this->Form->control('discount_amount');
            echo $this->Form->control('pnf_percentage');
            echo $this->Form->control('pnf_amount');
            echo $this->Form->control('taxable_value');
            echo $this->Form->control('cgst_percentage');
            echo $this->Form->control('cgst_amount');
            echo $this->Form->control('sgst_percentage');
            echo $this->Form->control('sgst_amount');
            echo $this->Form->control('igst_percentage');
            echo $this->Form->control('igst_amount');
            echo $this->Form->control('total');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
