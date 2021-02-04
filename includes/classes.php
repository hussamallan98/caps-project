<?php 

require('dbclass.php');


class Admin extends dbconnection{

	public $admin_id;
	public $admin_email;
	public $admin_password;
	public $admin_name;
	public $admin_image;
	
	

	public function create(){
		$query = "INSERT INTO admin(admin_email,admin_password,admin_name,admin_image)
				 VALUES('$this->admin_email','$this->admin_password','$this->admin_name','$this->admin_image')";
		$this->performQuery($query);
	}

	public function readAll(){
		$query  = "SELECT * FROM admin";
		$result = $this->performQuery($query);
		return $this->fetchAll($result);
	}
	public function readById($id){
		$query  = "SELECT * FROM admin WHERE admin_id = $id";
		$result = $this->performQuery($query);
		return $this->fetchAll($result);	
	}
	public function update($id){
		
   if(empty($this->admin_image)) {
        
	

		$query = " UPDATE admin SET admin_email    = '$this->admin_email',
								    admin_name     = '$this->admin_name',
								    admin_password = '$this->admin_password'
								   WHERE admin_id = $id";
								}
								   else {
								   	
	
		$query = " UPDATE admin SET admin_email    = '$this->admin_email',
								    admin_name     = '$this->admin_name',
								    admin_password = '$this->admin_password',
								    admin_image    = '$this->admin_image'
								   WHERE admin_id = $id";								   }




                          
		$this->performQuery($query);
	}
	public function delete($id){

		//$id=$_GET['delete_id'];
		$query = "DELETE FROM admin WHERE admin_id =$id ";
		$this->performQuery($query);
	
	}
	public function login($email,$pass)
    {
        $query="select * from admin
                where admin_email='$email' AND admin_password='$pass' ";
                $result = $this->performQuery($query);
                return $this->fetchAll($result);
    }
	
//customer class
}
class customer extends dbconnection{
	public $cust_id;
	public $cust_name;
	public $cust_email;
	public $cust_password;
	public $cust_mobile;
	public $cust_address;
	public $cust_image;
	public $err;

	

     public function login($email,$pass)
    {
    	$query="SELECT * from customer
                where cust_email='$email' AND cust_password='$pass' ";
                $result=$this->performQuery($query);
                return $this->fetchAll($result);
    }

	public function create(){

$query="SELECT * FROM customer where cust_email='$this->cust_email'";

       $result = $this->performQuery($query);

       //$numUsers = mysqli_num_rows($result);

    if ( mysqli_num_rows($result)>0){ 
                       
                     return $this->err="";

                 }else{ 


		$query = "INSERT INTO customer(cust_name,cust_email,cust_password,
									  cust_address,cust_mobile,cust_image)
				 VALUES('$this->cust_name','$this->cust_email','$this->cust_password',
				 		'$this->cust_address','$this->cust_mobile','$this->cust_image')";
		$this->performQuery($query);

	}
}

	public function readAll(){
		$query  = "SELECT * FROM customer";
		$result = $this->performQuery($query);
		return $this->fetchAll($result);
	}
	public function readById($id){

		$query  = "SELECT * FROM customer WHERE cust_id = $id";
		$result = $this->performQuery($query);
		return $this->fetchAll($result);	
	}
	public function update($id)
	{

		if(empty($this->cust_image)) {
        
		$query = "UPDATE customer SET cust_name    ='$this->cust_name',
								   cust_email   ='$this->cust_email',
								   cust_password='$this->cust_password',
								   cust_address     ='$this->cust_address',
								   cust_mobile  ='$this->cust_mobile'
								   
								   WHERE cust_id = $id";
								}
								   else {
								   	
		$query = "UPDATE customer SET cust_name    ='$this->cust_name',
								   cust_email     ='$this->cust_email',
								   cust_password='$this->cust_password',
								   cust_address     ='$this->cust_address',
								   cust_mobile  ='$this->cust_mobile',
								   cust_image       = '$this->cust_image'
								   WHERE cust_id = $id";
								   }

		$this->performQuery($query);
	}
	public function delete($id){
		$query = "DELETE FROM customer WHERE cust_id = $id";
		$this->performQuery($query);
	}
	//public function login($email,$pass)
	public function custOrder($id){
		$query  = "SELECT * FROM order WHERE cust_id = $id";
		$result = $this->performQuery($query);
		return $this->fetchAll($result);

	}

}

