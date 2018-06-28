<?php

include_once('Db.php');

$db = new Db;
$dbCon = $db->get();

$results=array();

$sql = "select `image` from plans WHERE `is_active` = 1;";
$query = $dbCon->prepare($sql);
$query -> execute();
$plans = $query -> fetchAll(PDO::FETCH_OBJ);

/*echo "<pre>";
print_r($results);
echo "</pre>";*/

$db->close();

$page_title="Home";

include_once('header.php');
?>

<!-- SLIDER -->
<section id="banner_eig">

  <div id="banner_eig_slider" class="owl-carousel owl-theme">
    <div class="item"><img src="images/banner-1.jpg"></div>
    <div class="item"><img src="images/banner-2.jpg"></div>
    <div class="item"><img src="images/banner-3.jpg"></div>
  </div>

  <div class="banner-search-area">
    <div class="container">
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 col-sm-12 col-xs-12">
          <div class="banner-search banner-video">
            
            <div class="pro-video">
                <a title="title here" data-height="420" data-width="900" class="html5lightbox" href="https://player.vimeo.com/video/102732914?title=0&amp;byline=0&amp;portrait=0&amp;color=11b1c2&amp;wmode=opaque"><img src="images/video-d-1.jpg" alt="image" />
                </a>
              </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- SLIDER --> 

<!-- RECENT PROPERTY -->
<section id="agent-p-2" class="property-details bg_light padding">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 bottom40">
        <h2 class="text-uppercase">Our <span class="color_red">PLANS</span></h2>
        <div class="line_1"></div>
        <div class="line_2"></div>
        <div class="line_3"></div>
        <p class="margin-t-20">List of our plans.
          <br>
        </p>
      </div>
    </div>
    <div class="col-md-12">
      <div class="row">
        <div id="property-2-slider" class="owl-carousel">

          <?php
            foreach($plans as $plan){
          ?>
          <div class="item">
            <div class="property_item bottom40">
              <div class="image">
                <img src="<?php echo $plan->image; ?>" alt="listin" class="img-responsive">
                <div class="price"><span class="tag">New</span></div>
                <div class="overlay">
                  <div class="centered"><a class="link_arrow white_border" href="#.">View Details</a></div>
                </div>
              </div>
            </div>
          </div>
          <?php
            }
          ?>

        </div>
      </div>
    </div>
  </div>
</section>
<!-- #/RECENT PROPERTY -->

<?php
include_once('footer.php');
?>