

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
	
			<h2 class="panel-title">Destinations</h2>
		</header>
		<div class="panel-body">
		<?php if($this->session->flashdata('message_name'))
		 {?>
			<div class="alert alert-success">
			 
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<?php echo $this->session->flashdata('message_name'); ?>
			</div>
		<?php } ?>	
			<table class="table table-bordered table-striped" id="datatable-ajaxq" >
				<thead>
					<tr>
						<th width="20%">Source</th>
						<th width="20%">Destination</th>
						<th width="20%">Weight</th>
						<th width="20%">Price</th>
						<th width="20%">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					foreach($this->bodyData['destinations'] as $key=>$value) {?>
						<tr><td width="20%"><?php echo $value['source']; ?></td>
						<td width="20%"><?php echo $value['destination'] ; ?></td>
						<td width="20%"><?php echo $value['weight'] ; ?></td>
						<td width="20%"><?php echo $value['price'] ; ?></td>
						<td width="20%"><?php echo '<a href="edit_destination_price/'.$value['id'].'"  onclick="return confirm(\'DO YOU WANT TO EDIT!\');"> Edit </a> '; ?>
						</td>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</section>
<!-- end: page -->
				

			