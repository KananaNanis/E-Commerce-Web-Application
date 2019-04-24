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


            <?php include("../view/breadcrumb.php");?>


            <div id="content">
                <?php
                    $id=$_GET["id"];
                    displaySingleProduct($id);
                ?>

                <!-- <div id="item1" style="margin-left:100px;">
                    <a href="#">
                        <img src="../img/hohnie.jpg">
                    </a>
                </div>

                <div id="itemDesc">
                    <id style="font-size:20px;">Johnie Walker</id>
                    </br>
                    </br>
                    <id style="font-size:20px;">GH₵ 333
                        <span>
                            <strike style="font-size:20px;">Ghc 450</strike>
                        </span>
                    </id>
                    <div id="qtybtn">
                        <input id="qty" type="number" placeholder="Qty" style="width: 60px;" />
                        <button id="mybtn" style="margin-left:250px;padding: 1px 2px;margin-top:20px;width:150px;height:30px;font-size:20px;">Add To Cart</button>

                    </div>

                    <p style="margin-left:80px;">Category: Food and Drinks Tags: Vodka, Fun, Drinks</p>

                </div> -->
                <!-- <div id="buttonzone">
                    <button onclick="myFunction()">Description</button>
                    <button onclick="reviewFunction()">Review</button>
                    <p id="description"></p>
                    <p id="review"></p>

                </div> -->

            </div>
            <?php include("../view/footer.html");?>
        </div>
    </div>

</body>

</html>