
   <?php 
   session_start();
   ob_start();
   include("includes/header.php");
   include("includes/classes.php");
   $conn = mysqli_connect("localhost","root","","final_project");
   if (isset($_POST['save'])) {
       if($_SESSION['cust-id']){
         $date=date("Y/m/d");
         $id=$_SESSION['cust-id'];
$query="insert into orders (order_date,cust_id) values('$date','$id') ";
mysqli_query($conn,$query);
$last=mysqli_insert_id($conn);
foreach ($_SESSION['cart'] as $key => $value) {
   
    $query1="select * from product where pro_name='{$key}'";
    $data=mysqli_query($conn,$query1);
    $row =mysqli_fetch_assoc($data);
    
    $pro_name=$row['pro_name'];
    $pro_image=$row['pro_image'];
    $v_id=$row['v_id'];
    $total1=$row['pro_price']*$value;
    $query3="insert into order_details(order_id,pro_name,pro_image,qty,total,v_id) values('{$last}','{$pro_name}','{$pro_image}',{$value},'{$total1}','{$v_id}')";
    mysqli_query($conn,$query3);
    unset($_SESSION['cart'][$key]);
    


}
echo "<script > alert('Your orders are completed');
    
    </script>";



         }else{
            header("location:login/login-customer.php");
         }
   }
   if (isset($_POST['update'])) {
    
        
        unset($_SESSION['cart'][$_POST['qty1']]);


   }
   
    

   $conn = mysqli_connect("localhost","root","","final_project");
   $total1=0;

   
   
   ?>

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Checkout</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Shop</a></li>
                        <li class="breadcrumb-item active">Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Cart  -->
  
    <div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Images</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Delete</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                               
                                <?php 
                                
                                foreach ($_SESSION['cart'] as $key => $value) {
                                     $query="select * from product where pro_name='{$key}'";
                                     $data  =mysqli_query($conn,$query);
                                     $row =mysqli_fetch_assoc($data);
                                    //echo $row['pro_image'];
                                        if ($key=='admin-id' or $key=='cust-id' or $key=='vend-id' ) {
                                            continue;
                                        }else{
                                            echo " <form action='' method='post'>";

                                            echo "<input type='hidden'   name='qty1' class='text-center' value='{$row['pro_name']}'>";
                                        echo " <tr>";
                                        echo " <td class='thumbnail-img'>";
                                        echo "<a href=''>";
                                        echo "<img class='img-fluid' src='admin/img/product/{$row['pro_image']}' alt='' />";
                                        echo "</a>";
                                        echo "</td>";
                                        echo "<td class='name-pr '>";
                                        
                                        echo "<p>".$row['pro_name']."</p>";
                                       
                                        echo "</td>";
                                        echo "<td class='price-pr'>";
                                        echo "\${$row['pro_price']}</p>";
                                        echo "</td>";
                                        echo "<td class='quantity-box'><input type='number' size='4' disabled value='{$value}' min='0' step='1' class='c-input-text qty text' name='qty'></td>";
                                        $total=$value*$row['pro_price'];
                                        $total1+=$total;
                                        echo "<td class='total-pr '>
                                                <p>\$ {$total}</p>
                                              </td>";
                                              
                                              echo "<td> <button type='submit' name='update' class='btn hvr-hover text-light'><i class='fa fa-trash'></i></button></td>";

                                        

                                        echo "</tr>";
                                        echo "</form>";
                                       
                                  }
                                    
                                }
                                ?>                         
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <hr>
            
                

            <div class="row">
            
                <div class="d-flex gr-total ml-auto">
                    <h5> Total</h5>
                    <div class="ml-5 mr-5 h5"> $ <?php echo $total1;?> </div>
                </div>

            </div>
            <hr>
            

            
            
            <div class="row">
                <div class="col-md-9"></div>
                <form action="" method="POST">
                    <div class="cart-and-bay-btn col-md-3 ">
                <button type="submit" name="save"  class="btn hvr-hover text-light ml-5"style="padding:9px;">Check Out</button>
            </div>

        </div>

         </form>
        </div>
        
    </div>

    <!-- End Cart -->

   <?php 
   include("includes/footer.php");
   ?>