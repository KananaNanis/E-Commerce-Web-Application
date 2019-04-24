  
  <?php

  ob_start();
  // include("../model/add.php");
  include(realpath(dirname(__FILE__) . '/../model/add.php'));
    
    //get form content
    if(isset($_POST["submit"])){
    $item = new model();
    $prod_tit = $_POST['ptitle'];
    $cat_name = $_POST["category"];
    $brand_name = $_POST["brand"];
    $product_pr = $_POST['price'];
    $desc= $_POST['description'];    
    $target_dir = "./uploads/";
    $pic_name= addslashes($_FILES["picture"]["tmp_name"]);
    $name= addslashes($_FILES["picture"]["name"]);
    $pic_content=file_get_contents($pic_name);
    $file = $target_dir . basename($_FILES["picture"]["name"]);
    move_uploaded_file($_FILES["picture"]["tmp_name"], $file);
    $keyword= $_POST['keyword'];
    // echo "Form content: $cat_name, $prod_tit, $brand_name";
    //call addNewProduct function to insert form data into the database
    $add = $item->addNewProduct($cat_name,$brand_name,$prod_tit,$product_pr,$desc,$file,$keyword);

    //Check that product has been successfully added
    if($add==false){
      echo "Product not added";
    }else{
      echo "Product added";
    }
  }

  //function to display brands in a dropdown list from the database
  function displayBrand(){
    $itemInstance= new model();
    $result =$itemInstance->getBrand();
    if ($result){
      while($row= $itemInstance->queryData()){
        echo '<option value="'.$row['brand_id'].'">' . $row['brand_name'] . '</option>';
      }
    }
  }

  //function to display categories in a dropdown list from the database
  function displayCategory(){
    $itemInstance= new model();
    $result =$itemInstance->getCategory();
    if ($result){
      while($row= $itemInstance->queryData()){
        echo '<option value="'.$row['cat_id'].'">' . $row['cat_name'] . '</option>';
      }
    }
  }

  //function to gets all products from database
  function displayProducts(){
    $itemInstance= new model();
    $result =$itemInstance->getProducts();
    if ($result){
      while($row= $itemInstance->queryData()){     
        $image = "controller". $row['product_image'];
        $prod_id=$row['product_id'];
        $str="GHc";
        // echo $image;
        echo "<div id='item1'>
        <a href='pages/product.php?id=".$prod_id." ' style='text-decoration:none'>
        <img src= '$image' height='130px'><br>
        <div>".$row['product_title']."</div>
        <div id='stars'>
            <span class='fa fa-star checked'></span>
            <span class='fa fa-star checked'></span>
            <span class='fa fa-star checked'></span>
            <span class='fa fa-star'></span>
            <span class='fa fa-star'></span>
        </div>
        <div>$str ".$row['product_price']."</div>
        </a>
        <a href='index.php?id='.$prod_id.''><button onclick='add()'>Add to Cart</button></a>
        </div> ";
      }
    }
  }
//function to dispaly a single product in a page (single product view)
  function displaySingleProduct($id){

    $itemInstance= new model();

    $result =$itemInstance->getProdId($id);

    $row= $itemInstance->queryData();

    $result2=$itemInstance->getProdName($row['product_cat']);
    $row2=$itemInstance->queryData();

    $prod_id=$row['product_id'];
    

    $img = "../controller". $row['product_image'];
    //  echo $img;
    $str="GHc";
    echo "<div id='item1'>
    <img src='$img' width='200px'>
    </div>
    <div id='itemDesc'>
    <div style='font-size:20px;margin-top:-300px;float:left;margin-left:-630px;'>".$row['product_title']. " </div><br>
    <div style='margin-top:-280px;font-size:20px;margin-left:-680px;float:left'> $str ".$row['product_price']."<br>
    <input style='margin-left:-420px;width: 60px;' id='qty' type='number' placeholder='Qty'>
    <a href='../index.php?id='.$prod_id.''><button style='margin-top:18px;margin-left:150px;width:150px;height:30px;font-size:20px;' onclick='cartAdd($prod_id)'>Add to Cart</button></a><br><br>
    <div style='margin-left:40px;'>Category: ".$row2['cat_name']."</div>
    <p style='font-size:20px;margin-left:35px;'>Description:  ".$row['product_desc']."
    </p>
    <div style='font-size:20px;'>
                    <button onclick='myFunction()'>Description</button>
                    <button onclick='reviewFunction()'>Review</button>
                    <p id='description'></p>
                    <p id='review'></p>

                </div>
    </div>
    </div>";
  }

  function displayProducts2(){
    $itemInstance= new model();
    $result =$itemInstance->getProducts();
    if ($result){
      while($row= $itemInstance->queryData()){     
        $image = "../controller". $row['product_image'];
        $prod_id=$row['product_id'];
        $str="GHc";
        // echo $image;
        echo "<div id='item1'>
        <a href='../pages/product.php?id=".$prod_id." ' style='text-decoration:none'>
        <img src= '$image' height='130px'><br>
        <div>".$row['product_title']."</div>
        <div id='stars'>
            <span class='fa fa-star checked'></span>
            <span class='fa fa-star checked'></span>
            <span class='fa fa-star checked'></span>
            <span class='fa fa-star'></span>
            <span class='fa fa-star'></span>
        </div>
        <div>$str ".$row['product_price']."</div>
        </a>
        <a href='../index.php?id='.$prod_id.''><button onclick='add()'>Add to Cart</button></a>
        </div> ";
      }
    }
  }

  //this function used to find products using keywords
