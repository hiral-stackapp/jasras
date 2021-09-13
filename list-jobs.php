<?php
$pageTitle = "Create Job";
require_once('config.php');
include_once('header.php');

check_login();
include_once('menu.php');

adminOnly();

if (isset($_POST['submit'])) {
    $job_id = (isset($_POST['job_id'])) ? $_POST['job_id'] : '';
    $client_id = (isset($_POST['client_id'])) ? $_POST['client_id'] : '';
    $valid = true;

    if (empty($job_id)) {
        $valid = false;
        $errorMsg[] = "Job ID is required";
    } else {
        $result = $database->select("jobs", '*', ["job_id" => "$job_id"]);
#var_dump( $result );
        if ($result == true) {
            $errorMsg[] = "Job ID already exist";
            $valid = false;
        }
    }

    if (empty($client_id)) {
        $valid = false;
        $errorMsg[] = "Client name is required";
    }

    if ($valid == true) {
        $lastid = $database->insert("jobs", [
            'jsid' => NULL,
            'job_id' => $job_id,
            'client_id' => $client_id,
            'created_on' => date('Y-m-d H:i:s')
        ]);
        var_dump($lastid);
    }
}
?>

<div class="container">
    <div class="row">
        <div class="col-lg-12"><h1 class="pagetitle"><?php echo $pageTitle; ?></h1></div>
        <div class="col-lg-12">
            <form class="form-list-job" name="form-list-job" method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">

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
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="job_id" class="job_id">Job ID</label>
                            <input type="number" id="job_id" name="job_id" class="form-control" placeholder="Job ID" required autofocus>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label for="client_id" class="">Client Name</label>
                            <select data-placeholder="Select" class="form-control chosen-select" name="client_id" required autofocus>
                                <option value=""></option>
                                <?php
                                $results = $database->select("clients", "*", ['ORDER' => 'client_name ASC']);
                                foreach ($results AS $result):
                                    echo "<option value='" . $result['client_id'] . "'>" . $result['client_name'] . "</option>";
                                endforeach;
                                ?>
                            </select>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="submit" name="submit" value="Add" class="btn btn-success input-lg pull-right">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="gap">&nbsp;</div>

    <div class="row">
        <div class="col-lg-12"><h1 class="pagetitle">All  Jobs</h1></div>
    </div>

    <?php
    $results = $database->select('jobs', [
        "[>]clients" => ["client_id" => "client_id"]
            ], '*', [
        "ORDER" => ["clients.client_name ASC", "jobs.job_id ASC"]
    ]);
    #var_dump( $results );

    foreach ($results AS $result) :
        $alljobs[$result['client_name']][] = array(
            'job_id' => $result['job_id'],
            'client_name' => $result['client_name'],
            'client_id' => $result['client_id'],
            'created_on' => $result['created_on'],
        );

    endforeach;
    ?>


    <div class="row">
        <div class="col-lg-12">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                <?php
                $id = '0';
                foreach ($alljobs AS $clientname => $clientdata):
                    $id++;
                    ?>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="heading_<?= $id; ?>">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_<?= $id; ?>" aria-expanded="false" aria-controls="collapse_<?= $id; ?>">
                                    <?php echo $clientname; ?>
                                </a>
                            </h4>
                        </div>
                        <div id="collapse_<?= $id; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_<?= $id; ?>">
                            <div class="panel-body">
                                <ul class="jobblocks row">
                                    <?php
                                    foreach ($clientdata AS $v) :
                                        ?>
                                        <li class="col-lg-1">
                                            <a href="<?php echo SITEURL; ?>/add-job.php?job_id=<?php echo $v['job_id']; ?>"><?php echo $v['job_id']; ?></a>
                                        </li>
                                        <?php
                                    endforeach;
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php
                endforeach;
                ?>


            </div>
        </div>
    </div>
</div> <!-- container -->


<?php
include_once("footer.php");
?>
