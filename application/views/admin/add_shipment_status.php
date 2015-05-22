<!-- start: page -->
					<div class="row">
						<div class="col-md-12">
                        
							<form id="form1" method="post" class="form-horizontal">
								<section class="panel">
									<header class="panel-heading">
                                    
                                    <?php
										$message = $this->session->flashdata('success');
										if($message){?>
                                    		<div style="color:#0C0;font-weight:bold;font-size:2em;padding-bottom:10px;"><?=$message?></div>
                                        <?php }
										
										$error = @$this->template->messages['error'];
										if($error){?>
                                    		<div style="color:#F00;font-weight:bold;font-size:2em;padding-bottom:10px;"><?=$error?></div>
                                        <?php } ?>
                                        
                                        
										<div class="panel-actions">
											
										</div>

										<h2 class="panel-title">Add New Shipment</h2>
										
									</header>
									<div class="panel-body">
                                    
                                    	<div class="form-group">
											<label class="col-sm-4 control-label">Tracking ID<span class="required">*</span></label>
											<div class="col-sm-8">
												<input type="text" name="tracking_id" class="form-control" value="<?=set_value("tracking_id")?>" required>
											</div>
										</div>
                                        
										<div class="form-group">
											<label class="col-sm-4 control-label">Location 1</label>
											<div class="col-sm-8">
												<input type="text" name="loc1" class="form-control" value="<?=set_value("loc1")?>" required>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 control-label">Location 2</label>
											<div class="col-sm-8">
												<input type="text" name="loc2" class="form-control" value="<?=set_value("loc2")?>">
											</div>
										</div>
									</div>
									<footer class="panel-footer">
										<button class="btn btn-primary">Submit </button>
										<button type="reset" class="btn btn-default">Reset</button>
									</footer>
								</section>
							</form>
						</div>

						
					</div>

					

					
					<!-- end: page -->