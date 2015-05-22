
				
					<!--



    site content start



    //-->

    <div class="envor-content">

      <!--



      LayerSlider start



      //-->

      <section class="envor-section envor-home-slider">

      <div id="layerslider" class="envor-layerslider" style="height: 350px;">

        <!--LayerSlider layer-->

        <div class="ls-layer" style="transition3d: 1,4,5,11; transition2d: 2,8,30;">

          <!--LayerSlider background-->

          <img class="ls-bg" src="img/slider-bg.jpg" alt="layer1-background">

          <!--<p class="envor-store-ls1 ls-s1" style="top: 40px; left: 15px; delayin: 200;"></p>

          <p class="envor-store-ls2 ls-s2" style="top: 110px; left: 15px; slidedirection : fade; scalein: -2;  delayin: 600;">on selected styles</p>

          <p class="envor-store-ls1 ls-s3" style="top: 370px; left: 15px; delayin: 1000; slidedirection: bottom;">the best way to save money is...</p>

          <p class="envor-store-ls1 ls-s4" style="top: 400px; left: 15px; delayin: 1050; slidedirection: bottom;">to keep it in your closet.</p>-->

        </div>

        <!--LayerSlider layer-->

        <div class="ls-layer" style="transition3d: 2,3,6,14; transition2d: 6,11,18;">

          <!--LayerSlider background-->

          <img class="ls-bg" src="img/slider-bg.jpg" alt="layer1-background">

          <!--<p class="envor-store-ls2 ls-s1" style="top: 120px; left: 15px; slidedirection: fade;">CLEARANCE</p>

          <p class="envor-store-ls1 ls-s2" style="top: 260px; left: 15px; delayin: 200; slidedirection: bottom;">UP TO <span>90%</span> OFF</p>

          <p class="ls-s3" style="top: 330px; left: 75px; delayin: 200; slidedirection: bottom;"><a href="" class="envor-btn envor-btn-primary envor-btn-normal">shop women</a></p>

          <p class="ls-s4" style="top: 330px; left: 235px; delayin: 200; slidedirection: bottom;"><a href="" class="envor-btn envor-btn-primary envor-btn-normal">shop men</a></p>-->

        </div>

        <!--LayerSlider layer-->

        <div class="ls-layer" style="transition3d: 2,3,6,14; transition2d: 3,8,24;">

          <!--LayerSlider background-->

          <img class="ls-bg" src="img/slider-bg.jpg" alt="layer1-background">

          <!--<div class="ls-s1 envor-store-price-1" style="top: 280px; left: 80px; slidedirection : fade; delayin: 200;">

            <p class="p1">women's tops</p>

            <p class="p2">from</p>

            <p class="p3">$10</p>

          </div>-->

        </div>

      </div>

      <!--



      LayerSlider end



      //-->

      </section>

      

	  <section class="envor-section">

        <div class="container">

          <div class="row">
					<!-- start: page -->
						<section class="panel">
							<header class="panel-heading">
								
						
								<h2 class="panel-title">Shipment Pricing</h2>
							</header>
							
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
							
						</section>
					<!-- end: page -->
					<!--



      More Features end



      //-->

      </section>

     

      

 

     

    <!--



    site content end



    //-->

    </div>
				

			