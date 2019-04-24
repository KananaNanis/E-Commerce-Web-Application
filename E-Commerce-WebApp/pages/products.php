
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
                 if (isset($_POST["search_btn"])){
                     $prodFind=$_POST['search1'];
                     getProduct($prodFind);
                }
                else{
                    displayProducts2();
                }
                
                ?>

            </div>
            <?php include("../view/footer.html");?>
        </div>
    </div>

</body>

</html>