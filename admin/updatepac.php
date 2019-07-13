                        
                    <?php include 'inc/header.php'; ?>
                    <?php 
                        if (!isset($_GET['pacId']) || $_GET['pacId'] == NULL) {
                            header("location:viewpackage.php");
                        }else {
                            $pacId = $_GET['pacId'];
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
                                        <h1>Update Package</h1>
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
                            }else{
                                if (!empty($file_name)) {
                                    if ($file_size > 3145701) {
                                        echo "<div class='alert alert-danger'>Image size should be less 3MB.</div>";
                                    }elseif (in_array($file_ext, $permited) === false) {
                                        echo "<div class='alert alert-danger'>you can upload only:-".implode(',', $permited)."</div>";
                                    }else {
                                        
                                    move_uploaded_file($file_temp, $upload_image);
                                    $query = "
                                        UPDATE tbl_package
                                        SET
                                        catid = '$catid',
                                        resturent_id = '$catid',
                                        pac_name = '$pac_name',
                                        pac_desc = '$pac_desc',
                                        pac_img = '$upload_image',
                                        pac_duration = '$pac_duration',
                                        startDate = '$startDate',
                                        endDate = '$endDate',
                                        pac_price = '$pac_price',
                                        pac_quantity = '$pac_quantity'
                                        WHERE id = '$pacId'
                                     ";
                                    $update_package = $db->update($query);
                                    if ($update_package) {
                                        echo "<span style='color:green;'>Package Update Successfully</span>";
                                    }else {
                                        echo "<span style='color:red;'>Package Update Not Successfully</span>";
                                    }
                                }
                            }else {
                                 move_uploaded_file($file_temp, $upload_image);
                                    $query = "
                                        UPDATE tbl_package
                                        SET
                                        catid = '$catid',
                                        resturent_id = '$catid',
                                        pac_name = '$pac_name',
                                        pac_desc = '$pac_desc',
                                        pac_img = '$upload_image',
                                        pac_duration = '$pac_duration',
                                        startDate = '$startDate',
                                        endDate = '$endDate',
                                        pac_price = '$pac_price',
                                        pac_quantity = '$pac_quantity'
                                        WHERE id = '$pacId'
                                     ";
                                    $update_package = $db->update($query);
                                    if ($update_package) {
                                        echo "<span style='color:green;'>Package Update Successfully</span>";
                                    }else {
                                        echo "<span style='color:red;'>Package Update Not Successfully</span>";
                                    }
                            }
                        }
                    }
                 ?>


                            <?php
                            $query = "SELECT * FROM tbl_package WHERE id = '$pacId' ORDER BY id DESC";
                            $package = $db->select($query);
                            if ($package) {
                                while ($pacresult = $package->fetch_assoc()) {
                             
                            ?>   
                          <form  action="" method="post" class="form-horizontal form-bordered ui-formwizard" enctype="multipart/form-data">
                                
                                <!-- END Step Info -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="pac_name">Package Name</label>
                                    <div class="col-md-6">
                                        <input id="pac_name" name="pac_name" class="form-control " value="<?php echo $pacresult['pac_name']; ?>" type="text">
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
                                        <textarea id="pac_desc" name="pac_desc" class="ckeditor"><?php echo $pacresult['pac_desc']; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="pac_img">Package Image</label>
                                    <div class="col-md-6">
                                        <img style="height: 60px; width: 60px;" src="../admin/<?php echo $pacresult['pac_img']; ?>">
                                        <input id="pac_img" name="pac_img" type="file">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="pac_duration">Package Duration</label>
                                    <div class="col-md-6">
                                        <input id="pac_duration" name="pac_duration" class="form-control " value="<?php echo $pacresult['pac_duration']; ?>" type="text">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="startDate">Start Date</label>
                                    <div class="col-md-6">
                                        <input id="startDate" name="startDate" class="form-control input-datepicker" data-date-format="yyyy/mm/dd" value="<?php echo $pacresult['startDate']; ?>" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="endDate">End Date</label>
                                    <div class="col-md-6">
                                        <input id="endtDate" name="endDate" class="form-control input-datepicker" data-date-format="yyyy/mm/dd" value="<?php echo $pacresult['endDate']; ?>" type="text">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="pac_price">Package Price</label>
                                    <div class="col-md-6">
                                        <input id="pac_price" name="pac_price" class="form-control " value="<?php echo $pacresult['pac_price']; ?>" type="text">
                                    </div>
                                </div>
                                

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="pac_quantity">Queantity</label>
                                    <div class="col-md-6">
                                        <input id="pac_quantity" name="pac_quantity" class="form-control " value="<?php echo $pacresult['pac_quantity']; ?>" type="text">
                                    </div>
                                </div>
                                
                                 <!-- END First Step -->

                                <!-- Form Buttons -->
                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                        <button type="submit" class="btn btn-sm btn-primary" id="next4" value="submit">Update</button>
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