<?php

include_once('Db.php');

$db = new Db;
$dbCon = $db->get();

$results=array();

$sql = "SELECT 
    *
FROM
    sc_db.plan_categories
WHERE
    is_active = 1;";
$query = $dbCon->prepare($sql);
$query -> execute();
$plan_categories = $query -> fetchAll(PDO::FETCH_OBJ);

/*echo "<pre>";
print_r($plan_categories);
echo "</pre>";*/

$db->close();

$page_title="Investments";

include_once('header.php');

?>

<!-- SLIDER -->
<section id="banner_eig">

  <div id="banner_eig_slider" class="owl-carousel owl-theme">
    <div class="item"><img src="images/banner-1.jpg"></div>
    <div class="item"><img src="images/banner-2.jpg"></div>
    <div class="item"><img src="images/banner-3.jpg"></div>
  </div>
</section>
<!-- SLIDER --> 


<!-- PROPERTY LISTING -->
<section id="property" class="bg_light padding">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 bottom40">
        <h2 class="uppercase">Our <span class="color_red">Investment Options</span></h2>
        <div class="line_1"></div>
        <div class="line_2"></div>
        <div class="line_3"></div>
        <p>List of our investment options.</p>
      </div>
    </div>

	<div class="row">

		<?php 
		foreach ($plan_categories as $plan_category) {
		?>

        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="plans.php?id=<?php echo $plan_category->id;?>"><img class="card-img-top" src="<?php echo $plan_category->image;?>" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="plans.php?id=<?php echo $plan_category->id;?>"><?php echo $plan_category->name;?></a>
              </h4>
              <p class="card-text"><?php echo $plan_category->description;?></p>
            </div>
          </div>
        </div>

        <?php 
		}
		?>

      </div>
      <!-- /.row -->
    

  </div>
</section>
<!-- PROPERTY LISTING -->

<?php
include_once('footer.php');
?>