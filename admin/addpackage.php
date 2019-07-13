                        
                    <?php include 'inc/header.php'; ?>
                        
                    <!-- Page content -->
                    <div id="page-content">
                        <!-- Dashboard Header -->
                        
                        <div class="content-header content-header-media">
                            <div class="header-section">
                                <div class="row">
                                    <!-- Main Title (hidden on small devices for the statistics to fit) -->
                                    <div class="col-md-4 col-lg-6 hidden-xs hidden-sm">
                                        <h1>Add Package</h1>
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
                            
                            $catid = mysqli_real_escape_string($db->link, $_POST['catid']);
                            $resturent_id = mysqli_real_escape_string($db->link, $_POST['resturent_id']);
                            $pac_name = mysqli_real_escape_string($db->link, $_POST['pac_name']);
                            $pac_desc = mysqli_real_escape_string($db->link, $_POST['pac_desc']);
                            $pac_duration = mysqli_real_escape_string($db->link, $_POST['pac_duration']);
                            $startDate = mysqli_real_escape_string($db->link, $_POST['startDate']);
                            $endDate = mysqli_real_escape_string($db->link, $_POST['endDate']);
                            $pac_price = mysqli_real_escape_string($db->link, $_POST['pac_price']);
                            $pac_quantity = mysqli_real_escape_string($db->link, $_POST['pac_quantity']);
                            

                            $permited = array('jpg', 'jpeg', 'png', 'gif');
                            $file_name = $_FILES['pac_img']['name'];
                            $file_size = $_FILES['pac_img']['size'];
                            $file_temp = $_FILES['pac_img']['tmp_name'];

                            $div = explode('.', $file_name);
                            $file_ext = strtolower(end($div));
                            $uniq_image = substr(md5(time()), 0,10).'.'.$file_ext;

                            $upload_image = "upload/".$uniq_image;

                            if ($catid == "" || $resturent_id == "" || $pac_name == "" || $pac_desc == "" || $pac_duration == "" || $startDate == "" || $endDate == "" || $pac_price == "" || $pac_quantity == "" ) {
                                echo"<span style='color:red;'>Field must not be empty</span>";
                            } elseif (empty($file_name)) {
                            echo "<div class='alert alert-danger'>Select any Image.</div>";
                            }elseif (in_array($file_ext, $permited) === false) {
                                echo "<div class='alert alert-danger'>you can upload only:-".implode(',', $permited)."</div>";
                            }else {
                                
                            
                            move_uploaded_file($file_temp, $upload_image);
                            $query = "INSERT INTO tbl_package(catid, resturent_id, pac_name, pac_desc, pac_img, pac_duration, startDate, endDate, pac_price, pac_quantity) VALUES('$catid', '$resturent_id', '$pac_name', '$pac_desc', '$upload_image', '$pac_duration', '$startDate', '$endDate', '$pac_price', '$pac_quantity')";
                            $insert_rows = $db->insert($query);
                            if ($insert_rows) {
                                echo "<span style='color:green;'>Add Package Successfully</span>";
                            }else {
                                echo "<span style='color:red;'>Package Not add Successfully</span>";
                            }
                        }
                    }
                    ?>
                           <form  action="" method="post" class="form-horizontal form-bordered ui-formwizard" enctype="multipart/form-data">
                                
                                <!-- END Step Info -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="pac_name">Package Name</label>
                                    <div class="col-md-6">
                                        <input id="pac_name" name="pac_name" class="form-control " placeholder="Package Name.." type="text">
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="catid">Category Name</label>
                                    <div class="col-md-6">
                                        <select id="catid" name="catid" class="form-control" size="1">
                                            <?php 
                                                $query = "select * from tbl_category";
                                                $category = $db->select($query);
                                                if ($category) {
                                                    while($result = $category->fetch_assoc()){
                                            ?>
                                            <option value="<?php echo $result['id']; ?>"><?php echo $result['cat_name']; ?></option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="resturent_id">Food Name</label>
                                    <div class="col-md-6">
                                        <select id="resturent_id" name="resturent_id" class="form-control" size="1">
                                            <?php 
                                                $query = "select * from tbl_resturent";
                                                $resturent = $db->select($query);
                                                if ($resturent) {
                                                    while($result = $resturent->fetch_assoc()){
                                            ?>
                                            <option value="<?php echo $result['id']; ?>"><?php echo $result['food_name']; ?></option>
                                           <?php } } ?>
                                        </select>
                                    </div>
                                </div>
                                
                                
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="pac_desc">Package Description</label>
                                    <div class="col-xs-6">
                                        <textarea id="pac_desc" name="pac_desc" class="ckeditor"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="pac_img">Package Image</label>
                                    <div class="col-md-6">
                                        <input id="pac_img" name="pac_img" type="file">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="pac_duration">Package Duration</label>
                                    <div class="col-md-6">
                                        <input id="pac_duration" name="pac_duration" class="form-control " placeholder="Package Duration" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="startDate">Start Date</label>
                                    <div class="col-md-6">
                                        <input id="startDate" name="startDate" class="form-control input-datepicker" data-date-format="yyyy/mm/dd" placeholder="yyyy/mm/dd" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="endDate">End Date</label>
                                    <div class="col-md-6">
                                        <input id="endDate" name="endDate" class="form-control input-datepicker" data-date-format="yyyy/mm/dd" placeholder="yyyy/mm/dd" type="text">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="pac_price">Package Price</label>
                                    <div class="col-md-6">
                                        <input id="pac_price" name="pac_price" class="form-control " placeholder="Package Price" type="text">
                                    </div>
                                </div>
                                

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="pac_quantity">Queantity</label>
                                    <div class="col-md-6">
                                        <input id="pac_quantity" name="pac_quantity" class="form-control " placeholder="Package People Quantity" type="text">
                                    </div>
                                </div>
                                
                                 <!-- END First Step -->

                                <!-- Form Buttons -->
                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                        <button type="submit" class="btn btn-sm btn-primary" id="next4" value="Next">Submit</button>
                                    </div>
                                </div>
                                <!-- END Form Buttons -->
                            </form>
                           
                        </div>
                        <!-- END Mini Top Stats Row -->
                       
                    </div>
                    <!-- END Page Content -->

                   <?php include 'inc/footer.php'; ?>