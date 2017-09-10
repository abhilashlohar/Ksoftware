<?php
/**
 * @Author: Kounty
 */
if(!isset($active_menu))
{
    $active_menu = '';
}
?>
<?php 
echo '<li>'.$this->Html->link($this->Html->tag('i', '', ['class' => 'icon-home']).'Dashboard', '/Users/Dashboard',['escape' => false]).'</li>';
?>

<li class="start ">
	<a href="javascript:;">
	<i class="fa fa-sitemap"></i>
	<span class="title">Accounting Groups</span>
	<span class="arrow "></span>
	</a>
	<ul class="sub-menu">
		<li><?php echo $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-plus-square']).' Create', '/AccountingGroups/Add',['escape' => false]); ?></li>
		<li><?php echo $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-list-ul']).' List', '/AccountingGroups',['escape' => false]); ?></li>
	</ul>
</li>
<li class="start ">
	<a href="javascript:;">
	<i class="fa fa-sitemap"></i>
	<span class="title">Ledgers</span>
	<span class="arrow "></span>
	</a>
	<ul class="sub-menu">
		<li><?php echo $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-plus-square']).' Create', '/Ledgers/Add',['escape' => false]); ?></li>
		<li><?php echo $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-list-ul']).' List', '/Ledgers',['escape' => false]); ?></li>
	</ul>
</li>

<li class="start ">
	<a href="javascript:;">
	<i class="fa fa-sitemap"></i>
	<span class="title">Customers</span>
	<span class="arrow "></span>
	</a>
	<ul class="sub-menu">
		<li><?php echo $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-plus-square']).' Create', '/Customers/Add',['escape' => false]); ?></li>
		<li><?php echo $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-list-ul']).' List', '/Customers',['escape' => false]); ?></li>
	</ul>
</li>
<li class="start ">
	<a href="javascript:;">
	<i class="fa fa-sitemap"></i>
	<span class="title">Suppliers</span>
	<span class="arrow "></span>
	</a>
	<ul class="sub-menu">
		<li><?php echo $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-plus-square']).' Create', '/Suppliers/Add',['escape' => false]); ?></li>
		<li><?php echo $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-list-ul']).' List', '/Suppliers',['escape' => false]); ?></li>
	</ul>
</li>
<li class="start ">
	<a href="javascript:;">
	<i class="fa fa-sitemap"></i>
	<span class="title">Stock Groups</span>
	<span class="arrow "></span>
	</a>
	<ul class="sub-menu">
		<li><?php echo $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-plus-square']).' Create', '/StockGroups/Add',['escape' => false]); ?></li>
		<li><?php echo $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-list-ul']).' List', '/StockGroups',['escape' => false]); ?></li>
	</ul>
</li>
<li class="start ">
	<a href="javascript:;">
	<i class="fa fa-sitemap"></i>
	<span class="title">Stock Items</span>
	<span class="arrow "></span>
	</a>
	<ul class="sub-menu">
		<li><?php echo $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-plus-square']).' Create', '/Items/Add',['escape' => false]); ?></li>
		<li><?php echo $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-list-ul']).' List', '/Items',['escape' => false]); ?></li>
	</ul>
</li>
<li class="start ">
	<a href="javascript:;">
	<i class="fa fa-sitemap"></i>
	<span class="title">Sales Invoice</span>
	<span class="arrow "></span>
	</a>
	<ul class="sub-menu">
		<li><?php echo $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-plus-square']).' Create', '/sales-invoices/Add',['escape' => false]); ?></li>
		<li><?php echo $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-list-ul']).' List', '/sales-invoices',['escape' => false]); ?></li>
	</ul>
</li>

<li class="start ">
	<a href="javascript:;">
	<i class="fa fa-sitemap"></i>
	<span class="title">Purchases Invoice</span>
	<span class="arrow "></span>
	</a>
	<ul class="sub-menu">
		<li><?php echo $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-plus-square']).' Create', '/PurchaseInvoices/Add',['escape' => false]); ?></li>
		<li><?php echo $this->Html->link($this->Html->tag('i', '', ['class' => 'fa fa-list-ul']).' List', '/PurchaseInvoices',['escape' => false]); ?></li>
	</ul>
</li>


<?php 
echo '<li>'.$this->Html->link($this->Html->tag('i', '', ['class' => 'icon-lock']).'Logout', '/Users/logout',['escape' => false]).'</li>';
?>



