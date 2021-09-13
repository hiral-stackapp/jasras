<?php
$pageTitle = "Add New Profile";
require_once('config.php');
include_once('header.php');

check_login();
include_once('menu.php');

adminOnly();
?>
<?php
if (isset($_POST['submit'])) {
    if (empty($_POST['profile_label']) || !isset($_POST['profile_label']) || strlen($_POST['profile_label']) < 2) {
        $errorMsg = array("<b>Error:</b>", "Profile Label cannot be empty!");
    }
    if (strlen($_POST['profile_label']) > 2) {
        $profile_label = $_POST['profile_label'];
        $profile = $database->select("profile_env", "*", ["profile_label" => "$profile_label"]);
        if (!empty($profile)) {
            $errorMsg = array("<b>Error:</b>", "Profile label already exist!");
        } else {
            $profile_id = $database->insert("profile_env", ["profile_label" => "$profile_label"]);
            if ($profile_id) {
                $successMsg = array("<b>" . $profile_label . "</b>", "Successfully added to database!");
            }
        }
    }
}
?> 
<div class="container">
    <div class="row">
        <div class="col-lg-12"><h1 class="pagetitle"><?php echo $pageTitle; ?></h1></div>
        <div class="col-lg-12">
            <form class="form-add-profile" method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">

                <div class="gap">
                    <?php
                    if (isset($errorMsg)):
                        ?>
                        <div class="row" id="errorMsg">
                            <div class="col-lg-12">
                                <div class="alert alert-danger clearfix" role="alert">
                                    <div class="col-lg-1">
                                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                    </div>
                                    <div class="col-lg-11">
                                        <ul>
                                            <?php foreach ($errorMsg AS $text) : ?>
                                                <li><?= $text; ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    endif;
                    ?>


                    <?php
                    if (isset($successMsg)):
                        ?>
                        <div class="row" id="successMsg">
                            <div class="col-lg-12">
                                <div class="alert alert-success clearfix" role="alert">
                                    <div class="col-lg-1">
                                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                    </div>
                                    <div class="col-lg-11">
                                        <ul>
                                            <?php foreach ($successMsg AS $text) : ?>
                                                <li><?= $text; ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    endif;
                    ?>




                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="profile_label" class="profile_id">Profile Label</label>
                            <input type="text" id="profile_label" name="profile_label" class="form-control input-lg" placeholder="Profile Label" rsequired autofocus>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="submit" name="submit" value="Save" class="btn btn-success input-lg pull-right">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php
    // http://simplemvcframework.com/documentation/v2/pagination-class
    $profilelist = $database->select("profile_env", "*", ['ORDER' => 'profile_id DESC']);
    if ($profilelist):
        ?>
        <div class="row">
            <div class="col-lg-12" id="list">
                <h3>All profiles</h3>
                <dl class="dl-horizontal">
                    <dt><b><i>ID</i></b></dt>
                    <dd><b><i>NAME</i></b></dd>
                    <?php foreach ($profilelist AS $profile) : ?>
                        <dt><i><?= $profile['profile_id']; ?></i></dt>
                        <dd><?= $profile['profile_label']; ?></dd>
                    <?php endforeach; ?>
                </dl>
            </div>
        </div>
    <?php endif; ?>


</div><!-- /.container -->


<?php
include_once("footer.php");
?> 