<?php

include("includes/header.php");
include("includes/classes.php");
$c=new category();
$arr=$c->readAll();


?>
    

    <!-- Start Main Top -->

    <!-- End Main Top -->

    <!-- Start Top Search -->
    
    <!-- End Top Search -->

    <!-- Start Slider -->
    <div id="slides-shop" class="cover-slides">
        <ul class="slides-container">
            <li class="text-left">
                <img src="images/banner-01.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Welcome To <br> The Way Shop</strong></h1>
                           
                            
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                <img src="images/banner-02.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Welcome To <br> The Way Shop</strong></h1>
                           
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-right">
                <img src="images/banner-03.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>Welcome To <br> The Way Shop</strong></h1>
                            
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <div class="slides-navigation">
            <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
            <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
        </div>
    </div>
    <!-- End Slider -->

    <!-- Start Categories  -->
    <div class="categories-shop">

        <div class="container">
              
                    
                    <div class="title-all text-center">   
                            <h1 >Categories</h1>
                    </div>
           
            <div class="row">
                <?php 
                    foreach ($arr as $k => $v) {
                        echo "<div class='col-lg-4 col-md-4 col-sm-12 col-xs-12'>";
                        echo "<div class='shop-cat-box'>";
                        echo "<img class='' height='352px !important'src='admin/img/category/{$v['cat_image']}' alt='' >";
                        echo "<a class='btn hvr-hover' href='product.php?id={$v['cat_id']}'>{$v['cat_name']}</a>";
                        echo "</div>";
                        echo "</div>";
                    }
                ?>
                
                
            </div>
        </div>
    </div>
    <!-- End Categories -->

    <!-- Start Products  -->
   
    <!-- End Products  -->

   
    <!-- End Blog  -->

<?php 
include("includes/footer.php");
?>
    