function getProduct($keyWord){
  // if (isset($_POST["search_btn"])){
  //   $prodFind=$_POST['search1'];

  $itemInstance=new model();

  $result =$itemInstance->getSearchProd($keyWord);
  if($result){

  while($row= $itemInstance->queryData()){
    $prod_id=$row['product_id'];
    $str="GHc";
    $image = "../controller". $row['product_image'];
    // echo $res;
    echo "<div id='item1'>
    <a href='../pages/product.php?id=".$prod_id." ' style='text-decoration:none'>
    <img src= '$image' height='150px'><br>
    
     <div>".$row['product_title']."</div>
    <div>$str ".$row['product_price']."</div>
    </a>
    <button onclick='cartAdd($prod_id)'>Add to Cart</button>
    </div>";

    //put a link on the click button
    //when you click the button, display one page view
    // 
    
  }
// } 
}  
}

function getProductonIndex($keyWord){
  // if (isset($_POST["search_btn"])){
  //   $prodFind=$_POST['search1'];

  $itemInstance=new model();

  $result =$itemInstance->getSearchProd($keyWord);
  if($result){

  while($row= $itemInstance->queryData()){
    $prod_id=$row['product_id'];
    $str="GHc";
    $image = "./controller". $row['product_image'];
    // echo $res;
    echo "<div id='item1'>
    <a href='./pages/product.php?id=".$prod_id." ' style='text-decoration:none'>
    <img src= '$image' height='150px'><br>
    
     <div>".$row['product_title']."</div>
    <div>$str ".$row['product_price']."</div>
    </a>
    <button onclick='cartAdd($prod_id)'>Add to Cart</button>
    </div>";

    //put a link on the click button
    //when you click the button, display one page view
    // 
    
  }
// } 
}  
}
//fetching user IP Address
function getIpAddr()
{
  // $IP = $_SERVER['REMOTE_ADDR'];  
  $client_ip=gethostbyname(getHostName());
  return $client_ip;
}

 

// function getIpAddr(){
//     if(!empty($_SERVER['HTTP_CLIENT_IP'])){
//         //ip from share internet
//         $ip = $_SERVER['HTTP_CLIENT_IP'];
//     }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
//         //ip pass from proxy
//         $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
//     }else{
//         $ip = $_SERVER['REMOTE_ADDR'];
//     }
//     return $ip;
// }
//adds items to the cart table
function cartAdd($id){
  $itemInstance=new model();
  $ip=getIpAddr();
  $result=$itemInstance->addToCart($id, $ip);
  header('Location:./index.php');
}

//calls on totalItems to get total number of items
function getTotalItems(){
  $itemInstance= new model();
  $total=$itemInstance->totalItems();
  return $itemInstance->queryData();
}
//calls totalPrice to get total price of the all items
function getTotalPrice(){
  $itemInstance=new model();
  $price=$itemInstance->totalPrice();
  // echo $price;
  return $itemInstance->queryData();
}

//increases the number of items in the cart and updates the number of items and amount
function increaseAdd($id){
  $itemInstance=new model();
  $ip=getIpAddr();

  $result=$itemInstance->addToCart($id, $ip);
  header('Location:./cart.php');
}

// calls on the displayCartItems function to fetch the items in the cart
function getCartItems(){
  $itemInstance= new model();
  $cartItems= $itemInstance->displayCartItems();

  if ($cartItems){

    while($row= $itemInstance->QueryData()){
      $image = "../controller". $row['product_image'];

      $prod_id=$row['p_id'];

      echo "<div id='item1'>
      </a> 
      <img src= '$image' height='130px'><br>
      <div>".$row['product_title']."</div>
      <div>Number of Items: ".$row['qty']."</div>
      <div>Amount: $ ".$row['product_price']."</div> 
       <a href='cart.php?id='.$prod_id.''><button onclick='increaseAdd($prod_id)'><b>Add More</b></button></a>
       <a href='cart.php?idr='.$prod_id.''><button onclick='remove($prod_id)'><b>Remove</b></button></a>
      
      </div>";
    }
  }
}

//removes the selected item from the cart and updates the number of items and amount
function remove($id){
  $itemInstance=new model();
  $ip=getIpAddr();

  $result=$itemInstance->removeItem($id, $ip);
  header('Location:../pages/cart.php');
}

