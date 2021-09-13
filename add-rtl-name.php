<?php
$pageTitle = "Add RTL Name";
require_once('config.php');
include_once('header.php');

check_login();
include_once('menu.php');

adminOnly();
?>
<?php
if (isset($_POST['submit'])) {
    $rtl_desc = (!empty($_POST['rtl_desc'])) ? $_POST['rtl_desc'] : '';

    if (empty($_POST['rtl_name']) || !isset($_POST['rtl_name']) || strlen($_POST['rtl_name']) < 1) {
        $errorMsg = array("<b>Error:</b>", "RTL name cannot be empty!");
    }

    if (strlen($_POST['rtl_name']) > 1) {
        $rtl_name = $_POST['rtl_name'];

        $client = $database->select("rtlname", "*", ["rtl_name" => "$rtl_name"]);
        if (!empty($client)) {
            $errorMsg = array("<b>Error:</b>", "RTL Name already exist!");
        } else {
            $rtl_id = $database->insert("rtlname", [
                "rtl_name" => "$rtl_name",
                "rtl_desc" => "$rtl_desc",
                "created_on" => date('Y-m-d H:i:s')
            ]);
            if ($rtl_id) {
                $successMsg = array("<b>" . $rtl_name . "</b>", "Successfully added to database!");
            }
        }
    }
}
?>

<div class="container">
    <div class="row">
        <div class="col-lg-12"><h1 class="pagetitle"><?php echo $pageTitle; ?></h1></div>
        <div class="col-lg-12">
            <form class="form-add-rtl" method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">

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
                            <label for="rtl_name" class="rtl_id">Name</label>
                            <input type="text" id="rtl_name" name="rtl_name" class="form-control input-lg" placeholder="RTL Name" required autofocus>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="rtl_desc" class="rtl_desc">Description</label>
                            <input type="text" id="rtl_desc" name="rtl_desc" class="form-control input-lg" placeholder="RTL Description">
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
    $items = $database->select("rtlname", "*", ['ORDER' => 'rtl_name ASC']);
    if ($items):
        ?>
        <div class="row">
            <div class="col-lg-12" id="list">
                <h3>All RTL Name</h3>
                <dl class="dl-horizontal">
                    <dt>ID</dt>
                    <dd>NAME</dd>
                    <?php foreach ($items AS $item) : ?>
                        <dt><i><?= $item['rtl_id']; ?></i></dt>
                        <dd><?= $item['rtl_name']; ?></dd>
                    <?php endforeach; ?>
                </dl>
            </div>
        </div>
    <?php endif; ?>


</div><!-- /.container -->


<?php
include_once("footer.php");
?>
