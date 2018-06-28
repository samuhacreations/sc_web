<?php

if(isset($_GET['id']) && strlen($_GET['id']) > 0){
  $id=$_GET['id'];
  include_once('Db.php');

  $db = new Db;
  $dbCon = $db->get();

  $results=array();

  $sql = "SELECT 
              id, name, title, description, image, plan_category_id
          FROM
              plans
          WHERE
              id = $id AND is_active = 1;";
  $query = $dbCon->prepare($sql);
  $query -> execute();
  $plan_details = $query -> fetchAll(PDO::FETCH_OBJ);
  $plan_details_obj = $plan_details[0];
/*  echo "<pre>";
  print_r($plan_details);
  echo "</pre>";
*/
  $db->close();

  $page_title=$plan_details_obj->name;
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

  <section id="term-condition" class="padding">
    <div class="container">

      <div class="row">
        <div class="col-md-12 bottom40">
          <h2 class="text-uppercase">Plan<span class="color_red"> VIEW</span></h2>
          <div class="line_1"></div>
          <div class="line_2"></div>
          <div class="line_3"></div>
        </div>
      </div>

      <div class="row bottom40">
        <div class="col-md-12">
          <div class="term-condition">
            <h3><?php echo $plan_details_obj->name;?></h3>
            <p><?php echo $plan_details_obj->description;?></p>
          </div>
        </div>
      </div>



    </div>
  </section>




<?php
  include_once('footer.php');
}else{
  header('Location: plans.php?id=1');
}
?>