if(isset($_POST["registerSbt"])){
  $entry = new model();
  $ip=getIpAddr();
  //fetching information based on inputs & uploads
  $username = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $country = $_POST['country'];
  $city= $_POST['city'];
  $contact=$_POST['contact'];
  $currentDir = getcwd();
  $uploadDirectory = "./uploads//";
  $file = addslashes($_FILES['uplo']['name']);
  $fileTmpName  = addslashes($_FILES['uplo']['tmp_name']);
  $uploadPath = addslashes($currentDir . $uploadDirectory . basename($file));
  $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

  $address= $_POST['address'];

  $ent = $entry->registerCustomer($ip,$username,$email,$password,$country,$city,$contact,$uploadPath, $address);

  if($ent==false){

    echo "Customer not added";
  }else{
    echo "Customer added";
    header('Location:../pages/login.php');
  }
}

//authenticates user
if(isset($_POST["loginSbt"])){
  $entry = new model();
  $ip=getIpAddr();

  if(isset($_GET["loginSbt"])){
    $id=$_GET["loginSbt"];
  }

  //gets data from the inputs
  $email = $_POST['email'];
  $password = $_POST['password'];

  $res=$entry->loginCustomer($email, $password);

  while($row= $entry->queryData()){

    $usname=$row['customer_name'];//get hold of user name
    $usID=$row['customer_id']; //get hold of user_id
    $usContact=$row['customer_contact'];
    $usEmail=$row['customer_email'];
    $usAddress=$row['customer_address'];

    //store email and password in sessions
    session_start();
    $_SESSION['user_name']=$usname; //to be used for mailing receipt
    $_SESSION['user_id'] = $usID;
    $_SESSION['customer_name']=$usname;
    $_SESSION['password'] = $password;
    $_SESSION['customer_contact']=$usContact;
    $_SESSION['customer_email']=$email;
    $_SESSION['customer_add']=$usAddress;

    $_SESSION['logged']=true; //initializes a session

    //redirect to index page, carrying with it the person's username after login
    header('Location:../index.php?uname='.$usname.'');

  }
  //alert if user does not exist
  echo '<script language="javascript">';
  echo 'alert("User Does Not Exist!")';
  echo '</script>';

}

function getCartItem(){
  $br= new model();
  $cartItems= $br->displayCartItems();

  if ($cartItems){

    $row= $br->queryData();
    $image = "../controller". $row['product_image'];

    $prod_id=$row['p_id'];

    echo "<div id='item1'>

    <img src= '$image' height='130px'><br>
    </a>
     <div>".$row['product_title']."</div>
    <div>Number of Items: ".$row['qty']."</div>
    <div>Amount: $ ".$row['product_price']."</div> 
    <form method='post' action='payment_success.php' >


      <!-- Identify your business so that you can collect the payments. -->
      <input type='hidden' name='business' value='herschelgomez@xyzzyu.com'>

      <!-- Specify a Buy Now button. -->
      <input type='hidden' name='cmd' value='_xclick'>

      <!-- Specify details about the item that buyers will purchase. -->
      <input type='hidden' name='item_name' value='Hot Sauce-12oz. Bottle'>
      <input type='hidden' name='amount' value='5.95'>
      <input type='hidden' name='currency_code' value='USD'>

      <input type='hidden' id='actualDate' name='actualDate'/>
      <!-- Display the payment button. -->
      <input type='image' value='submit' name='submitPay' border='0'
      src='../img/buynow.png'
      alt='Buy Now'>
      <img alt='' border='0' width='1' height='1'
      src='https://www.paypalobjects.com/en_US/i/scr/pixel.gif' >
      </form>

      </div>";
    }
  }

    //payment then redirect to payment_success
  if(isset($_POST["submitPay"])){

    $br= new model();
    $br2=new model();

    $cartItems= $br->displayCartItems();
    $cartItems2=$br2->displayCartItems();

    if ($cartItems && $cartItems2){

      //add payment
      $row= $br->queryData();

      $item_name=$row['product_title'];
      $_SESSION['prod_name']=$item_name;
      $_SESSION['amount']=$row['product_price'];

      $amt=$row['product_price'];
      $cust_id= $_SESSION['user_id'];
      $prod_id=$row['p_id'];
      $curr="USD";
      $date = date("Y-m-d");
      $_POST['date'] = $date;

      $user_name=$_SESSION['user_name'];

      //add order
      $row= $br2->queryData();
      $prod_id=$row['p_id'];
      $cust_id= $_SESSION['user_id'];
      $invoice_no=mt_rand();
      $qty=$row['qty'];
      $date = date("Y-m-d");
      $_POST['date'] = $date;

      //checks if user's email exists to send info
      if($_SESSION['customer_email']){
        $status="Completed";
      }
      else{
        $status="In Progress";
      }
      $ent2=$br2->addOrder($prod_id, $cust_id, $invoice_no, $qty, $date,$status);
      $ent= $br->addPayment($amt, $cust_id, $prod_id, $curr, $date);

      $br=$br->emptyCart();

    }
  }





      
  ?>