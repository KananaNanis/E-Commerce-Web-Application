
<?php session_start(); ?>
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
      //checks if there's a USER ID session
      if(isset($_SESSION['user_id'])){
        header('Location:payment.php');
      }
      else{
        echo '<div class="loginArea">
        <form method="post"  enctype="multipart/form-data" method="post" onSubmit="return register(this);">
        <fieldset><legend align="center"><b>Login</b></legend>
        <table cellspacing="5" align="center">
        <tr><td><b>E-mail:</b></td><td><input type="email" name="email" size="25" required /></td>
        <span class="error"> <?php echo $emailErr;?></span></tr>
        <tr><td><b>Password:</b></td><td><input type="password" id="phn" name="password" size="25"
        title="Must contain at least one number and one uppercase and lowercase letter,and at least 8 or more characters"
        required/></td></tr>
        </table>
        <input type="submit" id="sb"  name="checkOutSbt" value="Login" align="center"><br />
        <a href="register.php">Not a User? Sign Up Here</a>
        </form>
        </fieldset>
        </div>';
      }
      ?>
            
                

            </div>
            <?php include("../view/footer.html");?>
        </div>
    </div>

</body>

</html>