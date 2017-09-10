<?php
/**
 * @Author: Kounty
 */
$this->set('title', 'Create Sales Invoice | kounty');
?>
<style>
.ownTable th{
	border-top: 1px solid  #000;
	border-bottom: 1px solid  #000;
	font-size:11px !important;
	margin:5%;
	text-align:center;
}
.ownTable td{
	border-top: 1px solid  #000;
	border-bottom: 1px solid  #000;
	margin:5%;
}
.noBorder{
	padding: 1px;
	font-size:12px !important;
	text-align:right;
}
</style>

<div class="portlet solid" style="background-color:#FFF;">
	<div style="margin-bottom:3px;">
		<span class="label label-sm" style="font-size: 14px;font-weight: bold;background-color: #2b8c2b;">Sales Invoice No. : 1 </span>
	</div>
	<div class="portlet-body">
		<div class="row">
			<div class="col-md-3">
				<div class="form-group">
					<label>Transaction Date</label>
					<?php echo $this->Form->control('email',['class'=>'form-control input-sm','label'=>false ,'placeholder'=>'Transaction Date']); ?>
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Reference No.</label>
					<?php echo $this->Form->control('email',['class'=>'form-control input-sm','label'=>false ,'placeholder'=>'Reference No']); ?>
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Party A/c</label>
					<?php echo $this->Form->control('email',['class'=>'form-control input-sm','label'=>false ,'placeholder'=>'Party A/c']); ?>
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Sales Ledger</label>
					<?php echo $this->Form->control('email',['class'=>'form-control input-sm','label'=>false ,'placeholder'=>'Email']); ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table width="100%" class="ownTable">
						<thead>
							<tr>
								<th rowspan="2" width="100%">Item</th>
								<th rowspan="2">Quantity</th>
								<th rowspan="2">Rate</th>
								<th rowspan="2">Amount</th>
								<th colspan="2" style="border: 1px solid  #000;">Discount</th>
								<th colspan="2" style="border: 1px solid  #000;">Packing & Forwarding</th>
								<th rowspan="2">Taxable Value</th>
								<th colspan="2" style="border: 1px solid  #000;">CGST</th>
								<th colspan="2" style="border: 1px solid  #000;">SGST</th>
								<th rowspan="2">Total</th>
							</tr>
							<tr>
								<th style="text-align: center;border: 1px solid  #000;" >%</th>
								<th style="text-align: center;border: 1px solid  #000;">Amt</th>
								<th style="text-align: center;border: 1px solid  #000;">%</</th>
								<th style="text-align: center;border: 1px solid  #000;">Amt</th>
								<th style="text-align: center;border: 1px solid  #000;">%</</th>
								<th style="text-align: center;border: 1px solid  #000;">Amt</th>
								<th style="text-align: center;border: 1px solid  #000;">%</</th>
								<th style="text-align: center;border: 1px solid  #000;">Amt</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<select name="state_id" class="form-control input-sm select2me">
										<option value="">-select-</option>
										<option value="1">Rajasthan</option>
									</select>
								</td>
								<td>
									<?php echo $this->Form->control('email',['class'=>'form-control input-sm noBorder','label'=>false,'style'=>'width:40px;']); ?>
								</td>
								<td>
									<?php echo $this->Form->control('email',['class'=>'form-control input-sm noBorder','label'=>false,'style'=>'width:70px;']); ?>
								</td>
								<td>
									<?php echo $this->Form->control('email',['class'=>'form-control input-sm noBorder','label'=>false,'style'=>'width:70px;']); ?>
								</td>
								<td style="border: 1px solid  #000;">
									<?php echo $this->Form->control('email',['class'=>'form-control input-sm noBorder','label'=>false,'style'=>'width:40px;']); ?>
								</td>
								<td style="border: 1px solid  #000;">
									<?php echo $this->Form->control('email',['class'=>'form-control input-sm noBorder','label'=>false,'style'=>'width:60px;']); ?>
								</td>
								<td style="border: 1px solid  #000;">
									<?php echo $this->Form->control('email',['class'=>'form-control input-sm noBorder','label'=>false,'style'=>'width:40px;']); ?>
								</td>
								<td style="border: 1px solid  #000;">
									<?php echo $this->Form->control('email',['class'=>'form-control input-sm noBorder','label'=>false,'style'=>'width:60px;']); ?>
								</td>
								<td>
									<?php echo $this->Form->control('email',['class'=>'form-control input-sm noBorder','label'=>false,'style'=>'width:70px;']); ?>
								</td>
								<td style="border: 1px solid  #000;">
									<?php echo $this->Form->control('email',['class'=>'form-control input-sm noBorder','label'=>false,'style'=>'width:40px;']); ?>
								</td>
								<td style="border: 1px solid  #000;">
									<?php echo $this->Form->control('email',['class'=>'form-control input-sm noBorder','label'=>false,'style'=>'width:60px;']); ?>
								</td>
								<td style="border: 1px solid  #000;">
									<?php echo $this->Form->control('email',['class'=>'form-control input-sm noBorder','label'=>false,'style'=>'width:40px;']); ?>
								</td>
								<td style="border: 1px solid  #000;">
									<?php echo $this->Form->control('email',['class'=>'form-control input-sm noBorder','label'=>false,'style'=>'width:60px;']); ?>
								</td>
								<td>
									<?php echo $this->Form->control('email',['class'=>'form-control input-sm noBorder','label'=>false,'style'=>'width:70px;']); ?>
								</td>
							</tr>
							<tr>
								<td>
									<select name="state_id" class="form-control input-sm select2me">
										<option value="">-select-</option>
										<option value="1">Rajasthan</option>
									</select>
								</td>
								<td>
									<?php echo $this->Form->control('email',['class'=>'form-control input-sm noBorder','label'=>false,'style'=>'width:40px;']); ?>
								</td>
								<td>
									<?php echo $this->Form->control('email',['class'=>'form-control input-sm noBorder','label'=>false,'style'=>'width:70px;']); ?>
								</td>
								<td>
									<?php echo $this->Form->control('email',['class'=>'form-control input-sm noBorder','label'=>false,'style'=>'width:70px;']); ?>
								</td>
								<td style="border: 1px solid  #000;">
									<?php echo $this->Form->control('email',['class'=>'form-control input-sm noBorder','label'=>false,'style'=>'width:40px;']); ?>
								</td>
								<td style="border: 1px solid  #000;">
									<?php echo $this->Form->control('email',['class'=>'form-control input-sm noBorder','label'=>false,'style'=>'width:60px;']); ?>
								</td>
								<td style="border: 1px solid  #000;">
									<?php echo $this->Form->control('email',['class'=>'form-control input-sm noBorder','label'=>false,'style'=>'width:40px;']); ?>
								</td>
								<td style="border: 1px solid  #000;">
									<?php echo $this->Form->control('email',['class'=>'form-control input-sm noBorder','label'=>false,'style'=>'width:60px;']); ?>
								</td>
								<td>
									<?php echo $this->Form->control('email',['class'=>'form-control input-sm noBorder','label'=>false,'style'=>'width:70px;']); ?>
								</td>
								<td style="border: 1px solid  #000;">
									<?php echo $this->Form->control('email',['class'=>'form-control input-sm noBorder','label'=>false,'style'=>'width:40px;']); ?>
								</td>
								<td style="border: 1px solid  #000;">
									<?php echo $this->Form->control('email',['class'=>'form-control input-sm noBorder','label'=>false,'style'=>'width:60px;']); ?>
								</td>
								<td style="border: 1px solid  #000;">
									<?php echo $this->Form->control('email',['class'=>'form-control input-sm noBorder','label'=>false,'style'=>'width:40px;']); ?>
								</td>
								<td style="border: 1px solid  #000;">
									<?php echo $this->Form->control('email',['class'=>'form-control input-sm noBorder','label'=>false,'style'=>'width:60px;']); ?>
								</td>
								<td>
									<?php echo $this->Form->control('email',['class'=>'form-control input-sm noBorder','label'=>false,'style'=>'width:70px;']); ?>
								</td>
							</tr>
							<tr>
								<td>
									<select name="state_id" class="form-control input-sm select2me">
										<option value="">-select-</option>
										<option value="1">Rajasthan</option>
									</select>
								</td>
								<td>
									<?php echo $this->Form->control('email',['class'=>'form-control input-sm noBorder','label'=>false,'style'=>'width:40px;']); ?>
								</td>
								<td>
									<?php echo $this->Form->control('email',['class'=>'form-control input-sm noBorder','label'=>false,'style'=>'width:70px;']); ?>
								</td>
								<td>
									<?php echo $this->Form->control('email',['class'=>'form-control input-sm noBorder','label'=>false,'style'=>'width:70px;']); ?>
								</td>
								<td style="border: 1px solid  #000;">
									<?php echo $this->Form->control('email',['class'=>'form-control input-sm noBorder','label'=>false,'style'=>'width:40px;']); ?>
								</td>
								<td style="border: 1px solid  #000;">
									<?php echo $this->Form->control('email',['class'=>'form-control input-sm noBorder','label'=>false,'style'=>'width:60px;']); ?>
								</td>
								<td style="border: 1px solid  #000;">
									<?php echo $this->Form->control('email',['class'=>'form-control input-sm noBorder','label'=>false,'style'=>'width:40px;']); ?>
								</td>
								<td style="border: 1px solid  #000;">
									<?php echo $this->Form->control('email',['class'=>'form-control input-sm noBorder','label'=>false,'style'=>'width:60px;']); ?>
								</td>
								<td>
									<?php echo $this->Form->control('email',['class'=>'form-control input-sm noBorder','label'=>false,'style'=>'width:70px;']); ?>
								</td>
								<td style="border: 1px solid  #000;">
									<?php echo $this->Form->control('email',['class'=>'form-control input-sm noBorder','label'=>false,'style'=>'width:40px;']); ?>
								</td>
								<td style="border: 1px solid  #000;">
									<?php echo $this->Form->control('email',['class'=>'form-control input-sm noBorder','label'=>false,'style'=>'width:60px;']); ?>
								</td>
								<td style="border: 1px solid  #000;">
									<?php echo $this->Form->control('email',['class'=>'form-control input-sm noBorder','label'=>false,'style'=>'width:40px;']); ?>
								</td>
								<td style="border: 1px solid  #000;">
									<?php echo $this->Form->control('email',['class'=>'form-control input-sm noBorder','label'=>false,'style'=>'width:60px;']); ?>
								</td>
								<td>
									<?php echo $this->Form->control('email',['class'=>'form-control input-sm noBorder','label'=>false,'style'=>'width:70px;']); ?>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
			
	</div>
