<?php

$page_title="Ventures";

include_once('Db.php');

$db = new Db;
$dbCon = $db->get();

$sql="SELECT 
  id, name
FROM
  sc_db.plan_categories
WHERE
  is_active = 1 AND id = $id;";
$query = $dbCon->prepare($sql);
$query -> execute();
$plan_cat_details = $query -> fetchAll(PDO::FETCH_OBJ);

/*  echo "<pre>";
print_r($plan_cat_details);
echo "</pre>";*/

include_once('header.php');
?>


<!-- PAGE TITLE -->
<div class="page-title page-main-section">
  <div class="container padding-bottom-top-120 text-uppercase text-center">
    <div class="main-title">
      <h1>Projects</h1>
      <h5>Ventures</h5>
      <div class="line_4"></div>
      <div class="line_5"></div>
      <div class="line_6"></div>
      <a href="index.php">home</a><span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span><a href="ventures.php">Projects</a> <i class="fa fa-angle-double-right" aria-hidden="true"></i><a href="ventures.php"> Ventures</a>
    </div>
  </div>
</div>
<!-- PAGE TITLE -->


<!-- LISTING -->
<section id="listings" class="padding">
  <div class="container">
    <div class="row bottom40">
      <div class="col-xs-12">
        <h2 class="uppercase"><span class="color_red">Ventures</span></h2>
        <div class="line_1"></div>
        <div class="line_2"></div>
        <div class="line_3"></div>
        <p class="heading_space"></p>
      </div>
    </div>
    <div class="row bottom30">
      <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="property_item heading_space">
          <div class="image">
            <img src="images/property-listing-1.jpg" alt="listin" class="img-responsive">
            <div class="overlay">
              <div class="centered"><a class="link_arrow white_border" href="property_details_1.html">View Project</a></div>
            </div>
            <div class="property_meta">
              <span><i class="fa fa-object-group"></i>530 sq ft </span>
              <span><i class="fa fa-bed"></i>2</span>
              <span><i class="fa fa-bath"></i>1 Bathroom</span>
            </div>
          </div>
          <div class="proerty_content">
            <div class="proerty_text">
              <h3><a href="property_details_1.html">House in New York City</a></h3>
              <span class="bottom10">Merrick Way, Miami, USA</span>
              <p><strong><i class="fa fa-inr"></i> 83,600,200</strong></p>
            </div>
            <div class="favroute clearfix">
              <p class="pull-left">Possession Date: 24th Nov 2018</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row top40">
      <div class="col-md-12">
        <ul class="pager">
          <li><a href="#.">1</a></li>
          <li class="active"><a href="#.">2</a></li>
          <li><a href="#.">3</a></li>
        </ul>
      </div>
    </div>
  </div>
</section>
<!--LISTING FILTER -->


<?php
include_once('footer.php');
?>