// class vendor :
class vendor extends dbconnection{
	public $v_id;
	public $v_name;
	public $v_email;
	public $v_password;
	public $v_mobile;
	public $v_address;
	public $v_image;
	public $err;

	

     public function login($email,$pass)
    {
    	$query="SELECT * from vendor
                where v_email='$email' AND v_password='$pass' ";
                $result=$this->performQuery($query);
                return $this->fetchAll($result);
    }

	public function create(){

$query="SELECT * FROM vendor where v_email='$this->v_email'";

       $result = $this->performQuery($query);

       //$numUsers = mysqli_num_rows($result);

    if ( mysqli_num_rows($result)>0){ 
                       
                     return $this->err="";

                 }else{ 


		$query = "INSERT INTO vendor(v_name,v_email,v_password,
									  v_address,v_mobile,v_image)
				 VALUES('$this->v_name','$this->v_email','$this->v_password',
				 		'$this->v_address','$this->v_mobile','$this->v_image')";
		$this->performQuery($query);

	}
}
public function readAll(){
		$query  = "SELECT * FROM vendor";
		$result = $this->performQuery($query);
		return $this->fetchAll($result);
	}
	public function readById($id){

		$query  = "SELECT * FROM vendor WHERE v_id = $id";
		$result = $this->performQuery($query);
		return $this->fetchAll($result);	
	}
	public function update($id)
	{

		if(empty($this->v_image)) {
        
		$query = "UPDATE vendor SET v_name    ='$this->v_name',
								   v_email   ='$this->v_email',
								   v_password='$this->v_password',
								   v_address     ='$this->v_address',
								   v_mobile  ='$this->v_mobile'
								   
								   WHERE v_id = $id";
								}
								   else {
								   	
		$query = "UPDATE vendor SET v_name    ='$this->v_name',
								   v_email     ='$this->v_email',
								   v_password='$this->v_password',
								   v_address     ='$this->v_address',
								   v_mobile  ='$this->v_mobile',
								   v_image       = '$this->v_image'
								   WHERE v_id = $id";
								   }

		$this->performQuery($query);
	}
	public function delete($id){
		$query = "DELETE FROM vendor WHERE v_id = $id";
		$this->performQuery($query);
	}
	//public function login($email,$pass)


}
/**
 * 
 */
class category extends dbconnection
{
	public $cat_id;
	public $cat_name;
	public $cat_desc;
	public $cat_image;


	public function create(){
		$query = "INSERT INTO category(cat_name,cat_desc,cat_image)
				 VALUES('$this->cat_name','$this->cat_desc','$this->cat_image')";
		$this->performQuery($query);
	}
	public function readAll(){
		$query  = "SELECT * FROM category";
		$result = $this->performQuery($query);
		return $this->fetchAll($result);
	}
	public function readById($id){
		$query  = "SELECT * FROM category WHERE cat_id = $id";
		$result = $this->performQuery($query);
		return $this->fetchAll($result);	
	}
	public function readName(){
		$query  = "SELECT * FROM category ";
		$result = $this->performQuery($query);
		return $this->fetchAll($result);	
	}
	public function update($id){
		
   if(empty($this->cat_image)) {
        
	

		$query = " UPDATE category SET cat_name    = '$this->cat_name',
								       cat_desc    = '$this->cat_desc'
								   WHERE cat_id = $id";
								}
								   else {
								   	
	
		$query = " UPDATE category SET cat_name     = '$this->cat_name',
								       cat_desc     = '$this->cat_name',
								       cat_image    = '$this->cat_image'
								   WHERE cat_id = $id";							   }




                          
		$this->performQuery($query);
	}
	public function delete($id){

		//$id=$_GET['delete_id'];
		$query = "DELETE FROM category WHERE cat_id =$id ";
		$this->performQuery($query);
	
	}
	
	
	
}

//class product :

class product extends dbconnection
{
	public $pro_id;
	public $pro_name;
	public $pro_desc;
	public $pro_price;
	public $pro_image;
	public $cat_id;
	public $v_id;