</div>

<!-- BEGIN PAGE LEVEL STYLES -->
	<!-- BEGIN COMPONENTS PICKERS -->
	<?php echo $this->Html->css('/assets/global/plugins/clockface/css/clockface.css', ['block' => 'PAGE_LEVEL_CSS']); ?>
	<?php echo $this->Html->css('/assets/global/plugins/bootstrap-datepicker/css/datepicker3.css', ['block' => 'PAGE_LEVEL_CSS']); ?>
	<?php echo $this->Html->css('/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css', ['block' => 'PAGE_LEVEL_CSS']); ?>
	<?php echo $this->Html->css('/assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css', ['block' => 'PAGE_LEVEL_CSS']); ?>
	<?php echo $this->Html->css('/assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css', ['block' => 'PAGE_LEVEL_CSS']); ?>
	<?php echo $this->Html->css('/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css', ['block' => 'PAGE_LEVEL_CSS']); ?>
	<!-- END COMPONENTS PICKERS -->

	<!-- BEGIN COMPONENTS DROPDOWNS -->
	<?php echo $this->Html->css('/assets/global/plugins/bootstrap-select/bootstrap-select.min.css', ['block' => 'PAGE_LEVEL_CSS']); ?>
	<?php echo $this->Html->css('/assets/global/plugins/select2/select2.css', ['block' => 'PAGE_LEVEL_CSS']); ?>
	<?php echo $this->Html->css('/assets/global/plugins/jquery-multi-select/css/multi-select.css', ['block' => 'PAGE_LEVEL_CSS']); ?>
	<!-- END COMPONENTS DROPDOWNS -->
