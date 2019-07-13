                        
                    <?php include 'inc/header.php'; ?>

                    <?php 
                        if (isset($_GET['EmptId'])) {
                            $id = $_GET['EmptId'];
                            $id = mysqli_real_escape_string($db->link, $id);
                           
                            $query = "UPDATE tbl_room
                                SET status = '0'
                                WHERE id = '$id'
                            ";
                            $update_status = $db->update($query);

                            if ($update_status) {
                                echo"<span style='color:green;'>Empty Room</span>";
                            }else {
                                 //echo"<span style='color:red;'>Product not Delivary</span>";
                            }
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
                                        <h1>Room Booking List</h1>
                                    </div>
                                    <!-- END Main Title -->
                                </div>
                            </div>
                            
                            <img src="img/placeholders/headers/dashboard_header.jpg" alt="header image" class="animation-pulseSlow">
                        </div>
                        <!-- END Dashboard Header -->

                        <!-- Mini Top Stats Row -->
                        <div class="row">
                          <div class="box round first grid">
                            <h2>Room Reservation List</h2>
                            <div class="block">
                                <?php 
                                    if (isset($_GET['delcat'])) {
                                        $delcat = $_GET['delcat'];
                                        $delquery = "delete from tbl_payment where id='$delcat'";
                                        $deldata = $db->delete($delquery);
                                        if ($deldata) {
                                            echo"<span style='color:green;'>Order Delete Successfully</span>";
                                        }else{
                                            echo"<span style='color:green;'>Order not Delete</span>";
                                        }
                                    }

                            ?>


                            <div class="block-title">
                                <h2><i class="fa fa-shopping-cart"></i> <strong>Room Reservation</strong></h2>
                            </div>
                            <!-- END Products Title -->

                            <!-- Products Content -->
                            <div class="table-responsive">
                                <table class="table table-bordered table-vcenter">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 100px;">No</th>
                                            <th>Room Name</th>
                                            <th class="text-center">Room ID</th>
                                            <th class="text-center">Price</th>
                                            <th class="text-right">User Info</th>
                                            <th class="text-right">Check In Date</th>
                                            <th class="text-right">Check Out Date</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                <?php

                                  $query = "SELECT * FROM tbl_payment ORDER BY id";
                                  $cartpro = $db->select($query);
                                  if ($cartpro) {
                                    $sum = 0;
                                    $i = 0;
                                      while ($result = $cartpro->fetch_assoc()) {
                                        $i++;
                                        ?>

                                        <tr>
                                            <td class="text-center"><strong><?php echo $i; ?></strong></td>
                                            <td><?php echo $result['pacName']; ?></td>
                                            <td class="text-center"><strong><?php echo $result['RpacId']; ?></strong></td>
                                            <td class="text-center"><strong>৳<?php echo $result['price']; ?></strong></td>
                                            <td class="text-right"><a href="usrinfo.php?usrId=<?php echo $result['usrId']; ?>"><p>Address</p></a></td>
                                            <td class="text-right"><strong><?php echo $fm->DateFormate($result['checkInDate']); ?></strong></td>
                                            <td class="text-right"><strong><?php echo $fm->DateFormate($result['checkOutDate']); ?></strong></td>
                                            <td class="text-right"><a class="btn btn-success" href="?EmptId=<?php echo $result['RpacId']; ?>">Empty</a>
                                            <a class="btn btn-danger" onclick="return confirm('Are you Sure to Delete!');" href="?delcat=<?php echo $result['id']; ?>">Delete</a>    
                                            </td>

                                        </tr>

                                    <?php 

                                } } ?>

                                    </tbody>
                                </table>
                            </div>

                           </div>
                        </div>
                    </div>
                        <!-- END Mini Top Stats Row -->
                       
                    </div>
                    <!-- END Page Content -->

                   <?php include 'inc/footer.php'; ?>