	public function create(){
		$query = "INSERT INTO product(pro_name,pro_desc,pro_price,pro_image,cat_id,v_id)
				 VALUES('$this->pro_name','$this->pro_desc','$this->pro_price',
				 '$this->pro_image','$this->cat_id','$this->v_id')";
		$this->performQuery($query);
	}
	public function createByVendor(){
		$query = "INSERT INTO product(pro_name,pro_desc,pro_price,pro_image,cat_id,v_id)
				 VALUES('$this->pro_name','$this->pro_desc','$this->pro_price',
				 '$this->pro_image','$this->cat_id','$this->v_id')";
		$this->performQuery($query);
	}
	public function readAll(){
		$query  = "SELECT * FROM product";
		$result = $this->performQuery($query);
		return $this->fetchAll($result);
	}
	public function readById($id){
		$query  = "SELECT * FROM product WHERE pro_id = $id";
		$result = $this->performQuery($query);
		return $this->fetchAll($result);	
	}
	public function readVendorProduct($id){
		$query  = "SELECT * FROM product WHERE v_id = $id";
		$result = $this->performQuery($query);
		return $this->fetchAll($result);	
	}
		public function readByName($name){
		$query  = "SELECT * FROM product WHERE pro_name = $name";
		$result = $this->performQuery($query);
		return $this->fetchAll($result);	
	}
	public function readCatId($id){
		$query  = "SELECT * FROM product WHERE cat_id = $id";
		$result = $this->performQuery($query);
		return $this->fetchAll($result);	
	}
	public function readRelated($id,$id2){
		$query  = "SELECT * FROM product WHERE cat_id = $id AND v_id=$id2";
		$result = $this->performQuery($query);
		return $this->fetchAll($result);	
	}
	public function update($id){
		
   if(empty($this->pro_image)) {
        
	

		$query = " UPDATE product SET  pro_name    = '$this->pro_name',
								       pro_desc    = '$this->pro_desc',
								       pro_price   = '$this->pro_price',
								       cat_id      = '$this->cat_id',
								       v_id         = '$this->v_id'
								   WHERE pro_id    = $id";
								}
								   else {
								   	
	
		$query = " UPDATE product SET  pro_name    = '$this->pro_name',
								       pro_desc    = '$this->pro_desc',
								       pro_price   = '$this->pro_price',
								       cat_id    = '$this->cat_id',
								       v_id         = '$this->v_id',
								       pro_image   = '$this->pro_image'
								   WHERE pro_id = $id";							   }




                          
		$this->performQuery($query);
	}
	public function delete($id){

		//$id=$_GET['delete_id'];
		$query = "DELETE FROM product WHERE pro_id =$id ";
		$this->performQuery($query);
	
	}
	
	
	
}
/**
 * 
 */
class orderDetail extends dbconnection
{
	
	public function readById($id){
		$query  = "SELECT * FROM order_details WHERE order_id = $id";
		$result = $this->performQuery($query);
		return $this->fetchAll($result);

	}
	public function readOrderId($id){
		$query  = "SELECT order_id FROM orders WHERE cust_id = $id";
		$result = $this->performQuery($query);
		return $this->fetchAll($result);

	}
	public function vendorDetail($id){
		$query  = "SELECT * FROM order_details WHERE v_id = $id";
		$result = $this->performQuery($query);
		return $this->fetchAll($result);

	}
}
/**
 * 
 */

?>