<!-- END PAGE LEVEL STYLES -->

<!-- BEGIN PAGE LEVEL PLUGINS -->
	<!-- BEGIN COMPONENTS PICKERS -->
	<?php echo $this->Html->script('/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
	<?php echo $this->Html->script('/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
	<?php echo $this->Html->script('/assets/global/plugins/clockface/js/clockface.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
	<?php echo $this->Html->script('/assets/global/plugins/bootstrap-daterangepicker/moment.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
	<?php echo $this->Html->script('/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
	<?php echo $this->Html->script('/assets/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
	<?php echo $this->Html->script('/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
	<!-- END COMPONENTS PICKERS -->
	
	<!-- BEGIN COMPONENTS DROPDOWNS -->
	<?php echo $this->Html->script('/assets/global/plugins/bootstrap-select/bootstrap-select.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
	<?php echo $this->Html->script('/assets/global/plugins/select2/select2.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
	<?php echo $this->Html->script('/assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
	<!-- END COMPONENTS DROPDOWNS -->
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<!-- BEGIN COMPONENTS PICKERS -->
	<?php echo $this->Html->script('/assets/admin/pages/scripts/components-pickers.js', ['block' => 'PAGE_LEVEL_SCRIPTS_JS']); ?>
	<!-- END COMPONENTS PICKERS -->

	<!-- BEGIN COMPONENTS DROPDOWNS -->
	<?php echo $this->Html->script('/assets/global/scripts/metronic.js', ['block' => 'PAGE_LEVEL_SCRIPTS_JS']); ?>
	<?php echo $this->Html->script('/assets/admin/layout/scripts/layout.js', ['block' => 'PAGE_LEVEL_SCRIPTS_JS']); ?>
	<?php echo $this->Html->script('/assets/admin/layout/scripts/quick-sidebar.js', ['block' => 'PAGE_LEVEL_SCRIPTS_JS']); ?>
	<?php echo $this->Html->script('/assets/admin/layout/scripts/demo.js', ['block' => 'PAGE_LEVEL_SCRIPTS_JS']); ?>
	<?php echo $this->Html->script('/assets/admin/pages/scripts/components-dropdowns.js', ['block' => 'PAGE_LEVEL_SCRIPTS_JS']); ?>
	<!-- END COMPONENTS DROPDOWNS -->
<!-- END PAGE LEVEL SCRIPTS -->

<?php
	$js="
	$(document).ready(function() {
		ComponentsPickers.init();
    });
	";

echo $this->Html->scriptBlock($js, array('block' => 'scriptBottom')); 
?>