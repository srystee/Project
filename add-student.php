<?php
ob_start();
if (!isset($_SESSION)) {
    session_start();
}

require_once 'includes/header.php';

$page_title = "add student details";
$title = "student";

include_once 'autoload/Autoload.php';
require_once 'lib/security.php';

if (Input::method()) {
    $std = new students();
    $std->insert();
}

$clg = new colleges();
$college = $clg->selectData();

$fac=new faculty();
$faculty=$fac->selectData();

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
                                    <label>name</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="txtname" required class="form-control border-input"
                                           value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <label>address</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="txtadd" required class="form-control border-input"
                                           value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <label>contact</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="txtcontact" required class="form-control border-input"
                                           value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <label>email</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="email" name="txtemail" class="form-control border-input"
                                           value="">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4">
                                    <label>college</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="txtcollege" required id="" class="form-control border-input">
                                        <option value="">Choose College</option>
                                        <?php foreach ($college as $key => $data) { ?>
                                            <option value="<?= $data->id ?>"><?= $data->name ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4">
                                    <label>faculty</label>
                                </div>
                                <div class="col-md-8">
                                    <select name="txtfaculty" required id="" class="form-control border-input">
                                        <option value="">Choose Faculty</option>
                                        <?php foreach ($faculty as $key => $fac_data) { ?>
                                            <option value="<?= $fac_data->id ?>"><?= $fac_data->name ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4">
                                    <label>batch</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="txtbatch" required class="form-control border-input"
                                           value="">
                                </div>
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-info btn-fill btn-wd">add student</button>
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
