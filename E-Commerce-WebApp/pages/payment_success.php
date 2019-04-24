<!DOCTYPE html>
<html lang="en">

<body>
  <?php
  session_start();
  include("../controller/addController.php");
    
  include("../view/payment_header.html");
  ?>

  <div id="build" align="center" >
    </div>
    <div id="infoSect">
      <div id="cartTitle">
        <div id="totPrice">
          <?php
          // $arr2=getCartItems();
          //
          $array=getTotalItems();
          $totalItems=$array['total_items'];
          $arr2=getTotalPrice();
          $totalPrice=$arr2['total_price'];
          ?>
        </div>
      </div>

  <center>
    <b>Payment Receipt</b>

    <div class="container" style="margin-top: -2%">
      <div class="row">

        <div class="receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
          <div class="row">
            <div class="receipt-header">
              <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="receipt-left">
                </div>
              </div>
              <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                <div class="receipt-right">
                  <h5>ShopMatt</h5>
                  <p>+254712023478 <i class="fa fa-phone"></i></p>
                  <p>shopmatt@shopmatt.com<i class="fa fa-envelope-o"></i></p>
                  <p>Ghana<i class="fa fa-location-arrow"></i></p>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="receipt-header receipt-header-mid">
              <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                <div class="receipt-right">
                  <h5>
                    <b>Name:</b>
                    <?php
                    if(isset($_SESSION['user_id'])){
                      echo $_SESSION['customer_name'];
                    }
                    ?>
                  </h5>
                  <p><b>Mobile:</b>
                    <?php
                    if(isset($_SESSION['user_id'])){
                      echo $_SESSION['customer_contact'];
                    }
                    ?>
                  </p>
                  <p><b>Email:</b>
                    <?php
                    if(isset($_SESSION['user_id'])){
                      echo $_SESSION['customer_email'];
                    }
                    ?>
                  </p>
                </div>
              </div>
              <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="receipt-left">
                  <h1>Receipt</h1>
                </div>
              </div>
            </div>
          </div>

          <div>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Description</th>
                  <th>Amount</th>
                </tr>
              </thead>
              <tbody>

                <!-- <?php
                    $product=$_SESSION['prod_name'];
                    $total_price=$_SESSION['amount'];
                    echo "
                    <tr>
                    <td class='col-md-9'>$product</td>
                    <td class='col-md-3'><i class='fa fa-inr'></i>$$total_price</td>
                    </tr>
                    ";
                ?> -->
                <td class="text-right">
                  <p>
                    <strong>Number of Items: </strong>
                  </p>
                  <p>
                    <strong>Total Amount: </strong>
                  </p>
                </td>
                <td>
                  <p>
                    <strong><i class="fa fa-inr"></i>1</strong>
                  </p>
                  <p>
                    <strong><i class="fa fa-inr"></i><?php echo $total_price; ?></strong>
                  </p>
                </td>
              </tr>
              <tr>

                <td class="text-right"><h2><strong>Total: </strong></h2></td>
                <td class="text-left text-danger"><h2><strong><i class="fa fa-inr"></i>$ <?php echo $total_price; ?></strong></h2></td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="row">
          <div class="receipt-header receipt-header-mid receipt-footer">
            <div class="col-xs-8 col-sm-8 col-md-8 text-left">
              <div class="receipt-right">
                <p><b>Date :</b> <?php echo  date("Y/m/d");?></p>
                <p><b>Time :</b> <?php date_default_timezone_set("Africa/Accra");
                echo date("h:i:sa");?></p>
                <h5 style="color: rgb(140, 140, 140);">Thank you for shopping with us!</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <a href="../index.php">
    <button type="button" name="afterPay">Home</button>
  </a>

</center>

<?php include("../view/footer.html");?>
</body>
</html>
