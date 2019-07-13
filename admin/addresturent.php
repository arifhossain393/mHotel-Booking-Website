                        
                    <?php include 'inc/header.php'; ?>
                        
                    <!-- Page content -->
                    <div id="page-content">
                        <!-- Dashboard Header -->
                        
                        <div class="content-header content-header-media">
                            <div class="header-section">
                                <div class="row">
                                    <!-- Main Title (hidden on small devices for the statistics to fit) -->
                                    <div class="col-md-4 col-lg-6 hidden-xs hidden-sm">
                                        <h1>Add Food Items</h1>
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
                            } elseif (empty($file_name)) {
                            echo "<div class='alert alert-danger'>Select any Image.</div>";
                            }elseif (in_array($file_ext, $permited) === false) {
                                echo "<div class='alert alert-danger'>you can upload only:-".implode(',', $permited)."</div>";
                            }else {
                                
                            
                            move_uploaded_file($file_temp, $upload_image);
                            $query = "INSERT INTO tbl_resturent(food_name, food_type, food_img, food_desc, price, food_cat) VALUES('$food_name', '$food_type', '$upload_image', '$food_desc', '$price', '$food_cat')";
                            $insert_rows = $db->insert($query);
                            if ($insert_rows) {
                                echo "<span style='color:green;'>Add Food Successfully</span>";
                            }else {
                                echo "<span style='color:red;'>Food Not add Successfully</span>";
                            }
                        }
                    }
                    ?>
                           <form  action="" method="post" class="form-horizontal form-bordered ui-formwizard" enctype="multipart/form-data">
                                
                                <!-- END Step Info -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="food_name">Food Name</label>
                                    <div class="col-md-6">
                                        <input id="food_name" name="food_name" class="form-control " placeholder="Food Name" type="text">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="food_type">Food Type</label>
                                    <div class="col-md-6">
                                        <input id="food_type" name="food_type" class="form-control " placeholder="Food Type" type="text">
                                    </div>
                                </div>

                                
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="food_img">Food Image</label>
                                    <div class="col-md-6">
                                        <input id="food_img" name="food_img" type="file">
                                    </div>
                                </div>
                               
                                
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="food_desc">Food Description</label>
                                    <div class="col-xs-6">
                                        <textarea id="food_desc" name="food_desc" class="ckeditor"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="price">Food Price</label>
                                    <div class="col-md-6">
                                        <input id="price" name="price" class="form-control " placeholder="Food Price" type="text">
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
                                        <button type="submit" class="btn btn-sm btn-primary" id="next4" value="submit">Submit</button>
                                    </div>
                                </div>
                                <!-- END Form Buttons -->
                            </form>
                           
                        </div>
                        <!-- END Mini Top Stats Row -->
                       
                    </div>
                    <!-- END Page Content -->

                   <?php include 'inc/footer.php'; ?>