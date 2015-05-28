<!--



    footer start



    //-->

    <footer class="envor-footer">

      <div class="container">

        <div class="row">

          

          

          <!--



          Footer Copyright start



          //-->

          <div class="col-lg-12">

            <div class="envor-widget envor-copyright-widget">

              <div class="envor-widget-inner">

                <p>© Copyright 2015 by <a href="">DHL</a>. All Rights Reserved.</p>

                <p><a href="">Home</a> / <a href="">Our Office</a></p>

              </div>

            </div>

          <!--



          Footer Copyright end



          //-->

          </div>

        </div>

      </div>

    <!--



    footer end



    //-->

    </footer>



    <!-- Bootstrap core JavaScript

    ================================================== -->

    <!-- Placed at the end of the document so the pages load faster -->

        <script src="js/vendor/jquery-1.11.0.min.js"></script>



    <script src="js/vendor/core-1.0.5.js"></script>



    <script src="js/bootstrap.min.js"></script>

    <script src="js/jquery.mCustomScrollbar.min.js"></script>

    <script src="js/jquery.mousewheel.min.js"></script>

    <script src="js/jquery.colorbox-min.js"></script>

    <script src="js/preloadCssImages.jQuery_v5.js"></script>

    <script src="js/jquery.stellar.min.js"></script>

    <!--

    * jQuery with jQuery Easing, and jQuery Transit JS

    //-->

    <script src="js/layerslider/jquery-easing-1.3.js" type="text/javascript"></script>

    <script src="js/layerslider/jquery-transit-modified.js" type="text/javascript"></script>

    <!--

    * LayerSlider from Kreatura Media with Transitions

    -->

    <script src="js/layerslider/layerslider.transitions.js" type="text/javascript"></script>

    <script src="js/layerslider/layerslider.kreaturamedia.jquery.js" type="text/javascript"></script>

    <script src="js/jquery.rivathemes.js"></script>

    <script type="text/javascript">

      $('document').ready(function() {

          /*



          Home Page Layer Slider



          */

          $('#layerslider').layerSlider({

            skinsPath               : 'css/layerslider/skins/',

            skin : 'fullwidth',

            thumbnailNavigation : 'hover',

            hoverPrevNext : false,

            responsive : false,

            responsiveUnder : 1170,

            sublayerContainer : 1170

          });
		  
		  $(function(){
					
			$("#track_package").click(function()
			{
				
				$('#myModal').modal("hide");
				
				var tracking_id = $("#tracking_id").val();
				if(!tracking_id)
				{
					 $("#tracking_id").focus();
					 return false;	
				}
				
				
				$("#myModal #tracking_info").hide();
				$("#myModal #tracking_info").html('');
				$("#myModal #tracking_info_none").hide();
				$("#myModal #tracking_loading").show();
				
				$('#myModal').modal("show");
				
				
				
				
				
				$.post("", {tracking_id:tracking_id}, function(result)
				{
					$("#myModal #tracking_loading").hide();
					
					if(result.result == 0)
					{
						$("#myModal #tracking_info_none").show();
					}
					else
					{
						$("#myModal #tracking_info").html('');
						$.each(result.locations, function(index, value)
						{
							$("#myModal #tracking_info").append('<p>'+value.location+'</p>');
						});
						
						$("#myModal #tracking_info").show();
						$("#myModalLabel").html('Track Package');
					}
					
					
				
				}, "JSON");
				
			});
			
			$("#get_rate").click(function()
			{
				
				
				$('#myModal').modal("hide");
				
				var source_id = $("#source_id").val();
				var destination_id = $("#destination_id").val();
				/* if(!source_id  || !destination_id)
				{
					 $("#destination_id").focus();
					 return false;	
				} */
				
				
				$("#myModal #tracking_info").hide();
				$("#myModal #tracking_info").html('');
				$("#myModal #tracking_info_none").hide();
				$("#myModal #tracking_loading").show();
				
				$('#myModal').modal("show");
				
				
				
				
				
				$.post("<?=base_url()?>home/get_pricing", {source_id:source_id, destination_id:destination_id}, function(result)
				{
					
					
					if(result == 0)
					{
						
						$("#myModal #tracking_info_none").show();
					}
					else
					{
						$("#myModal #tracking_loading").hide();
						$("#myModal #tracking_info").html('');
						$("#myModal #tracking_info").append(result);
						$("#myModal #tracking_info").show();
						$("#myModalLabel").html('Delivery Price');
						
						
					}
					
					
				
				}, "TEXT");
				
				
			});
			
			
		});  
			

      });

    </script>

    <script src="js/envor.js"></script>

    <script type="text/javascript">

      /*



      Windows Phone 8 и Internet Explorer 10



      */

      if (navigator.userAgent.match(/IEMobile\/10\.0/)) {

        var msViewportStyle = document.createElement("style")

        msViewportStyle.appendChild(

          document.createTextNode(

            "@-ms-viewport{width:auto!important}"

          )

        )

        document.getElementsByTagName("head")[0].appendChild(msViewportStyle)

      }

    </script>

  </body>

</html>