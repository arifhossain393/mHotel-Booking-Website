                        
                    <?php include 'inc/header.php'; ?>
                      <?php 
                        if (!isset($_GET['foodId']) || $_GET['foodId'] == NULL) {
                            echo "<script>window.location = 'viewresturent.php';</script>";
                        }else {
                            $foodId = $_GET['foodId'];
                        }
                    ?>    
                    <!-- Page content -->
                    <div id="page-content">
                        <!-- Dashboard Header -->
                        
                        <div class="content-header content-header-media">
                            <div class="header-section">
                                <div class="row">
                                    <!-- Main Title (hidden on small devices for the statistics to fit) -->
                                    <div class="col-md-4 col-lg-6 hidden-xs hidden-sm">
                                        <h1>Update Food Items</h1>
                                    </div>
                                    <!-- END Main Title -->
                                </div>
                            </div>
                            
                            <img src="img/placeholders/headers/dashboard_header.jpg" alt="header image" class="animation-pulseSlow">
                        </div>
                        <!-- END Dashboard Header -->

                        <!-- Mini Top Stats Row -->
                        <div class="row">
                        <?php
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                         

                        $food_name = mysqli_real_escape_string($db->link, $_POST['food_name']);
                        $food_type = mysqli_real_escape_string($db->link, $_POST['food_type']);
                        $food_desc = mysqli_real_escape_string($db->link, $_POST['food_desc']);
                        $price = mysqli_real_escape_string($db->link, $_POST['price']);
                        $food_cat = mysqli_real_escape_string($db->link, $_POST['food_cat']);
                            

                            $permited = array('jpg', 'jpeg', 'png', 'gif');
                            $file_name = $_FILES['food_img']['name'];
                            $file_size = $_FILES['food_img']['size'];
                            $file_temp = $_FILES['food_img']['tmp_name'];

                            $div = explode('.', $file_name);
                            $file_ext = strtolower(end($div));
                            $uniq_image = substr(md5(time()), 0,10).'.'.$file_ext;

                            $upload_image = "upload/".$uniq_image;

                            if ($food_name == "" || $food_type == "" || $food_desc == "" || $price == "" || $food_cat == "" ) {
                                echo"<span style='color:red;'>Field must not be empty</span>";
                            }else{
                                if (!empty($file_name)) {
                                    if ($file_size > 3145701) {
                                        echo "<div class='alert alert-danger'>Image size should be less 3MB.</div>";
                                    }elseif (in_array($file_ext, $permited) === false) {
                                        echo "<div class='alert alert-danger'>you can upload only:-".implode(',', $permited)."</div>";
                                    }else {
                                        
                                    move_uploaded_file($file_temp, $upload_image);
                                    $query = "
                                        UPDATE tbl_resturent
                                        SET
                                        food_name = '$food_name',
                                        food_type = '$food_type',
                                        food_img = '$upload_image',
                                        food_desc = '$food_desc',
                                        price = '$price',
                                        food_cat = '$food_cat'
                                        WHERE id = '$foodId'
                                     ";
                                    $update_food = $db->update($query);
                                    if ($update_food) {
                                        echo "<span style='color:green;'>Food Update Successfully</span>";
                                    }else {
                                        echo "<span style='color:red;'>Food Update Not Successfully</span>";
                                    }
                                }
                            }else {
                                 move_uploaded_file($file_temp, $upload_image);
                                    $query = "
                                         UPDATE tbl_resturent
                                        SET
                                        food_name = '$food_name',
                                        food_type = '$food_type',
                                        food_img = '$upload_image',
                                        food_desc = '$food_desc',
                                        price = '$price',
                                        food_cat = '$food_cat'
                                        WHERE id = '$foodId'
                                     ";
                                    $update_food = $db->update($query);
                                    if ($update_food) {
                                        echo "<span style='color:green;'>Food Update Successfully</span>";
                                    }else {
                                        echo "<span style='color:red;'>Food Update Not Successfully</span>";
                                    }
                            }
                        }
                    }
                 ?>

                        
                        <?php
                            $query = "SELECT * FROM tbl_resturent WHERE id = '$foodId' ORDER BY id DESC";
                            $food = $db->select($query);
                            if ($food) {
                                while ($foodresult = $food->fetch_assoc()) {
                             
                        ?>   
                           <form  action="" method="post" class="form-horizontal form-bordered ui-formwizard" enctype="multipart/form-data">
                                
                                <!-- END Step Info -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="food_name">Room Title</label>
                                    <div class="col-md-6">
                                        <input id="food_name" name="food_name" class="form-control " value="<?php echo $foodresult['food_name']; ?>" type="text">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="food_type">Food Type</label>
                                    <div class="col-md-6">
                                        <input id="food_type" name="food_type" class="form-control " value="<?php echo $foodresult['food_type']; ?>" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="food_img">Food Image</label>
                                    <div class="col-md-6">
                                        <img style="height: 60px; width: 60px;" src="../admin/<?php echo $foodresult['food_img']; ?>">
                                        <input id="food_img" name="food_img" type="file">
                                    </div>
                                </div>
                               
                                
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="room_desc">Food Description</label>
                                    <div class="col-xs-6">
                                        <textarea id="room_desc" name="room_desc" class="ckeditor"><?php echo $foodresult['food_desc']; ?></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="price">Price</label>
                                    <div class="col-md-6">
                                        <input id="price" name="price" class="form-control " value="<?php echo $foodresult['price']; ?>" type="text">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="food_cat">Food Category</label>
                                    <div class="col-md-6">
                                        <select id="food_cat" name="food_cat" class="form-control" size="1">
                                            
                                            <option value="0">Breakfast</option>
                                            <option value="1">Lunch</option>
                                            <option value="2">Dinner</option>
                                            <option value="3">Special Dishes</option>
                                            
                                        </select>
                                    </div>
                                </div>
            
                                 <!-- END First Step -->

                                <!-- Form Buttons -->
                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                        <button type="submit" class="btn btn-sm btn-primary" id="next4" value="submit">update</button>
                                    </div>
                                </div>
                                <!-- END Form Buttons -->
                            </form>
                           <?php } } ?>
                        </div>
                        <!-- END Mini Top Stats Row -->
                       
                    </div>
                    <!-- END Page Content -->

                   <?php include 'inc/footer.php'; ?>