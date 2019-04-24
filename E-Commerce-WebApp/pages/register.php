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
                <form name="form" method="post" enctype="multipart/form-data"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"
                    onSubmit="return reg_validate(this);" style="margin-top:40px">
                    <fieldset><legend align='center' style="font-size:20px"><b>Register</b></legend>
                    <table cellspacing="5" align='center'>
                        <tr><td><b>Name:</b></td><td><input type="text" id="name" name="name" size="25" /></td>
                        <!-- <span class="error"> <?php echo $nameErr;?></span></tr> -->
                        <tr><td><b>E-mail:</b></td><td><input type="email" name="email" size="25" /></td>
                            <!-- <span class="error"> <?php echo $emailErr;?></span></tr> -->
                            <tr><td><b>Password:</b></td><td><input type="password" id="pword" name="password" size="25"
                            /></td></tr>
                            <tr><td><b>Country:</b></td><td><input type="text" name="country" size="25" /></td>
                                <!-- <span class="error"> <?php echo $countryErr;?></span></tr> -->
                                <tr><td><b>City:</b></td><td><input type="text" name="city" size="25" /></td>
                                <!-- <span class="error"> <?php echo $cityErr;?></span></tr> -->
                                <tr><td><b>Contact:</b></td><td><input type="text" id="phn" name="contact" size="10" /></td>
                                    <!-- <span class="error"> <?php echo $contactErr;?></span></tr> -->
                                    <tr><td><b>Image:</b></td><td><input type="file" name="uplo" accept="image/*" /></td>
                                    <!-- <span class="error"> <?php echo $ImageErr;?></span></tr> -->
                                    <tr><td><b>Address:</b></td><td><textarea name="address" rows="5" cols="40"></textarea></td>
                                    <!-- <span class="error"> <?php echo $addressErr;?></span></tr> -->
                                    </table>
                                    <input type="submit" name="registerSbt" value="Submit" align="center">
                                </form>
                            </fieldset>
            </div>
            <?php include("../view/footer.html");?>
        </div>
    </div>

</body>

</html>