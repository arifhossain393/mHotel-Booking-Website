                        
                    <?php include 'inc/header.php'; ?>
                      <?php 
                        if (!isset($_GET['roomId']) || $_GET['roomId'] == NULL) {
                            echo "<script>window.location = 'viewroom.php';</script>";
                        }else {
                            $roomId = $_GET['roomId'];
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
                                        <h1>Update Room</h1>
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
                            
                        $cat_id = mysqli_real_escape_string($db->link, $_POST['cat_id']);
                        $room_title = mysqli_real_escape_string($db->link, $_POST['room_title']);
                        $room_type = mysqli_real_escape_string($db->link, $_POST['room_type']);
                        $room_desc = mysqli_real_escape_string($db->link, $_POST['room_desc']);
                        $price = mysqli_real_escape_string($db->link, $_POST['price']);
                            

                            $permited = array('jpg', 'jpeg', 'png', 'gif');
                            $file_name = $_FILES['room_img']['name'];
                            $file_size = $_FILES['room_img']['size'];
                            $file_temp = $_FILES['room_img']['tmp_name'];

                            $div = explode('.', $file_name);
                            $file_ext = strtolower(end($div));
                            $uniq_image = substr(md5(time()), 0,10).'.'.$file_ext;

                            $upload_image = "upload/".$uniq_image;

                            if ($cat_id == "" || $room_title == "" || $room_type == "" || $room_desc == "" || $price == "" ) {
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
                                        UPDATE tbl_room
                                        SET
                                        cat_id = '$cat_id',
                                        room_title = '$room_title',
                                        room_type = '$room_type',
                                        room_img = '$upload_image',
                                        room_desc = '$room_desc',
                                        price = '$price'
                                        WHERE id = '$roomId'
                                     ";
                                    $update_room = $db->update($query);
                                    if ($update_room) {
                                        echo "<span style='color:green;'>Room Update Successfully</span>";
                                    }else {
                                        echo "<span style='color:red;'>Room Update Not Successfully</span>";
                                    }
                                }
                            }else {
                                 move_uploaded_file($file_temp, $upload_image);
                                    $query = "
                                        UPDATE tbl_room
                                        SET
                                        cat_id = '$cat_id',
                                        room_title = '$room_title',
                                        room_type = '$room_type',
                                        room_img = '$upload_image',
                                        room_desc = '$room_desc',
                                        price = '$price'
                                        WHERE id = '$roomId'
                                     ";
                                    $update_room = $db->update($query);
                                    if ($update_room) {
                                        echo "<span style='color:green;'>Room Update Successfully</span>";
                                    }else {
                                        echo "<span style='color:red;'>Room Update Not Successfully</span>";
                                    }
                            }
                        }
                    }
                 ?>

                        
                        <?php
                            $query = "SELECT * FROM tbl_room WHERE id = '$roomId' ORDER BY id DESC";
                            $room = $db->select($query);
                            if ($room) {
                                while ($roomresult = $room->fetch_assoc()) {
                             
                        ?>   
                           <form  action="" method="post" class="form-horizontal form-bordered ui-formwizard" enctype="multipart/form-data">
                                
                                <!-- END Step Info -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="room_title">Room Title</label>
                                    <div class="col-md-6">
                                        <input id="room_title" name="room_title" class="form-control " value="<?php echo $roomresult['room_title']; ?>" type="text">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="cat_id">Category Name</label>
                                    <div class="col-md-6">
                                        <select id="cat_id" name="cat_id" class="form-control" size="1">
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
                                    <label class="col-md-4 control-label" for="room_type">Room Type</label>
                                    <div class="col-md-6">
                                        <input id="room_type" name="room_type" class="form-control " value="<?php echo $roomresult['room_type']; ?>" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="room_img">Room Image</label>
                                    <div class="col-md-6">
                                        <img style="height: 60px; width: 60px;" src="../admin/<?php echo $roomresult['room_img']; ?>">
                                        <input id="room_img" name="room_img" type="file">
                                    </div>
                                </div>
                               
                                
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="room_desc">Room Description</label>
                                    <div class="col-xs-6">
                                        <textarea id="room_desc" name="room_desc" class="ckeditor"><?php echo $roomresult['room_desc']; ?></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="price">Price</label>
                                    <div class="col-md-6">
                                        <input id="price" name="price" class="form-control " value="<?php echo $roomresult['price']; ?>" type="text">
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