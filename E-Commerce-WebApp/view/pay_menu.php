<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<body>


    <div id="menu">
        <!-- <p>Menu</p> -->

        <ul id="menu_items">
            <li id="home">
                <a href="../index.php" class="active" style="float:left;font-size:20px">Home</a>
            </li>
            <li id="prod">
                <a href="../pages/products.php" style="float:left;font-size:20px">Products</a>
            </li>
            <li id="cont">
                <a href="../pages/contactus.php" style="float:left;font-size:20px">Contact Us</a>
            </li>
            <li>
                <form action="" method="post">
                    <input type="text" name="search1" placeholder="Search.." id="search">
                    <button name="search_btn" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </form>
            </li>
            <!-- <li>
                <a href="../pages/payment.php" style="float:right;font-size:20px">Payment</a>
            </li>
            <li>
                <a href="../pages/login.php" style="float:right;font-size:20px">Log In</a>
            </li>
            <li>
                <a href="../pages/cart.php" style="float:right;font-size:20px">My Cart</a>
            </li> -->

            <div id="login_out">
                <?php
                                    if(isset($_SESSION["logged"])){
                                        echo '
                                        <li>
                                    <li>
                <a href="../pages/payment.php" style="float:right;font-size:20px">Payment</a>
            </li>
            <li>
                <a href="../pages/logout.php" style="float:right;font-size:20px">Log Out</a>
            </li>
            <li>
                <a href="../pages/cart.php" style="float:right;font-size:20px">My Cart</a>
            </li>
                                        ';
                                    }
                                     else
                                         echo '
                                        <li>
                                    <li>
                <a href="../pages/payment.php" style="float:right;font-size:20px">Payment</a>
            </li>
            <li>
                <a href="../pages/login.php" style="float:right;font-size:20px">Log In</a>
            </li>
            <li>
                <a href="../pages/cart.php" style="float:right;font-size:20px">My Cart</a>
            </li>
                                        ';
                                    ?>
            </div>


        </ul>

    </div>

</body>

</html>