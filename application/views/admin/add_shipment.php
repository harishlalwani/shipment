<!-- start: page -->
					<div class="row">
						<div class="col-md-12">
							<form id="form" method="post" action="<?=base_url()?>admin/upsert_shipment" class="form-horizontal">
								<section class="panel">
									<header class="panel-heading">
                                    
                                    	<?php
										$message = $this->session->flashdata('success');
										if($message){?>
                                    		<div style="color:#0C0;font-weight:bold;font-size:2em;padding-bottom:10px;"><?=$message?></div>
                                        <?php }?>
                                        
										<div class="panel-actions">	
										</div>

										<h2 class="panel-title">Customer Form</h2>
									</header>
									<div class="panel-body">
										<div class="form-group">
											<label class="col-sm-3 control-label">Full Name <span class="required">*</span></label>
											<div class="col-sm-9">
											<?php
												$id = 0;
												if(isset($this->bodyData['shipment'])) { 
												$shipment = $this->bodyData['shipment'] ;
												$id = $shipment['id'];
												if(isset($shipment['full_name'])){ 
											?>
												<input type="hidden" name="id" class="form-control" value="<?php echo $id; ?>" required/>
												<input type="text" name="fullname" class="form-control" placeholder="eg.: John Doe" value="<?php echo $shipment['full_name']; ?>" required/>
												
											<?php } }else { ?>
												<input type="text" name="fullname" class="form-control" placeholder="eg.: John Doe" required/>
												
											<?php  }?>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Address</label>
											<div class="col-sm-9">
											<?php 
												if(!isset($shipment['address'])){ 
											?>
												<input type="text" name="address" class="form-control" placeholder="address" />
											<?php } else { ?>
												<input type="text" name="address" class="form-control" placeholder="address" value="<?php echo $shipment['address']; ?>"/>
											<?php } ?>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Phone <span class="required">*</span></label>
											<div class="col-sm-9">
											<?php 
												
												if(!isset($shipment['phone'])){ 
											?>
												<input type="text" name="phone" class="form-control" placeholder="phone" />
											<?php } else { ?>
												<input type="text" name="phone" class="form-control" placeholder="phone" value="<?php echo $shipment['phone']; ?>"/>
											<?php } ?>	
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Email <span class="required">*</span></label>
											<div class="col-sm-9">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-envelope"></i>
													</span>
												<?php 
												
												if(!isset($shipment['email'])){ 
												?>	
													<input type="email" name="email" class="form-control" placeholder="eg.: email@email.com" required/>
												<?php } else { ?>
												<input type="text" name="email" class="form-control" placeholder="eg.: email@email.com" value="<?php echo $shipment['email']; ?>"/>
											<?php } ?>	
												</div>
											</div>
											<div class="col-sm-9">

											</div>
										</div>
										
									</div>
								</section>
								
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">	
										</div>

										<h2 class="panel-title">Shipping Address</h2>
										
									</header>
									<div class="panel-body">
										<div class="form-group">
											<label class="col-sm-3 control-label">Receiver Name <span class="required">*</span></label>
											<div class="col-sm-9">
											<?php
												if(!isset($shipment['receiver_name'])){ 
												?>	
												<input type="text" name="receiver_name" class="form-control" placeholder="eg.: John Doe" required/>
											<?php } else { ?>
												<input type="text" name="receiver_name" class="form-control" placeholder="eg.: John Doe" value="<?php echo $shipment['receiver_name']; ?>" required/>
											<?php } ?>	
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Receiver Address <span class="required">*</span></label>
											<div class="col-sm-9">
											<?php 
												if(!isset($shipment['receiver_address'])){ 
												?>
												<input type="text" name="receiver_address" class="form-control" placeholder="eg.: recever address" required/>
												<?php } else { ?>
												<input type="text" name="receiver_address" class="form-control" placeholder="eg.: John Doe" value="<?php echo $shipment['receiver_address']; ?>" required/>
											<?php } ?>
											</div>
										</div>
                                        
                                        <div class="form-group">
											<label class="col-sm-3 control-label">City <span class="required">*</span></label>
											<div class="col-sm-9">
											<?php 
												if(!isset($shipment['city'])){ 
												?>
												<input type="text" name="city" class="form-control" placeholder="eg.: recever city (min 3)" required/>
											<?php } else { ?>
												<input type="text" name="city" class="form-control" placeholder="eg.: recever city (min 3)" value="<?php echo $shipment['city']; ?>" required/>
											<?php } ?>	
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-sm-3 control-label">Receiver Phone</label>
											<div class="col-sm-9">
											<?php 
												if(!isset($shipment['receiver_phone'])){ 
												?>
												<input type="text" name="receiver_phone" class="form-control" placeholder="eg.: receiver phone" />
												<?php } else { ?>
												<input type="text" name="receiver_phone" class="form-control" placeholder="eg.: receiver phone" value="<?php echo $shipment['receiver_phone']; ?>" />
											<?php } ?>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Receiver Instructions<span class="required">*</span></label>
											<div class="col-sm-9">
											<?php 
												if(!isset($shipment['receiver_instructions'])){ 
												?>
												<textarea name="receiver_instruction" rows="5" class="form-control" placeholder="Describe your instructions" required></textarea>
											<?php } else { ?>	
												<textarea name="receiver_instruction" rows="5" class="form-control" placeholder="Describe your instructions" required><?php echo $shipment['receiver_instructions']; ?>
												</textarea>
											<?php } ?>
											</div>
										</div>
									</div>
								</section>
								
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">	
										</div>

										<h2 class="panel-title">Package Details</h2>
										
									</header>
									<div class="panel-body">
										<div class="form-group">
											<label class="col-sm-3 control-label">Weight <span class="required">*</span></label>
											<div class="col-sm-9">
											<?php 
												if(!isset($shipment['weight'])){ 
												?>
												<input type="text" name="weight" class="form-control" placeholder="eg.: weight" required/>
											<?php } else { ?>	
												<input type="text" name="weight" class="form-control" placeholder="eg.: weight" value="<?php echo $shipment['weight']; ?>" required/>
											<?php } ?>	
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Items<span class="required">*</span></label>
											<div class="col-sm-9">
											<?php 
												if(!isset($shipment['items'])){ 
												?>
												<textarea name="items" rows="5" class="form-control" placeholder="Describe your items" required></textarea>
											<?php } else { ?>	
												<textarea name="items" rows="5" class="form-control" placeholder="Describe your items"  required><?php echo $shipment['items']; ?>
												</textarea>
											<?php } ?>		
											</div>
										</div>
									</div>
									<footer class="panel-footer">
										<div class="row">
											<div class="col-sm-9 col-sm-offset-3">
												<button class="btn btn-primary">Submit</button>
												<button type="reset" class="btn btn-default">Reset</button>
											</div>
										</div>
									</footer>
								</section>
							</form>
						</div>
						<!-- col-md-6 -->
						
					</div>
					
					<!-- end: page -->