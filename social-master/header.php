<?php
//session_start();
function curPageName() {
 return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
}
?>


<style type="text/css">
    body{
        padding-top: 40px;
    }
</style>


<link rel="stylesheet" href="css/bootstrap.css">
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="js/bootstrap.js"></script>

<div class="navbar navbar-fixed-top head-top">
    <div class="navbar-inner ">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-circle-arrow-down"></span>
            </a>

            <a href="#" class="brand">Music Social Network</a>

            <div class="nav-collapse collapse">

                <form class="navbar-search" action="search" method="get">
                  <input type="text" class="search-query" placeholder="Search User" name="term">
                </form>
                <ul class="nav pull-right">
                    <?php
                        if(isset($_SESSION['userType']) && $_SESSION['userType'] == 'USER'){
							echo'<li><a href="home">Home</a></li>';
                        }
						else if(isset($_SESSION['userType']) && $_SESSION['userType'] == 'BAND'){
							echo'<li><a href="bandProfile">Home</a></li>';
						}
                        else{
                        echo'<li class=""><a href="index">Home</a></li>';
                        
                        }
                        if (isset($_SESSION['userType'])) {
                           if ($_SESSION['userType'] == 'ADMIN') {
                                $cssClass= '';
                                if(curPageName() == 'admin'){
                                    $cssClass = "active";
                                }
                               echo "<li class='$cssClass'><a href=\"admin\">Admin Panel</a></li>";
                           }
                        }
                        if (isset($_SESSION['userType']) && ($_SESSION['userType'] == 'USER' || $_SESSION['userType'] == 'ADMIN'))
                        {
                            $strToPrint = "<li>
                                    <a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"profile?user=" . $_SESSION['username'] . "\">
                                        <i class=\"icon-thumbs-up\"></i> " .  $_SESSION['username'] . "
                                        <span class=\"caret\"></span>
                                    </a>
                                    <ul class=\"dropdown-menu\">
                                        <li><a href=\"profile?user=" . $_SESSION['username'] . "\">Profile</a></li>
                                        <li><a href=\"settings\">Settings</a></li>
                                        <li class=\"divider\"></li>
                                        <li><a href=\"logout\">Logout</a></li>
                                    </ul>
                            </li>";
                            echo "$strToPrint";
                        }
						else if ( isset($_SESSION['userType']) && $_SESSION['userType'] == 'BAND' ){
							$strToPrint = "<li>
                                    <a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"profile?user=" . $_SESSION['username'] . "\">
                                        <i class=\"icon-thumbs-up\"></i> " .  $_SESSION['username'] . "
                                        <span class=\"caret\"></span>
                                    </a>
                                    <ul class=\"dropdown-menu\">
                                        <li><a href=\"bandProfile?user=" . $_SESSION['username'] . "\">Profile</a></li>
                                        <li><a href=\"bandSetting\">Settings</a></li>
                                        <li class=\"divider\"></li>
                                        <li><a href=\"logout\">Logout</a></li>
                                    </ul>
                            </li>";
                            echo "$strToPrint";
						}
                        else
                        {
                            echo"<li><a href=\"login\">Login / Register</a></li>";
                        }
                        ?>
                </ul>
            </div> <!-- Nav Collapse -->
        </div> <!-- End Container -->
    </div> <!-- End Navbar inner -->
</div> <!-- End navbar -->
