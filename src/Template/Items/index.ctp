<?php
/**
 * @Author: Kounty
 */
$this->set('title', 'Stock Items | kounty');
?>
<div class="row">
	<div class="col-md-12">
		<div class="portlet light ">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-bar-chart font-green-sharp hide"></i>
					<span class="caption-subject font-green-sharp bold ">Stock Items</span>
				</div>
			</div>
			<div class="portlet-body">
				<?php $page_no=$this->Paginator->current('Items'); $page_no=($page_no-1)*20; ?>
				<table class="table table-bordered table-hover table-condensed">
					<thead>
						<tr>
							<th scope="col" class="actions"><?= __('Sr') ?></th>
							<th scope="col"><?= $this->Paginator->sort('name') ?></th>
							<th scope="col"><?= $this->Paginator->sort('hsn_code') ?></th>
							<th scope="col"><?= $this->Paginator->sort('unit_id') ?></th>
							<th scope="col"><?= $this->Paginator->sort('stock_group_id') ?></th>
							<th scope="col" class="actions"><?= __('Actions') ?></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($items as $item): ?>
						<tr>
							<td><?= h(++$page_no) ?></td>
							<td><?= h($item->name) ?></td>
							<td><?= h($item->hsn_code) ?></td>
							<td><?= $item->unit->name ?></td>
							<td><?= $item->has('stock_group') ? $this->Html->link($item->stock_group->name, ['controller' => 'StockGroups', 'action' => 'view', $item->stock_group->id]) : '' ?></td>
							<td class="actions">
								<?= $this->Html->link(__('Edit'), ['action' => 'edit', $item->id]) ?>
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
		</div>
	</div>
</div>
