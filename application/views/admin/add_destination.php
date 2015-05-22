<!-- start: page -->
					<div class="row">
						<div class="col-md-12">
							<form id="form" method="post" action="<?=base_url()?>admin/save_destination" class="form-horizontal">
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
											<label class="col-sm-4 control-label" >Destination<span class="required" >*</span></label> 
											<div class="col-sm-5" >
												
												<select id="destination" name="destination">
					<?php foreach($this->bodyData['cities'] as $value) { ?>
					<option value="<?php echo $value['id']; ?>"><?php echo $value['city']; ?></option>
					<?php } ?>
					</select>
											</div><br /><br /> <br />
											<label class="col-sm-4 control-label" >Source<span class="required" >*</span></label> 
											<div class="col-sm-5" >
												<select id="source" name="source">
					<?php foreach($this->bodyData['cities'] as $value) { ?>
					<option value="<?php echo $value['id']; ?>"><?php echo $value['city']; ?></option>
					<?php } ?>
					</select>
											</div><br /><br /> <br />
											<?php foreach($this->bodyData['weights'] as $key=>$value) {?>
											<label class="col-sm-4 control-label" style="">Weight <?php echo $value['weight'];?><span class="required" >*</span></label> 
											<div class="col-sm-5" >
												<input type="text" name="<?php echo $value['id'];?>" class="form-control"  value="" required/>
											</div><br /><br />
											<?php }?>
											<br /><div class="col-sm-8" style="text-align:center">
											
												<input type="submit" name="submit" class="btn btn-primary"  value="Submit" />
												<button type="reset" class="btn btn-default">Reset</button>
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