<?php
ob_start();
if (!isset($_SESSION)) {
    session_start();
}

require_once 'includes/header.php';

$page_title = "publish result";
$title = "result";

include_once 'autoload/Autoload.php';
require_once 'lib/security.php';


$fac=new faculty();
$faculty=$fac->selectData();

if (Input::method()) {
    $res=new result();
    $res->insert();
}

ob_end_flush();
?>
<?php require_once 'includes/nav.php' ?>
<?php require_once 'includes/top-header.php' ?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title text-capitalize"><?= $page_title ?></h4>
                        <hr>
                    </div>
                    <div class="content table-responsive table-full-width">

                        <form method="post">
                            <div class="form-group">
                                <div class="col-md-4">
                                    <label>faculty</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="txtfaculty" required id="" class="form-control border-input">
                                        <option value="">Choose Faculty</option>
                                        <?php foreach ($faculty as $key => $data) { ?>
                                            <option value="<?= $data->id ?>"><?= $data->name ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4">
                                    <label>semester</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="txtsem" required id="" class="form-control border-input">
                                        <option value="">Choose Semester</option>
                                            <option value="1">1st sem</option>
                                            <option value="2">2nd sem</option>
                                            <option value="3">3rd sem</option>
                                            <option value="4">4th sem</option>
                                            <option value="5">5th sem</option>
                                            <option value="6">6th sem</option>
                                            <option value="7">7th sem</option>
                                            <option value="8">8th sem</option>
                                    </select>
                                </div>
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-info btn-fill btn-wd">publish result</button>
                            </div>
                        </form>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require_once 'includes/footer-panel.php' ?>
<?php require_once 'includes/footer.php' ?>
