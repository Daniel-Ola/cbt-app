<?php
session_start() ;
include_once("../php/dbfunctions.php") ;
include_once("../php/config.php") ;
if(isset($_SESSION['user_id']))
{
    $user_id = $_SESSION['user_id'] ;
    $username = $_SESSION['username'] ;
    $password = $_SESSION['password'] ;
}
else
{
    redirect("login.php") ;
}

?>

<div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="" class="logo"><i class="icon-magnet icon-c-logo"></i><span>Ubc</span></a>
                        <!-- Image Logo here -->
                        <!--<a href="index.html" class="logo">-->
                            <!--<i class="icon-c-logo"> <img src="assets/images/logo_sm.png" height="42"/> </i>-->
                            <!--<span><img src="assets/images/logo_light.png" height="20"/></span>-->
                        <!--</a>-->
                    </div>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button class="button-menu-mobile open-left waves-effect waves-light">
                                    <i class="md md-menu"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>

                            <ul class="nav navbar-nav hidden-xs">
                                <!-- <li><a href="#" class="waves-effect waves-light">Files</a></li> -->
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown"
                                       role="button" aria-haspopup="true" aria-expanded="false">Quick Links <span
                                            class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="dashboard.php">Set question</a></li>
                                        <li><a href="viewquestions.php">View questions</a></li>
                                        <li><a href="settings.php">Settings</a></li>
                                        <li><a href="evaluate.php?sub=all&lim=">Evaluation sheets</a></li>
                                        <li><a href="logout.php">Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
<input type="hidden" value="<?php echo $user_id ; ?>" id="user_id" name="user_id"> 

                            <ul class="nav navbar-nav navbar-right pull-right">
                                
                                <li class="dropdown top-menu-item-xs">
                                    <a href="" class="dropdown-toggle profile waves-effect waves-light" data-toggle="dropdown" aria-expanded="true"><img src="http://ore-oluwadaniel/ubc/images/ubc_logo.png" alt="user-img" class="img-circle"> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="settings.php"><i class="ti-lock m-r-10 text-custom"></i> Change Password</a></li>
                                        <li class="divider"></li>
                                        <li><a href="logout.php"><i class="ti-power-off m-r-10 text-danger"></i> Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>

                          <li class="text-muted menu-title">Navigation</li>

                            <li class="has_sub active">
                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-home"></i> <span> Dashboard </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="dashboard.php"><i class="ti ti-pencil-alt"></i> Set question</a></li>
                                    <li><a href="viewquestions.php"><i class="ti ti-eye"></i> View questions</a></li>
                                    <li><a href="settings.php"><i class="ti ti-settings"></i> Settings</a></li>
                                    <li><a href="evaluate.php?sub=all&lim="><i class="ti ti-notepad"></i> Evaluation sheets</a></li>
                                    <li><a href="logout.php"><i class="ti ti-power-off"></i> Logout</a></li>
                                </ul>
                            </li>

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>