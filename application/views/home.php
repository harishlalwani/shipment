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

            <!--



            Feature start

            //-->
            
            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Track Package</h4>
                  </div>
                  <div class="modal-body">
                    
                    <div id="tracking_info" style="display:none">
                    
                    
                    
                    </div>
                    
                    <div id="tracking_info_none" style="display:none">
                    	<p style="color:#F00">Invalid Tracking Number or no tracking information to show!</p>
                    </div>
                    
                    <div id="tracking_loading">
                    	<img src="<?=base_url()?>img/loading.gif" /> Tracking...
                    </div>
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-mb-3">

              <article class="envor-feature-4">

				<h3>Track a Shipment</h3>

                <div class="envor-widget envor-widget2 envor-links-widget">

              <div class="envor-widget-inner">

                <div class="quick_newsletter">

                  <form action="#">

                    <input id="tracking_id" placeholder="Enter Your Tracking Number" class="track" type="text">

                    <input value="Track Now" class="envor-btn envor-btn-primary envor-btn-normal" id="track_package" type="button">

                  </form>

                </div>

                <span id="subscribe_response_div"></span>

              </div>

            </div>             

                <p>Here's the fastest way to check the status of your shipment. No need to call Customer Service – our online results give you real-time, detailed progress as your shipment speeds through our network.</p>

              </article>

            <!--



            Feature end



            //-->

            </div>

            <!--



            Feature start



            //-->

            <div class="col-lg-3 col-mb-3">

              <article class="envor-feature-4">

				<h3>Find a Location</h3>

                <figure><img src="img/map.jpg" alt=""></figure>

                <p>Find locations near you to send a package.</p>

				<a href="" class="envor-btn envor-btn-primary envor-btn-normal">Find Location</a>

              </article>

            <!--



            Feature end



            //-->

            </div>

            <!--



            Feature start



            //-->

            <div class="col-lg-3 col-mb-3">

              <article class="envor-feature-4">

				<h3>Get a Quick Rate</h3>

                <div class="envor-widget envor-widget2 envor-links-widget">

              <div class="envor-widget-inner">

                <div class="quick_newsletter">

                  

                    <p><label for="rt2-from" style="float:left; padding-right: 10px;
  margin-top: 5px;">From</label>

                    <select id="source_id" name="rt2-from" >
					<?php foreach($this->bodyData['destinations'] as $value) { ?>
					<option value="<?php echo $value['id']; ?>"><?php echo $value['city']; ?></option>
					<?php } ?>

                     

                    </select>

					</p>
					<br />
					<br />
                    <p><label for="rt2-to" style="float:left; padding-right: 26px;
  margin-top: 5px;">To</label>

                    <select id="destination_id" name="rt2-to">
					<?php foreach($this->bodyData['destinations'] as $value) { ?>
					<option value="<?php echo $value['id']; ?>"><?php echo $value['city']; ?></option>
					<?php } ?>

                     

                    </select>

					</p>

                    <p><input type="submit" value="Enter" class="envor-btn envor-btn-normal envor-btn-primary" id="get_rate"></p>
					

                  

                </div>

                <span id="subscribe_response_div"></span>

              </div>

            </div>

                <p>Get quick rates for different package destinations.</p>

              </article>

            <!--



            Feature end



            //-->

            </div>

			<!--



            Feature start



            //-->

            <div class="col-lg-3 col-mb-3">

              <article class="envor-feature-4">

				<h3>Schedule a Collection</h3>

                <figure><img src="img/collect.jpg" alt=""></figure>

                <p>To schedule a pickup, please contact your local Customer Service Centre.</p>

				<a href="" class="envor-btn envor-btn-primary envor-btn-normal">Contact Us</a>

              </article>

            <!--



            Feature end



            //-->

            </div>

          </div>

        </div>

      <!--



      More Features end



      //-->

      </section>

     

      

 

     

    <!--



    site content end



    //-->

    </div>