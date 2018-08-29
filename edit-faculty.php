<?php
ob_start();
if (!isset($_SESSION)) {
    session_start();
}
?>

<?php
require_once 'includes/header.php';

$page_title = "update faculty details";
$title = "faculty";

include_once 'autoload/Autoload.php';
require_once 'lib/security.php';

$fac = new faculty();
if (isset($_GET['fid'])) {
    $id = $_GET['fid'];
    $faculty = $fac->selectData($id);
}

if (Input::method()) {
    $fac->update();
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
                                    <input type="text" name="txtname" required class="form-control border-input"
                                           value="<?= $faculty->name ?>">
                                </div>
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-info btn-fill btn-wd">update faculty</button>
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
