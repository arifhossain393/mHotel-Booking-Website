                <!-- Main Sidebar -->
                <div id="sidebar">
                    <!-- Wrapper for scrolling functionality -->
                    <div id="sidebar-scroll">
                        <!-- Sidebar Content -->
                        <div class="sidebar-content">
                            <!-- Brand -->
                            <a href="index.php" class="sidebar-brand">
                                <i class="gi gi-flash"></i><span class="sidebar-nav-mini-hide"><strong>Admin</strong>Dashboard</span>
                            </a>
                            <!-- END Brand -->
                                <?php
                                        if (isset($_GET['action']) && $_GET['action'] == "logout") {
                                            Session::destroy();
                                        }

                                ?>
                            <!-- User Info -->
                            <div class="sidebar-section sidebar-user clearfix sidebar-nav-mini-hide">
                                <div class="sidebar-user-avatar">
                                    <a href="index.php">
                                        <img src="img/placeholders/avatars/avatar2.jpg" alt="avatar">
                                    </a>
                                </div>
                                <div class="sidebar-user-name"><?php echo Session::get('username'); ?></div>
                                <div class="sidebar-user-links">
                                    <a href="profile.php" data-toggle="tooltip" data-placement="bottom" title="Profile"><i class="gi gi-user"></i></a>
                                    <a href="inbox.php" data-toggle="tooltip" data-placement="bottom" title="Messages"><i class="gi gi-envelope"></i></a>
                                
                                    <a href="?action=logout" data-toggle="tooltip" data-placement="bottom" title="Logout"><i class="gi gi-exit"></i></a>
                                </div>
                            </div>
                         <!-- END User Info -->
                         <!-- Sidebar Navigation -->
                            <ul class="sidebar-nav">
                               
                                <li>
                                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-stopwatch sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Category</span></a>
                                    <ul>
                                        <li>
                                            <a href="addcategory.php">Add Category</a>
                                        </li>
                                        <li>
                                            <a href="viewcategory.php">Category List</a>
                                        </li>
                                       
                                    </ul>
                                </li>

                                <li>
                                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-stopwatch sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Room</span></a>
                                    <ul>
                                        <li>
                                            <a href="addroom.php">Add Room</a>
                                        </li>
                                        <li>
                                            <a href="viewroom.php">Room List</a>
                                        </li>
                                       
                                    </ul>
                                </li>

                                <li>
                                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-stopwatch sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Resturent</span></a>
                                    <ul>
                                        <li>
                                            <a href="addresturent.php">Add Food</a>
                                        </li>
                                        <li>
                                            <a href="viewresturent.php">Food List</a>
                                        </li>
                                       
                                    </ul>
                                </li>

                                <li>
                                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-stopwatch sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Package</span></a>
                                    <ul>
                                        <li>
                                            <a href="addpackage.php">Add Package</a>
                                        </li>
                                        <li>
                                            <a href="viewpackage.php">Package List</a>
                                        </li>
                                        
                                    </ul>
                                </li>
                                <li>
                                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-stopwatch sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Booking Info</span></a>
                                    <ul>
                                        <li>
                                            <a href="bookinglist.php">Booking List</a>
                                        </li>
                                        <li>
                                            <a href="customer.php">User List</a>
                                        </li>
                                        <li>
                                            <a href="bookamount.php">Booking Amount</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <!-- END Sidebar Navigation -->
                        </div>
                        <!-- END Sidebar Content -->
                    </div>
                    <!-- END Wrapper for scrolling functionality -->
                </div>
                <!-- END Main Sidebar -->