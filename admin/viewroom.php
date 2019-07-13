                        
                    <?php include 'inc/header.php'; ?>

                    <!-- Page content -->
                    <div id="page-content">
                        <!-- Dashboard Header -->
                        
                        <div class="content-header content-header-media">
                            <div class="header-section">
                                <div class="row">
                                    <!-- Main Title (hidden on small devices for the statistics to fit) -->
                                    <div class="col-md-4 col-lg-6 hidden-xs hidden-sm">
                                        <h1>Room List</h1>
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
                            <h2>Room List</h2>
                            <div class="block">
                                
                                <table class="data display datatable" id="example">
                                    <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th width="20%">Name</th>
                                            <th width="20%">Room Type</th>
                                            <th width="15%">Room Image</th>
                                            <th width="20%">Description</th>
                                            <th width="10%">Price</th>
                                            <th width="10%">Action</th>
                                            
                                        </tr>
                                    </thead>
                                     <?php
                                        $query = "SELECT * FROM tbl_room ORDER BY id";

                                        $room = $db->select($query);
                                        if ($room) {
                                            $i = 0;
                                            while ($result = $room->fetch_assoc()) {
                                                $i++;
                                          
                                     ?>
                                    <tbody>
                                      
                                        <tr class="odd gradeX">
                                            <td><?php echo $i; ?></td>
                                            <td><p><?php echo $result['room_title']; ?></p></td>
                                            <td><p><?php echo $result['room_type'], 20; ?></p></td>
                                            <td><img style="height: 60px; width: 60px;" src="../admin/<?php echo $result['room_img']; ?>"></td>
                                            <td><p><?php echo $fm->textShorten($result['room_desc'], 40); ?></p></td>
                                            <td><p><?php echo $result['price']; ?></p></td>
                                            
                                            
                                            <td><div class="btn-group">
                                                <a href="updateroom.php?roomId=<?php echo $result['id']; ?>" data-toggle="tooltip" title="" class="btn btn-xs btn-default" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                                <a href="delroom.php?roomId=<?php echo $result['id']; ?>" onclick="return confirm('Are you Sure to Delete!');" data-toggle="tooltip" title="" class="btn btn-xs btn-danger" data-original-title="Delete"><i class="fa fa-times"></i></a>
                                            </div></td>
                                            
                                        </tr>
                                    </tbody>
                                    <?php   }  } ?>
                                </table>
                            

                           </div>
                        </div>
                    </div>
                        <!-- END Mini Top Stats Row -->
                       
                    </div>
                    <!-- END Page Content -->

                   <?php include 'inc/footer.php'; ?>