
				
					<header class="page-header">
						<h2>Shipment </h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Tables</span></li>
								<li><span>Ajax</span></li>
							</ol>
					
							
						</div>
					</header>

					<!-- start: page -->
						<section class="panel">
							<header class="panel-heading">
								<div class="panel-actions">
									<a href="#" class="fa fa-caret-down"></a>
									<a href="#" class="fa fa-times"></a>
								</div>
						
								<h2 class="panel-title">Shipment</h2>
							</header>
							<div class="panel-body">
							<?php if($this->session->flashdata('message_name'))
							 {?>
								<div class="alert alert-success">
								 
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<?php echo $this->session->flashdata('message_name'); ?>
								</div>
							<?php } ?>	
								<table class="table table-bordered table-striped" id="datatable-ajax"  data="<?php  echo $this->template->bodyData;?>">
									<thead>
									
										<tr>
											<th width="20%">Tracking ID</th>
											<th width="20%">Sender Name</th>
											<th width="25%">Address</th>
											<th width="25%">Receiver Name</th>
											<th width="25%">Receiver Address</th>
											<th width="25%">Weight</th>
											<!--<th width="25%">Status 1</th>
											<th width="25%">Status 2</th> -->
											<?php
									$userdata=$this->session->userdata('logged_in');
									if($userdata['type']=='su') { ?>
											<th width="25%">Action</th>
											<?php } ?>
										</tr>
									</thead>
									<tbody>
									<?php 
										foreach($this->bodyData['shipment'] as $key=>$value) {
											echo "<tr>";
										foreach ($value as $v){?>
											
											<td width="20%"><?php echo $v ; ?></td>
									<?php }
											echo "</tr>";
									} ?>		
									</tbody>
								</table>
							</div>
						</section>
					<!-- end: page -->
			<script type="text/javascript">		
					$(document).ready(function() {
    $('#datatable-ajax').dataTable( {
        
    } ); 
} );
$(".alertLink").click( function(){
	return confirm("Are you sure!");
});
</script>
				

			