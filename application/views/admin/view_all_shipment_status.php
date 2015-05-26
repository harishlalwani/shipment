

<header class="page-header">
	<h2>Shipment </h2>

	<div class="right-wrapper pull-right">
		

		
	</div>
</header>

<!-- start: page -->
	<section class="panel">
		<header class="panel-heading">
			<div class="panel-actions">
				<a href="#" class="fa fa-caret-down"></a>
				<a href="#" class="fa fa-times"></a>
			</div>
	
			<h2 class="panel-title">Shippment Status</h2>
		</header>
		<div class="panel-body">
		<?php if($this->session->flashdata('message_name'))
		 {?>
			<div class="alert alert-success">
			 
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<?php echo $this->session->flashdata('message_name'); ?>
			</div>
		<?php } ?>	
			<table class="table table-bordered table-striped" id="datatable-ajax" data-url="<?=base_url()?>admin/get_shipment_status">
				<thead>
					<tr>
						<th width="20%">Tracking Id</th>
						<th width="20%">Location 1</th>
						<th width="20%">Location 2</th>
						<th width="20%">Action</th>
					</tr>
				</thead>
				<tbody>
					
				</tbody>
			</table>
		</div>
	</section>
<!-- end: page -->
				

			