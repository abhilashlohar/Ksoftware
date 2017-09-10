<?php
/**
 * @Author: Kounty
 */
$this->set('title', 'Create Supplier | kounty');
?>
<div class="row">
	<div class="col-md-12">
		<div class="portlet light ">
			<div class="portlet-title">
				<div class="caption">
					<i class="icon-bar-chart font-green-sharp hide"></i>
					<span class="caption-subject font-green-sharp bold ">Edit Supplier</span>
				</div>
			</div>
			<div class="portlet-body">
				<?= $this->Form->create($supplier) ?>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Name <span class="required">*</span></label>
							<?php echo $this->Form->control('name',['class'=>'form-control input-sm','placeholder'=>'Supplier Name','label'=>false,'autofocus']); ?>
						</div>
						
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>State <span class="required">*</span></label>
									<?php echo $this->Form->control('state_id',['class'=>'form-control input-sm','label'=>false,'empty'=>'-select-', ['options' => $states]]); ?>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>GSTIN <span class="required">*</span></label>
									<?php echo $this->Form->control('gstin',['class'=>'form-control input-sm','placeholder'=>'Address','label'=>false ,'placeholder'=>'GSTIN']); ?>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Email</label>
									<?php echo $this->Form->control('email',['class'=>'form-control input-sm','label'=>false ,'placeholder'=>'Email']); ?>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Mobile</label>
									<?php echo $this->Form->control('mobile',['class'=>'form-control input-sm','placeholder'=>'Address','label'=>false ,'placeholder'=>'Mobile']); ?>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Address</label>
									<?php echo $this->Form->control('address',['class'=>'form-control input-sm','label'=>false ,'placeholder'=>'Address']); ?>
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
				
<!-- BEGIN PAGE LEVEL STYLES -->
<?php echo $this->Html->css('/assets/global/plugins/bootstrap-datepicker/css/datepicker3.css', ['block' => 'cssComponentsPickers']); ?>
<!-- END PAGE LEVEL STYLES -->

<!-- BEGIN PAGE LEVEL PLUGINS -->
<?php echo $this->Html->script('/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js', ['block' => 'jsPageLevelPluginsComponentsPickers']); ?>
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<?php echo $this->Html->script('/assets/admin/pages/scripts/components-pickers.js', ['block' => 'jsPageLevelScriptsComponentsPickers']); ?>
<!-- END PAGE LEVEL SCRIPTS -->


