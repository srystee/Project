<?php
ob_start();
session_start();
require_once 'includes/header.php';
$page_title = "result notice board";
$title = "result";
include_once 'autoload/Autoload.php';
require_once 'lib/security.php';

$res=new result();
$result=$res->selectData();

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
                        <h4 class="title text-capitalize">
                            <?= $page_title ?>
                            <a href="publish-result.php" class="btn btn-primary text-uppercase">publish result</a>
                        </h4>
                        <hr>
                    </div>
                    <div class="content table-responsive table-full-width">

                        <table class="table table-striped" id="myTable">
                            <thead>
                            <tr class="text-capitalize">
                                <th>ID</th>
                                <th>faculty</th>
                                <th>semester</th>
                                <th>action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($result as $key => $data) { ?>
                                <tr>
                                    <td><?= ++$key ?></td>
                                    <td><?= $data->name ?></td>
                                    <td class="text-capitalize"><?= $data->semester ?></td>
                                    <td>
                                        <a href="DeleteData.php?rid=<?= $data->id ?>" class="font-icon color-green"><i
                                                    class="fa fa-remove"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require_once 'includes/footer-panel.php' ?>
<?php require_once 'includes/footer.php' ?>
