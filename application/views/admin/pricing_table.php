
				
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
								<table class="table table-bordered table-striped" id="datatable-ajaxq" >
									<thead>
										<tr>
											<th width="20%">Destinations/Weights</th>
											<?php foreach($this->bodyData['weights'] as $key=>$value) {?>
											<th width="10%"><?php echo $value['weight']; ?></th>
											<?php } ?>
										</tr>
									</thead>
									<tbody>
										<?php foreach($this->bodyData['destinations'] as $key=>$value) {?>
											<tr><td width="20%"><?php echo $value['source']." to ".$value['destination'] ; ?></td>
											<?php 
											foreach(explode(',',$value['prices']) as $price) {?>
											<td width="10%"><?php echo $price; ?></td>
											<?php } 
											if(count(explode(',',$value['prices'])) < count($this->bodyData['weights']))
											{
												$repeat = count($this->bodyData['weights']) - count(explode(',',$value['prices']));
												while($repeat)
												{  ?>
													<td width="10%"><?php echo "N/A"; ?></td>
												<?php	$repeat--;
												}
											}
											?>
											
											
										<?php } ?>
									</tbody>
								</table>
							</div>
						</section>
					<!-- end: page -->
				

			