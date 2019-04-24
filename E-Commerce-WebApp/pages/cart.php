<!DOCTYPE html>
<html lang="en">


<body>
    <?php include("../controller/addController.php");?>
    
    <?php include("../view/header.html");?>

    <div id="layout_content">

        <?php include("../view/banner.html");?>

        <div id="middle_layout">

            <?php include("../view/menu.php");?>


            <?php include("../view/sidebar.html");?>

            <div id="infoSect">
      <div id="cartTitle">
        <b>Cart Contains:</b>
        <div id="totPrice">
          <?php
          $items_array=getTotalItems();
          $totalItems=$items_array['total_items'];
          $price_array=getTotalPrice();
          $totalPrice=$price_array['total_price'];
          if ($totalItems==0){
            echo "<span>Total Price</span>: $0</span>";
          }
          else{
            echo "<span>Total Price</span>: $$totalPrice</span>";
          }
          ?>
        </div>
      </div>

      <div id="direct_btns">
        <a href="../index.php" id="cnt_shop" style='float:right;font-size:20px;margin-right: -10px;margin-top: -30px'>Continue Shopping</a>
        <a href="checkout.php" id="chckout" style='float:right;font-size:20px;margin-right: 145px;margin-top: -30px'>Checkout</a>
      </div>
    </div>
            <div id="content">
                 <?php
                 if (isset($_POST["search_btn"])){
                     $prodFind=$_POST['search1'];
                     getProduct($prodFind);
                }
                else{
                    getCartItems();
                }

                if(isset($_GET["id"])){
                      $id=$_GET["id"];
                      increaseAdd($id);
                 }
                 if(isset($_GET["idr"])){
                    $id=$_GET["idr"];
                    remove($id);
                  }
                ?>

            </div>
            <?php include("../view/footer.html");?>
        </div>
    </div>

</body>

</html>