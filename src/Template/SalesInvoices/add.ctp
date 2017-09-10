<?php
/**
 * @Author: Kounty
 */
$this->set('title', 'Create Sales Invoice | kounty');


?>
<style>
.mainTable thead th{
	border-top: 1px solid  #000;
	border-bottom: 1px solid  #000;
	font-size:11px !important;
	margin:5%;
	text-align:center;
}
.mainTable td{
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
		<?= $this->Form->create($salesInvoice) ?>
		<div class="row">
			<div class="col-md-2">
				<div class="form-group">
					<label>Transaction Date</label>
					<?php echo $this->Form->control('transaction_date',['class'=>'form-control input-sm date-picker','label'=>false ,'placeholder'=>'Transaction Date', 'value'=>date('d-m-Y'), 'type'=>'text' ,'data-date-format'=>'dd-mm-yyyy', 'data-date-start-date'=>$coreVariable['fyValidFrom'], 'data-date-end-date'=>$coreVariable['fyValidTo']]); ?>
				</div>
			</div>
			<div class="col-md-2">
				<div class="form-group">
					<label>Reference No.</label>
					<?php echo $this->Form->control('reference_no',['class'=>'form-control input-sm','label'=>false ,'placeholder'=>'Reference No']); ?>
				</div>
			</div>
			<div class="col-md-2">
				<div class="form-group">
					<label>Sales Type</label>
					<?php 
					$sales_types= ['Cash'=>'Cash','Credit'=>'Credit',];
					echo $this->Form->input('sales_type', ['options'=>$sales_types,'label' => false,'class' => 'form-control input-sm','value'=>'Credit']); 
					?>
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Party A/c</label>
					<?php echo $this->Form->control('party_ledger_id',['options'=>$partyLedgers,'class'=>'form-control input-sm select2me','label'=>false]); ?>
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label>Sales Ledger</label>
					<?php echo $this->Form->control('sale_ledger_id',['options'=>$salesLedgers,'class'=>'form-control input-sm select2me','label'=>false]); ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table width="100%" class="mainTable">
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
								<th colspan="2" style="border: 1px solid  #000;">IGST</th>
								<th rowspan="2">Total</th>
								<th rowspan="2"></th>
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
								<th style="text-align: center;border: 1px solid  #000;">%</</th>
								<th style="text-align: center;border: 1px solid  #000;">Amt</th>
							</tr>
						</thead>
						<tbody class="mainTbody">
							
						</tbody>
						<tfoot>
							<tr>
								<th><button type="button" class="add_row btn btn-default input-sm"><i class="fa fa-plus"></i> Add row</button></th>
								<th colspan="2" style="text-align: right;">Total</th>
								<td>
									<?php echo $this->Form->control('total_amount',['class'=>'form-control input-sm noBorder','label'=>false,'style'=>'width:70px;']); ?>
								</td>
								<td style="border: 1px solid  #000;">
									<?php echo $this->Form->control('avg_discount_percentage',['class'=>'form-control input-sm noBorder','label'=>false,'style'=>'width:40px;']); ?>
								</td>
								<td style="border: 1px solid  #000;">
									<?php echo $this->Form->control('total_discount_amount',['class'=>'form-control input-sm noBorder','label'=>false,'style'=>'width:60px;']); ?>
								</td>
								<td style="border: 1px solid  #000;">
									<?php echo $this->Form->control('avg_pnf_percentage',['class'=>'form-control input-sm noBorder','label'=>false,'style'=>'width:40px;']); ?>
								</td>
								<td style="border: 1px solid  #000;">
									<?php echo $this->Form->control('total_pnf_amount',['class'=>'form-control input-sm noBorder','label'=>false,'style'=>'width:60px;']); ?>
								</td>
								<td>
									<?php echo $this->Form->control('total_taxable_value',['class'=>'form-control input-sm noBorder','label'=>false,'style'=>'width:70px;']); ?>
								</td>
								<td style="border: 1px solid  #000;">
								</td>
								<td style="border: 1px solid  #000;">
									<?php echo $this->Form->control('total_cgst_amount',['class'=>'form-control input-sm noBorder','label'=>false,'style'=>'width:60px;']); ?>
								</td>
								<td style="border: 1px solid  #000;">
								</td>
								<td style="border: 1px solid  #000;">
									<?php echo $this->Form->control('total_sgst_amount',['class'=>'form-control input-sm noBorder','label'=>false,'style'=>'width:60px;']); ?>
								</td>
								<td style="border: 1px solid  #000;">
								</td>
								<td style="border: 1px solid  #000;">
									<?php echo $this->Form->control('total_sgst_amount',['class'=>'form-control input-sm noBorder','label'=>false,'style'=>'width:60px;']); ?>
								</td>
								<td>
									<?php echo $this->Form->control('sub_total',['class'=>'form-control input-sm noBorder','label'=>false,'style'=>'width:70px;']); ?>
								</td>
								<td></td>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
		<?= $this->Form->button(__('Submit')) ?>
		<?= $this->Form->end() ?>	
	</div>
</div>



<table class="sampleTable" style="display:none;">
	<tbody class="sampleTbody">
		<tr class="mainTr">
			<td>
				<?php echo $this->Form->control('item_id',['class'=>'form-control input-sm','label'=>false, 'options'=>$items,'empty'=>'-select-']); ?>
			</td>
			<td>
				<?php echo $this->Form->control('quantity',['class'=>'form-control input-sm noBorder FwCalc','label'=>false,'style'=>'width:70px;']); ?>
			</td>
			<td>
				<?php echo $this->Form->control('rate',['class'=>'form-control input-sm noBorder FwCalc','label'=>false,'style'=>'width:70px;']); ?>
			</td>
			<td>
				<?php echo $this->Form->control('amount',['class'=>'form-control input-sm noBorder','label'=>false,'style'=>'width:70px;', 'tabindex'=>'-1']); ?>
			</td>
			<td style="border: 1px solid  #000;">
				<?php echo $this->Form->control('discount_percentage',['class'=>'form-control input-sm noBorder','label'=>false,'style'=>'width:40px;']); ?>
			</td>
			<td style="border: 1px solid  #000;">
				<?php echo $this->Form->control('discount_amount',['class'=>'form-control input-sm noBorder','label'=>false,'style'=>'width:60px;']); ?>
			</td>
			<td style="border: 1px solid  #000;">
				<?php echo $this->Form->control('pnf_percentage',['class'=>'form-control input-sm noBorder','label'=>false,'style'=>'width:40px;']); ?>
			</td>
			<td style="border: 1px solid  #000;">
				<?php echo $this->Form->control('pnf_amount',['class'=>'form-control input-sm noBorder','label'=>false,'style'=>'width:60px;']); ?>
			</td>
			<td>
				<?php echo $this->Form->control('taxable_value',['class'=>'form-control input-sm noBorder','label'=>false,'style'=>'width:70px;']); ?>
			</td>
			<td style="border: 1px solid  #000;">
				<?php echo $this->Form->control('cgst_ledger_id',['options'=>$cgstLedgerOptions, 'class'=>'form-control input-sm noBorder','label'=>false,'style'=>'width:60px;']); ?>
			</td>
			<td style="border: 1px solid  #000;">
				<?php echo $this->Form->control('cgst_amount',['class'=>'form-control input-sm noBorder','label'=>false,'style'=>'width:60px;']); ?>
			</td>
			<td style="border: 1px solid  #000;">
				<?php echo $this->Form->control('sgst_percentage',['options'=>$sgstLedgerOptions, 'class'=>'form-control input-sm noBorder','label'=>false,'style'=>'width:60px;']); ?>
			</td>
			<td style="border: 1px solid  #000;">
				<?php echo $this->Form->control('igst_amount',['class'=>'form-control input-sm noBorder','label'=>false,'style'=>'width:60px;']); ?>
			</td>
			<td style="border: 1px solid  #000;">
				<?php echo $this->Form->control('igst_percentage',['options'=>$igstLedgerOptions, 'class'=>'form-control input-sm noBorder','label'=>false,'style'=>'width:60px;']); ?>
			</td>
			<td style="border: 1px solid  #000;">
				<?php echo $this->Form->control('sgst_amount',['class'=>'form-control input-sm noBorder','label'=>false,'style'=>'width:60px;']); ?>
			</td>
			<td>
				<?php echo $this->Form->control('total',['class'=>'form-control input-sm noBorder','label'=>false,'style'=>'width:70px;']); ?>
			</td>
			<td><button type="button" class="deleteTr btn btn-default input-sm"><i class="fa fa-times"></i></button></td>
		</tr>
	</tbody>
</table>

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
		$('.add_row').click(function(){
			add_row();
		});
		
		$('.deleteTr').die().live('click',function(){
			$(this).closest('tr').remove();
		});

		add_row()
		function add_row(){
			var tr=$('.sampleTable tbody.sampleTbody tr.mainTr').clone();
			$('.mainTable tbody.mainTbody').append(tr);
			renameRows();
		}
		
		function renameRows(){
			var i=0;
			$('.mainTable tbody.mainTbody tr.mainTr').each(function(){
				$(this).find('td:nth-child(1) select').select2().attr({name:'sales_invoice_rows['+i+'][item_id]', id:'sales_invoice_rows-'+i+'-item_id'});
				$(this).find('td:nth-child(2) input').attr({name:'sales_invoice_rows['+i+'][quantity]', id:'sales_invoice_rows-'+i+'-quantity'});
				$(this).find('td:nth-child(3) input').attr({name:'sales_invoice_rows['+i+'][rate]', id:'sales_invoice_rows-'+i+'-rate'});
				$(this).find('td:nth-child(4) input').attr({name:'sales_invoice_rows['+i+'][amount]', id:'sales_invoice_rows-'+i+'-amount'});
				$(this).find('td:nth-child(5) input').attr({name:'sales_invoice_rows['+i+'][discount_percentage]', id:'sales_invoice_rows-'+i+'-discount_percentage'});
				$(this).find('td:nth-child(6) input').attr({name:'sales_invoice_rows['+i+'][discount_amount]', id:'sales_invoice_rows-'+i+'-discount_amount'});
				$(this).find('td:nth-child(7) input').attr({name:'sales_invoice_rows['+i+'][pnf_percentage]', id:'sales_invoice_rows-'+i+'-pnf_percentage'});
				$(this).find('td:nth-child(8) input').attr({name:'sales_invoice_rows['+i+'][pnf_amount]', id:'sales_invoice_rows-'+i+'-pnf_amount'});
				$(this).find('td:nth-child(9) input').attr({name:'sales_invoice_rows['+i+'][taxable_value]', id:'sales_invoice_rows-'+i+'-taxable_value'});
				$(this).find('td:nth-child(10) input').attr({name:'sales_invoice_rows['+i+'][cgst_percentage]', id:'sales_invoice_rows-'+i+'-cgst_percentage'});
				$(this).find('td:nth-child(11) input').attr({name:'sales_invoice_rows['+i+'][cgst_amount]', id:'sales_invoice_rows-'+i+'-cgst_amount'});
				$(this).find('td:nth-child(12) input').attr({name:'sales_invoice_rows['+i+'][sgst_percentage]', id:'sales_invoice_rows-'+i+'-sgst_percentage'});
				$(this).find('td:nth-child(13) input').attr({name:'sales_invoice_rows['+i+'][sgst_amount]', id:'sales_invoice_rows-'+i+'-sgst_amount'});
				$(this).find('td:nth-child(14) input').attr({name:'sales_invoice_rows['+i+'][total]', id:'sales_invoice_rows-'+i+'-total'});
				i++;
			});
		}
		
		$('.FwCalc').die().live('blur',function(){
			var tr=$(this).closest('tr');
			farwordCalculation(tr);
		});
		
		function farwordCalculation(tr){
			var quantity=parseFloat(tr.find('td:nth-child(2) input').val());
			if(!quantity){ quantity=0; }
			quantity=quantity.toFixed(2);
			var rate=parseFloat(tr.find('td:nth-child(3) input').val());
			if(!rate){ rate=0; }
			rate=rate.toFixed(2);
			
			var amount=quantity*rate;
			amount=amount.toFixed(2);
			tr.find('td:nth-child(4) input').val(amount);
		}
	
		ComponentsPickers.init();
    });
	";

	echo $this->Html->scriptBlock($js, array('block' => 'scriptBottom')); 
?>

