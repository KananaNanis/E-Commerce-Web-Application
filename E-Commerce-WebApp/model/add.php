<?php

// include("../database/connect.php");
include(realpath(dirname(__FILE__) . '/../database/connect.php'));

class model extends dbconnect{
    // private $conn; 
    // public function __construct() {
    //     $dbcon = new dbconnect(); 
    //     $this->conn = $dbcon->connect(); 
        
    // }
    //function to add a product to the products table
  public function addNewProduct($prod_cat, $prod_brand, $prod_title, $prod_price, $prod_desc, $prod_image, $prod_keyw){
    $dbquery= "INSERT into products SET product_cat = '$prod_cat', product_brand='$prod_brand', product_title='$prod_title', product_price='$prod_price', product_desc='$prod_desc', product_image='$prod_image', product_keywords='$prod_keyw'";    
    return $this->query($dbquery);
  }

  //function to get all the categories from the database 
  public function getCategory(){
    $dbquery= "SELECT * from  categories";
    return $this->query($dbquery);
  }

  //function to get all the brands from the database 
  public function getBrand(){
    $dbquery= "SELECT * from  brands";
    return $this->query($dbquery);
    
  }

  //gets all products from products table
  public function getProducts(){
    $dbquery= "select * from  products";
    return $this->query ($dbquery);
  }
  //gets a single product info from the database
  public function getProdId($id){
    $dbquery= "select * from  products where product_id='$id'";
    return $this->query ($dbquery);

  }

  //gets the name of the product
  public function getProdName($id){
    $dbquery= "select * from  categories where cat_id='$id'";
    return $this->query ($dbquery);

  }

  // public function searchBar(){
  //   $dbquery= "SELECT product_id,product_title,product_desc from products
  //   WHERE lower(product_title) LIKE ? 
	//   ORDER BY INSTR(product_title, ?), product_title
	//   LIMIT 6 OFFSET ?";

    

  //   return $this->query($dbquery);

  // }

  //function to get the product with the matching keyword
  public function getSearchProd($keyWord){
    #"SELECT  * FROM members WHERE (FirstName LIKE '". $fname ."%' OR LastName LIKE '". $lname ."%')";
    #$request="select * from products where product_keywords like '%$key%'";
    $dbquery="SELECT  * FROM products WHERE ( product_keywords LIKE '". $keyWord ."%')";

    return $this->query($dbquery);
  }

     //adds to cart table upon clicking Add To Cart button
  public function addToCart($p_id='none', $ip_add='none'){
    $request="INSERT into cart SET p_id = '$p_id',ip_add = '$ip_add', qty='1'";
    //$duplicate=$this-> query($request);
    $result="SELECT qty from cart WHERE p_id='$p_id'AND ip_add='$ip_add' ";

    if($this->query($result)){
      if (($this->queryResults())>0){
        $upd="UPDATE cart SET qty=qty+1 WHERE p_id='$p_id'AND ip_add='$ip_add'";
        return $this->query($upd);
      }
      else{
        return $this->query($request);
      }
    }
    //send request to query
    return $this->query($request);
  }
  //calculates the total number of items in the cart
  public function totalItems(){
    $items="SELECT SUM(qty) as total_items from cart";
    return $this->query($items);
  }
 
  //calculates the total price of the products in the cart
  public function totalPrice(){
    $price="SELECT t.product_id, SUM(t.product_price*c.qty) as total_price FROM products t JOIN cart c ON c.p_id=t.product_id";
    return $this->query($price);
  }

 //displays all the items present in the cart
  public function displayCartItems(){
    $items="SELECT c.p_id, t.product_title, t.product_image, c.qty,
    (t.product_price*c.qty) as product_price FROM products t
    JOIN cart c ON c.p_id=t.product_id";
    return $this->query($items);
  }

  /**
  *function removes an item from the cart based on the product id and ip address
  *@param $p_id id of the selected item
  *@param $ip_add ip address of the user's computer
  */
  public function removeItem($p_id='none', $ip_add='none'){
    $items="SELECT c.p_id, t.product_title, t.product_image, c.qty,
    (t.product_price*c.qty) as product_price FROM products t
    JOIN cart c ON c.p_id=t.product_id";

    $upd="DELETE FROM cart WHERE p_id='$p_id'AND ip_add='$ip_add'";
    return $this->query($upd);
  }

  public function emptyCart(){
    $dbquery="DELETE FROM cart";
    return $this->query($dbquery);
  }


  //registers a user and adds to the database
  public function registerCustomer($cust_ip='none', $cust_name='none', $cust_em='none', $cust_pass='none', $cust_count='none', $cust_city='none', $cust_contact='none', $cust_image='none', $cust_add='none'){
    $dbquery= "INSERT into customer
    SET customer_ip = '$cust_ip', customer_name='$cust_name', customer_email='$cust_em',
    customer_pass='$cust_pass', customer_country='$cust_count', customer_city='$cust_city',
    customer_contact='$cust_contact', customer_image='$cust_image', customer_address='$cust_add'";

    //sends query request
    return $this->query ($dbquery);
  }

  //cheks if user exists in the database based on email and password
  public function loginCustomer($emailAdd, $pword){
    $dbquery="SELECT * from customer WHERE customer_email='$emailAdd' AND customer_pass='$pword'";
    //sends query request
    return $this->query ($dbquery);
  }

   public function addPayment($amt='none', $cust_id='none', $prod_id='none', $curr='none', $date='none'){
    $req="INSERT into payment SET amt = '$amt',customer_id = '$cust_id', product_id='$prod_id', currency='$curr', payment_date='$date'";
    return $this->query($req);
  }
  public function addOrder($prod_id='none', $cust_id='none', $invoice='none', $qty='none', $date='none', $stat='none'){
    $req="INSERT into orders SET product_id ='$prod_id', customer_id='$cust_id',invoice_no='$invoice', qty='$qty', order_date='$date', status='$stat'";
    return $this->query($req);
  }
  

}


 
?>





















































































































