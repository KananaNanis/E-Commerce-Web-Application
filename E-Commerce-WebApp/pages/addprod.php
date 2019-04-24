<!DOCTYPE html>
<html lang="en">
<body>
     <?php include("../controller/addController.php");?>

     <?php include("../view/header.html");?>

    <div id="layout_content">

        <?php include("../view/banner.html");?>

        <div id="middle_layout">

            <?php include("../view/menu.html");?>


            <?php include("../view/sidebar.html");?>


            <?php include("../view/breadcrumb.php");?>
    
        
            <div id="content"> 
             <?php
                if (isset($_POST["search_btn"])){
                     $prodFind=$_POST['search1'];
                     getProduct($prodFind);
                }
            ?>          
                <form id="form" action="../controller/addController.php" method="post" enctype="multipart/form-data" onSubmit="return validate(this);">
                        <fieldset>
                            <legend align='center' style="font-size:20px">
                                <b>Add New Product</b>
                            </legend>
                            <table id="basicInfo" cellspacing="5" align="center">
                                <tr>
                                    <td>
                                        <b>Product Title:</b>
                                    </td>
                                    <td>
                                        <input type="text" id="title" name="ptitle" size="25" style="width:360px;height:40px; margin-left:-1px"/>
                                    </td>
                                    <br>
                                    <br>
                                    <tr>

                                        <tr>

                                            <tr>
                                                <td>
                                                    <b>Category:</b>
                                                </td>
                                                <td>
                                                    <select id="thecategory" name="category" style="width:360px;height:40px; margin-left:-22px" >
                                                        <option value="" size="25">Select Category</option>
                                                        <?php
                                                            displayCategory();
                                                        ?>
                                        
                                                    </select>
                                                </td>

                                                <tr>
                                                    <td>
                                                        <b>Brand:</b>
                                                    </td>
                                                    <td>
                                                        <select id="brand" name="brand" style="width:360px;height:40px; margin-left:-22px">
                                                            <option value="">Select Brand</option>
                                                            <?php
                                                                displayBrand();
                                                            ?>
                                                            <!-- <option value="Samsung">Samsung</option>
                                                        <option value="Tecno">Tecno</option>
                                                        <option value="Apple">Apple</option>
                                                        <option value="Windows">Windows</option> -->
                                                        </select>
                                                    </td>

                                                    <tr>
                                                        <td>
                                                            <b>Price:</b>
                                                        </td>
                                                        <td>
                                                            <input type="text" id="price" name="price" size="25" />
                                                        </td>
                                                        <tr>
                                                            <td>
                                                                <b>Description:</b>
                                                            </td>
                                                            <td>
                                                                <textarea placeholder="Item Description" name="description" rows="5" cols="50"> </textarea>
                                                            </td>
                                                            <tr>
                                                                <td>
                                                                    <b>Upload Image:</b>
                                                                </td>
                                                                <td>
                                                                    <input type="file" name="picture">
                                                                </td>
                                                                <tr>
                                                                    <td>
                                                                        <b>Keywords:</b>
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" id="keyword" name="keyword" size="25" />
                                                                    </td>
                            </table>
                            <br>
                            <div align='center'>
                                <input type="submit" name="submit" id="submitBtn" value="Submit">
                            </div>
                        </fieldset>
                        <br>

                    </form>
                    
                    


            </div>
            <?php include("../view/footer.html");?>
        </div>
</div>

</body>

</html>