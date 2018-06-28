<?php

$page_title="Contact Us";

include_once('header.php');
?>

<!--===== PAGE TITLE =====-->
<div class="page-title page-main-section parallaxie" style="background-image: url(images/titlebg-1.jpg);">
  <div class="container padding-bottom-top-120 text-uppercase text-center">
    <div class="main-title">
      <h1>Contact us</h1>
      <h5>Quotation</h5>
      <div class="line_4"></div>
      <div class="line_5"></div>
      <div class="line_6"></div>
    </div>
  </div>
</div>
<!--===== #/PAGE TITLE =====-->

<!--===== CONTACT US =====-->
<section id="contact-us-2" class="padding parallaxie">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="address-box">
                            <h4>SAMUHA CREATIONS</h4>
                            <p>Mon - Sat</p>
                            <p>9 AM - 6 PM</p>
                        </div>
                    </div>
					<div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="address-box">
                            <h4>CORPORATE OFFICE</h4>
                            <p>Hyderabad</p>
                            <p>Address: 4th Floor, RC Reddy Complex, Uppal Ring Road, Beside Metro, Uppal, Medchal, Telangana - 500 039</p>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="address-box">
                            <h4>CONTACT NUMBERS</h4>
                            <p><i style="font-size:17px;" class="icon-telephone114"></i> +91 9059169892</p>
                        </div>
                    </div>
                </div>

                <div class="row padding_top">
                  <div class="col-md-12">

                    <div class="bottom40">
                      <h2 class="text-uppercase">Our <span class="color_red"> Location </span></h2>
                      <div class="line_1"></div>
                      <div class="line_2"></div>
                      <div class="line_3"></div>
                    </div>

                    <div class="contact">
                      <div id="map"></div>
                    </div>
                  </div>
                </div>


            </div>
        </div>

    </div>

</section>
<!--===== #/CONTACT US =====-->

<?php
include_once('footer.php');
?>

<script type="text/javascript">
  function initMap(){

    var options ={
      zoom:14,
      center: {lat: 17.399073,lng:78.560405}
    }

    var map =new google.maps.Map(document.getElementById('map'),options);

    var marker =new google.maps.Marker({
      position: {lat: 17.399073,lng:78.560405},
      map:map
    });

    var infoWindow=new google.maps.InfoWindow({
      content:'<h3>Samuha Creations</h3><p>4th Floor, RC Reddy Complex, Uppal Ring Road, <br>Beside Metro, Uppal, Medchal, Telangana - 500 039</p>'
    });
    marker.addListener('click',function(){
      infoWindow.open(map,marker);
    })

  }
</script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=
AIzaSyBYK-tCn8KAZw0cFKbAkO_nNpkbBgjel8k
&callback=initMap">
</script>
