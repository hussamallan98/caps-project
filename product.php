<?php 

include("includes/header.php");
include("includes/classes.php");
$id=$_GET['id'];
$pro=new product();
$arr=$pro->readCatId($id);
$c=new category();
$cat=$c->readAll();
$main=$c->readById($id);
$image=$main[0]['cat_image'];
$vend=new vendor();




?>
    <!-- End Main Top -->

    <!-- Start Top Search -->
    
    <!-- End Top Search -->

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Shop</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Product</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Shop Page  -->
    <div class="shop-box-inner">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 sidebar-shop-left">
                    <div class="product-categori">
                        
                        <div class="filter-sidebar-left">
                            <div class="title-left">
                                <h3>Categories</h3>
                            </div>
                            <?php 
                            foreach ($cat as $k => $v) {
                                echo "<div  >";
                                echo " <div >";
                                echo "<a  href='product.php?id={$v['cat_id']}'  >{$v['cat_name']}
                                            </a>        ";
                                            echo "</div>";
                                            echo "</div>";
                            }
                            ?>  
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                    <div class="right-product-box">
                     

                        <div class="row product-categorie-box">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                    <div class="row">
                                        <?php 
                                        if (!empty($arr)) {
                                            
                                       
                                        foreach ($arr as $k => $v) {
                                            $vendorName=$vend->readById($v['v_id']);
                                            echo "<div class='col-sm-6 col-md-6 col-lg-4 col-xl-4'>";
                                            echo "<div class='products-single fix'>";
                                            echo "<div class='box-img-hover'>";
                                            echo "<img src='admin/img/product/{$v['pro_image']}' class='' height='250px !important'alt='Image'>";
                                            echo " <div class='mask-icon'>";
                                            echo "<a class='cart' href='product-detail.php?id={$v['pro_id']}'>Add to Cart</a>";
                                            echo " </div>";
                                            echo " </div>";
                                            echo "<div class='why-text'>";
                                            echo "<h4>{$v['pro_name']}</h4>";
                                            echo "<div class='row'> ";
                                            echo "<div class='col-md-6'> ";
                                            echo "<h5> \${$v['pro_price']}</h5>";
                                            echo "</div>";
                                            echo "<div class='col-md-6'> ";
                                            echo "<a href=''> {$vendorName[0]['v_name']}</a>";
                                            echo "</div>";
                                            echo "</div>";
                                            echo " </div>";
                                            echo " </div>";
                                            echo " </div>";

                                        }
                                         }else{
                                            echo "<div class='col-md-4'></div>";
                                            echo "<div class='col-md-6'>";
                                            echo "<h2 class='text-danger'>* No Product in this Category</h2>";
                                            echo "</div>";
                                         }
                                        ?>
                                        
                                            
                          
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
    <!-- End Shop Page -->

    <!-- Start Instagram Feed  -->
   <?php
    include("includes/footer.php");
   ?>