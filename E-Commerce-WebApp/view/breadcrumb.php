<!DOCTYPE html>
<html lang="en">

<body>

    <div id="bread_crumb">
       
        <ul id="breadcrumb_content">
            <li>
                <a href="#" style="float:right;font-size:20px;margin-right:5px">
                    <b>Welcome Guest</b>
                </a>
            </li>

            <?php
                $array=getTotalItems();
                $totalItems=$array['total_items'];
                $arr2=getTotalPrice();
                $totalPrice=$arr2['total_price'];
                // echo $totalPrice;
                if ($totalItems==0){
                    echo "<li><a href='#' style='float:right;font-size:20px'><span><b>Total Price</b></span>: GH¢ 0</span></a></li>";
                    echo "<li><a href='#' style='float:right;font-size:20px;'><span><b>Total Items</b></span>: 0</span></a></li>";
                    
                }
                else{
                     echo "<li><a href='#' style='float:right;font-size:20px'><span><b>Total Price</b></span>: GH¢ $totalPrice</span></a></li>";
                    echo "<li><a href='#' style='float:right;font-size:20px'><span><b>Total Items</b></span>: $totalItems</span></a></li>";
                   
                }
            
                ?>
                 <li>
                <a href="#" style="float:right;font-size:20px">
                    <b>Shopping Cart</b>
                </a>
            </li>
                <li>
                    <a href="#" style="float:right;font-size:20px">
                        <b>Go to Cart</b>
                        <span id="mycart"></span>
                    </a>
                </li>
                <li>
                    <a href="../pages/addprod.php" style="float:right;font-size:20px">
                        <b>Add Product</b>

                    </a>
                </li>
        </ul>

    </div>

</body>

</html>