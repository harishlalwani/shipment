<!-- start: page -->
					<div class="row">
						<div class="col-md-12">
							<form id="form" method="post" action="<?=base_url()?>admin/upsert_user" class="form-horizontal">
								<section class="panel">
									<header class="panel-heading">
                                    
                                    	<?php
										$message = $this->session->flashdata('success');
										if($message){?>
                                    		<div style="color:#0C0;font-weight:bold;font-size:2em;padding-bottom:10px;"><?=$message?></div>
                                        <?php }?>
                                        
										<div class="panel-actions">	
										</div>

										<h2 class="panel-title">User</h2>
									</header>
									<div class="panel-body">
									<?php if(isset($this->bodyData['user']['id'])) { ?>
										<input type="hidden" name="id" value="<?php echo $this->bodyData['user']['id'];?>" />
									<?php } ?>
										<div class="form-group">
											<label class="col-sm-3 control-label">Username<span class="required">*</span></label>
											<div class="col-sm-9">
											<?php if(isset($this->bodyData['user']['username'])) { ?>
												<input type="text" name="username" class="form-control" placeholder="eg.: John Doe" value="<?php echo $this->bodyData['user']['username']?>" required/>
												<?php } else {?>
												<input type="text" name="username" class="form-control" placeholder="eg.: John Doe"  required/>
												<?php } ?>
											</div>
										</div>
										<?php if(!isset($this->bodyData['user']['username'])) { ?>
										<div class="form-group">
											<label class="col-sm-3 control-label">Password</label>
											<div class="col-sm-9">
												<input type="password" name="password" class="form-control" placeholder="" />
											</div>
										</div>
										<?php } ?>
										
										<div class="form-group">
												<label class="col-md-3 control-label">Type</label>
												<div class="col-md-6">
													<select data-plugin-selectTwo class="form-control populate" name="type">
													<?php if(isset($this->bodyData['user']['type'])) { ?>
															<option value="su"
															<?php echo $this->bodyData['user']['type'] == 'su'? 'selected': '' ?>>Super User</option>
															<option value="u" <?php echo $this->bodyData['user']['type'] == 'u'? 'selected': '' ?>>User</option>
													<?php  }else { ?>	
													<option value="su"
													>Super User</option>
													<option value="u" >User</option>
													<?php }	?>	
													</select>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-3 control-label"></label>
												<div class="col-md-6 col-xs-11">
													<button class="btn btn-sm btn-primary" data-plugin-colorpicker data-color-format="hex" data-color="rgb(255, 255, 255)">Submit</button>
												</div>
											</div>
										
									</div>
								</section>
								
								
								
								
							</form>
						</div>
						<!-- col-md-6 -->
						
					</div>
					
					<!-- end: page -->