<?php
/**
 * @Author: Kounty
 */
$this->set('title', 'Create Stock Group | kounty');
?>
<div class="row">
	<div class="col-md-6">
		<div class="portlet light ">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-bar-chart font-green-sharp hide"></i>
					<span class="caption-subject font-green-sharp bold ">Create Stock Group</span>
				</div>
			</div>
			<div class="portlet-body">
				<?= $this->Form->create($stockGroup) ?>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label>Group Name <span class="required">*</span></label>
							<?php echo $this->Form->control('name',['class'=>'form-control input-sm','placeholder'=>'Group Name','label'=>false,'autofocus']); ?>
						</div>
						<div class="form-group">
							<label>Under</label>
							<?php echo $this->Form->control('parent_id',['options' => $parentStockGroups, 'class'=>'form-control input-sm','label'=>false,'empty'=>'-Primary Group-']); ?>
						</div>
					</div>
				</div>
				<?= $this->Form->button(__('Submit'),['class'=>'btn btn-success']) ?>
				<?= $this->Form->end() ?>
			</div>
		</div>
	</div>
</div>
				
