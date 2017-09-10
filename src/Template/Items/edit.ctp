<?php
/**
 * @Author: Kounty
 */
$this->set('title', 'Edit Stock Item | kounty');
?>
<div class="row">
	<div class="col-md-6">
		<div class="portlet light ">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-bar-chart font-green-sharp hide"></i>
					<span class="caption-subject font-green-sharp bold ">Edit Stock Item</span>
				</div>
			</div>
			<div class="portlet-body">
				<?= $this->Form->create($item) ?>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label>Name <span class="required">*</span></label>
							<?php echo $this->Form->control('name',['class'=>'form-control input-sm','placeholder'=>'Customer Name','label'=>false,'autofocus']); ?>
						</div>
						
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label>Unit</label>
									<?php echo $this->Form->control('unit_id',['class'=>'form-control input-sm','options' => $units,'label'=>false ,'placeholder'=>'GSTIN']); ?>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>HSN Code <span class="required">*</span></label>
									<?php echo $this->Form->control('hsn_code',['class'=>'form-control input-sm','label'=>false,'placeholder'=>'HSN Code']); ?>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Stock Group </label>
									<?php echo $this->Form->control('stock_group_id',['class'=>'form-control input-sm','label'=>false,'placeholder'=>'Stock Group','empty'=>'-Primary-']); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?= $this->Form->button(__('Submit'),['class'=>'btn btn-success']) ?>
				<?= $this->Form->end() ?>
			</div>
		</div>
	</div>
</div>
