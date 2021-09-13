<?php
$pageTitle = "Add New Client";
require_once('config.php');
include_once('header.php');

check_login();
include_once('menu.php');

adminOnly();
?>
<?php
if (isset($_POST['submit'])) {

    if (empty($_POST['client_name']) || !isset($_POST['client_name']) || strlen($_POST['client_name']) < 2) {
        $errorMsg = array("<b>Error:</b>", "Client Name cannot be empty!");
    }

    if (strlen($_POST['client_name']) > 2) {
        $client_name = $_POST['client_name'];

        $client = $database->select("clients", "*", ["client_name" => "$client_name"]);
        if (!empty($client)) {
            $errorMsg = array("<b>Error:</b>", "Client name already exist!");
        } else {
            $client_id = $database->insert("clients", ["client_name" => "$client_name"]);
            if ($client_id) {
                $successMsg = array("<b>" . $client_name . "</b>", "Successfully added to database!");
            }
        }
    }
}
?>

<div class="container">
    <div class="row">
        <div class="col-lg-12"><h1 class="pagetitle"><?php echo $pageTitle; ?></h1></div>
        <div class="col-lg-12">
            <form class="form-add-client" method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">

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
                            <label for="client_name" class="client_id">Client Name</label>
                            <input type="text" id="client_name" name="client_name" class="form-control input-lg" placeholder="Client Name" rsequired autofocus>
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
    $clientlist = $database->select("clients", "*", ['status' => '1', 'ORDER' => 'client_id DESC']);
    if ($clientlist):
        ?>
        <div class="row">
            <div class="col-lg-12" id="list">
                <h3>All Clients</h3>
                <dl class="dl-horizontal">
                    <dt><b><i>ID</i></b></dt>
                    <dd><b><i>NAME</i></b></dd>
                    <?php foreach ($clientlist AS $client) : ?>

                        <dt class="row_<?= $client['client_id']; ?>"><i><?= $client['client_id']; ?></i></dt>
                        <dd class="row_<?= $client['client_id']; ?>">
                            <?= $client['client_name']; ?>
                            <a href="?action=delete_client&client_id=<?php echo $client['client_id']; ?>" style="color: #3d3d3d; text-decoration: none" class="pull-right deleteClient" data-id=".row_<?php echo $client['client_id']; ?>" data-client-name="<?php echo $client['client_name']; ?>">
                                <span class="glyphicon btn-glyphicon glyphicon-trash" style="color: #3d3d3d; margin-right: 5px;"></span> DELETE
                            </a>
                        </dd>

                    <?php endforeach; ?>
                </dl>
            </div>
        </div>
    <?php endif; ?>


</div><!-- /.container -->


<?php
include_once("footer.php");
?>
