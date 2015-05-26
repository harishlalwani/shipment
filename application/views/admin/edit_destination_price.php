<!-- start: page -->
<div class="row">
	<div class="col-md-12">
		<form id="form" method="post" action="<?=base_url()?>admin/save_price" class="form-horizontal">
			<section class="panel">
				<header class="panel-heading">
				
					<?php
					$message = $this->session->flashdata('success');
					if($message){?>
						<div style="color:#0C0;font-weight:bold;font-size:2em;padding-bottom:10px;"><?=$message?></div>
					<?php }?>
					
					<div class="panel-actions">	
					</div>

					<h2 class="panel-title">Destination Price</h2>
				</header>
				<div class="panel-body">
				
					<input type="hidden" name="weight_id" value="<?php echo $this->bodyData['weight_id'];?>" />
					<input type="hidden" name="destination_id" value="<?php echo $this->bodyData['destination_id'];?>" />
					<input type="hidden" name="source_id" value="<?php echo $this->bodyData['source_id'];?>"  />
					
				
					<div class="form-group">
						<label class="col-sm-3 control-label">Source<span class="required">*</span></label>
						<div class="col-sm-9">
						
						<input type="text" name="source" value="<?php echo $this->bodyData['source']; ?>" class="form-control" readonly />
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-3 control-label">Destination<span class="required">*</span></label>
						<div class="col-sm-9">
						<input type="text" name="destination" value="<?php echo $this->bodyData['destination']; ?>" class="form-control" readonly />
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-3 control-label">Weight<span class="required">*</span></label>
						<div class="col-sm-9">
						
						<input type="text" name="weight" value="<?php echo $this->bodyData['weight']; ?>" class="form-control" readonly />
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-3 control-label">Price<span class="required">*</span></label>
						<div class="col-sm-9">
						<input type="text" name="price" value="<?php echo $this->bodyData['price']; ?>" class="form-control" />
						
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