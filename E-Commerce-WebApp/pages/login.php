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
            
               <div class="loginArea">
                    <form method="post"  enctype="multipart/form-data"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"
                        onsubmit="return reg_validate(this);"  style="margin-top:40px">
                        <fieldset><legend align='center'><b>Login</b></legend>
                        <table cellspacing="5" align='center'>
                            <tr><td><b>E-mail:</b></td><td><input type="email" name="email" size="25"  /></td>
                                <!-- <span class="error"> <?php echo $emailErr;?></span></tr> -->
                                <tr><td><b>Password:</b></td><td><input type="password" id="pword" name="password" size="25"
                                 
                                /></td></tr>
                                        </table>
                                        <input type="submit" id="sb"  name="loginSbt" value="Login" align="center"><br />
                                        <a href="register.php" style="font-size:16px">Not a User? Sign Up Here</a>
                                    </form>
                                </fieldset>
                </div>

            </div>
            <?php include("../view/footer.html");?>
        </div>
    </div>

</body>

</html>