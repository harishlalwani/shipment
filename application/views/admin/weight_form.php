<!-- start: page -->
					<div class="row">
						<div class="col-md-12">
							<form id="form" method="post" action="<?=base_url()?>admin/add_weight" class="form-horizontal">
								<section class="panel">
									<header class="panel-heading">
                                    
                                    	<?php if($this->session->flashdata('message_name'))
							 {?>
								<div class="alert alert-success">
								 
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<?php echo $this->session->flashdata('message_name'); ?>
								</div>
							<?php } ?>
                                        
										<div class="panel-actions">	
										</div>

										<h2 class="panel-title">Weights</h2>
									</header>
									<div class="panel-body">
										<div class="form-group">
											<label class="col-sm-3 control-label" style="text-align:center !important;">Weight<span class="required" >*</span> <button onClick="return addInput()" class="btn btn-primary">Add Weight</button></label> <br /> <br /> <br />
											<?php foreach($this->bodyData['weights'] as $key=>$value) {?>
											<div class="col-sm-3" style="float:inherit !important ;">
												<input type="text" name="<?php echo $value['id'];?>" class="form-control"  value="<?php echo $value['weight'];?>" required/>
											</div><br />
											<?php }?>
											<br /><div class="col-sm-4" style="float:inherit !important ;">
												<input type="submit" name="submit" class="form-control btn btn-primary"  value="Submit" />
											</div><br />
											 
										</div>
										
										
									</div>
								</section>
								
								
								
								
							</form>
						</div>
						<!-- col-md-6 -->
						
					</div>
					
					<!-- end: page -->
<script>
function addInput(){
	alert('hy');
	console.log($('.col-sm-3:last').after('<br /><div class="col-sm-3" style="float:inherit !important ;"><input type="text" name="weight[]" class="form-control"  value="" required/></div>'));
}
</script>					