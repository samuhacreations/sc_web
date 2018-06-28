<?php

if(isset($_GET['id']) && strlen($_GET['id']) > 0){
  $id=$_GET['id'];

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

  $page_title=$plan_cat_details[0]->name;

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

  <?php

  if(isset($_GET['page']) && $_GET['page'] > 0){
    $page=$_GET['page'];
  }else{
    $page="";  
  }

  if($page=="" || $page==1){
    $sql_offset = 0; 
  }else{
    $sql_offset=($page*3)-3;
  }

  $sql = "SELECT 
              id,
              name,
              title,
              description,
              start_amount,
              tax_id,
              tenure_id,
              image,
              plan_category_id
          FROM
              sc_db.plans
          WHERE
              is_active = 1 AND plan_category_id = $id LIMIT $sql_offset , 3;";


  $query = $dbCon->prepare($sql);
  $query -> execute();
  $plans = $query -> fetchAll(PDO::FETCH_OBJ);

  $sql = "SELECT 
              id
          FROM
              sc_db.plans
          WHERE
              is_active = 1 AND plan_category_id = $id;";


  $query = $dbCon->prepare($sql);
  $query -> execute();
  $rowCount = $query -> rowCount();
  $numberOfPages=ceil($rowCount/3);


  if(count($plans)>0){

  ?>

  <!-- PROPERTY LISTING -->
  <section id="property" class="bg_light padding">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 bottom40">
          <h2 class="uppercase"><?php echo $plan_cat_details[0]->name;?> <span class="color_red">PLANS</span></h2>
          <div class="line_1"></div>
          <div class="line_2"></div>
          <div class="line_3"></div>
          <p>List of plans in this category.</p>
        </div>
      </div>
      <div class="row">

        <?php 
          foreach ($plans as $plan) {
          ?>

          <div class="col-md-4 col-sm-6">
            <div class="property_item bottom40">
              <div class="image">
                <img src="<?php echo "$plan->image";?>" alt="listin" class="img-responsive">
                <div class="overlay">
                <div class="centered"><a class="link_arrow white_border" href="plan_details.php?id=<?php echo $plan->id;?>">View Details</a></div>
                </div>
              </div>
              <div class="proerty_content">
                <div class="proerty_text">
                  <h3><a href="plan_details.php?id=<?php echo $plan->id;?>"><?php echo "$plan->name";?></a></h3>
                  <span><?php echo "$plan->title";?></span>
                  <p class="p-font-15"><?php echo "$plan->description";?></p>
                </div>
              </div>
            </div>
          </div>


        <?php 
        }
      }else{
        ?>
    <section id="property" class="bg_light padding">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 bottom40">
          <h2 class="uppercase"><?php echo $plan_cat_details[0]->name;?> <span class="color_red">PLANS</span></h2>
          <div class="line_1"></div>
          <div class="line_2"></div>
          <div class="line_3"></div>
          <p>List of plans in this category.</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 col-sm-12 text-center">
          <i>No plans in this category</i>
        </div>
      </div>
        <?php
      }
      ?>

      </div>
      <div class="row">
        <div class="col-md-12">
          <ul class="pager">

            <?php
            for($i=1;$i<=$numberOfPages;$i++){
            ?>
            <li class="active"><a href="plans.php?id=<?php echo $id;?>&page=<?php echo $i;?>"><?php echo $i;?></a></li>
            <?php
            }
            ?>

          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- PROPERTY LISTING -->

<?php
  include_once('footer.php');

}else{
    header('Location: investments.php');

}
?>