<?php
session_start();
?>
<div class="sl-header">
    <div class="sl-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a>
        </div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i
                    class="icon ion-navicon-round"></i></a></div>
    </div><!-- sl-header-left -->
    <div class="sl-header-right">
        <nav class="nav">
            <div class="dropdown">
                <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
                    <span style="font-size:25px;" class="logged-name"><span class="hidden-md-down">
                            Admin:
                            <?php
                                echo $_SESSION['name'] ;
                                     ?>
                        </span></span>
                    <img src="../img/img3.jpg" class="wd-32 rounded-circle" alt="">

                </a>
                <div class="dropdown-menu dropdown-menu-header wd-200">
                    <ul class="list-unstyled user-profile-nav">
                        <li><a href="http://localhost/ecommerce/admin/changepassword.php"><i
                                    class="icon ion-ios-person-outline"></i> Change Password</a></li>
                        <li><a href="http://localhost/ecommerce/admin/edit.php?id=   <?php
                                echo $_SESSION['admin_id'] ;
                                     ?>"><i class="icon ion-ios-gear-outline"></i> Edit Profile</a></li>
                        <li><a href="http://localhost/ecommerce/admin/logout.php"><i class="icon ion-power"></i>
                                Sign Out</a></li>
                    </ul>
                </div><!-- dropdown-menu -->
            </div><!-- dropdown -->
        </nav>
    </div><!-- sl-header-right -->
</div><!-- sl-header -->