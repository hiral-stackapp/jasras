<div class="musthead">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <div class="logo">
                    <h1><img src="images/jasras-logo.png" title="JASRAS" /></h1>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="topmenu pull-right">
                    <ul>
                        <li>Signed in as <a href="#" class="navbar-link"><?php echo $_SESSION['fullname'] . ' (' . $_SESSION['user_type'] . ')'; ?></a></li>
                        <?php
                        if ($_SESSION['user_type'] == 'admin') {
                            // if( ($_SESSION['loginid']) && ($_SESSION['password']) && ($_SESSION['user_type']) ) {
                            ?>
                            <li>| <a href="/logout.php">Logout</a></li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <?php
                if ($_SESSION['user_type'] == 'admin') {
                    ?>
                    <li class="dropdown <?php echo ( ($pageTitle == 'User Registration') || ($pageTitle == 'All Users')) ? 'active' : ''; ?>">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Users <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/register.php">Register User</a></li>
                            <li><a href="/list-users.php">List Users</a></li>
                        </ul>
                    </li>
                    <?php
                }
                ?>

                <li class="dropdown <?php echo ( ($pageTitle == 'Create Job') || ($pageTitle == 'Add Job') || ($pageTitle == 'View All Jobs')) ? 'active' : ''; ?>">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Jobs <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <?php
                        if ($_SESSION['user_type'] == 'admin') {
                            ?>
                            <li><a href="/list-jobs.php">Create Job</a></li>
                            <?php
                        }
                        ?>
                        <li><a href="/add-job.php">Add Job</a></li>
                        <li><a href="/view-jobs.php">View All Jobs</a></li>
                    </ul>
                </li>

                <?php
                if ($_SESSION['user_type'] == 'admin') {
                    ?>
                    <li class="<?php echo ($pageTitle == 'Add New Profile') ? 'active' : ''; ?>"><a href="/add-profile.php">Profile</a></li>
                    <li class="<?php echo ($pageTitle == 'Add New Client') ? 'active' : ''; ?>"><a href="/add-client.php">Client</a></li>
                    <li class="<?php echo ($pageTitle == 'Add New Density') ? 'active' : ''; ?>"><a href="/add-density.php">Density</a></li>
                    <li class="<?php echo ($pageTitle == 'Add Media Brand Name') ? 'active' : ''; ?>"><a href="/add-media-brand.php">Media Brand</a></li>

                    <li class="<?php echo ($pageTitle == 'Add Media Type') ? 'active' : ''; ?>"><a href="/add-media-type.php">Media Type</a></li>


                    <li class="<?php echo ($pageTitle == 'Add Media Seller') ? 'active' : ''; ?>">
                        <a href="/add-media-seller.php">Media Seller</a>
                    </li> 

                    <li class="<?php echo ($pageTitle == 'Add Platform Type') ? 'active' : ''; ?>"><a href="/add-platform-type.php">Platform Type</a></li>
                    <li class="<?php echo ($pageTitle == 'Add Print Mode') ? 'active' : ''; ?>"><a href="/add-print-mode.php">Print Mode</a></li>
                    <li class="<?php echo ($pageTitle == 'Add Print Quality') ? 'active' : ''; ?>"><a href="/add-print-quality.php">Print Quality</a></li>
                    <li class="<?php echo ($pageTitle == 'Add Print Type') ? 'active' : ''; ?>"><a href="/add-print-type.php">Print Type</a></li>
                    <li class="<?php echo ($pageTitle == 'Add Shutter Mode') ? 'active' : ''; ?>"><a href="/add-shutter-mode.php">Shutter Mode</a></li>
                    <li class="<?php echo ($pageTitle == 'Add RTL Name') ? 'active' : ''; ?>"><a href="/add-rtl-name.php">RTL</a></li>

                    <li class="dropdown <?php echo ($pageTitle == 'Tools') ? 'active' : ''; ?>">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Tools <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/export.php">Export</a></li>
                            <li><a href="#">Archive</a></li>
                        </ul>
                    </li>
                <?php } ?>


                <?php
                if ($_SESSION['user_type'] != 'admin') {
                    ?>
                    <li><a href="/logout.php">Logout</a></li>
                <?php } ?>

            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
