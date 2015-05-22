
				
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
						
								<h2 class="panel-title">Activity</h2>
							</header>
							<div class="panel-body">
							<?php if($this->session->flashdata('message_name'))
							 {?>
								<div class="alert alert-success">
								 
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<?php echo $this->session->flashdata('message_name'); ?>
								</div>
							<?php } ?>	
								<table class="table table-bordered table-striped" id="datatable-ajax" data-url="<?=base_url()?>admin/get_activities" data="<?php  echo $this->template->bodyData;?>">
									<thead>
									
										<tr>
											<th width="20%">User</th>
											<th width="25%">Activity</th>
											
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
						</section>
					<!-- end: page -->
				

			