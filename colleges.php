<?php
ob_start();
session_start();
require_once 'includes/header.php';
$page_title = "college details";
$title = "college";
include_once 'autoload/Autoload.php';
require_once 'lib/security.php';

$clg=new colleges();
$college=$clg->selectData();

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
                            List of TU affiliate <?= $page_title ?>
                            <a href="add-college.php" class="btn btn-primary text-uppercase">add college</a>
                        </h4>
                        <hr>
                    </div>
                    <div class="content table-responsive table-full-width">

                        <table class="table table-striped" id="myTable">
                            <thead>
                            <tr class="text-capitalize">
                                <th>ID</th>
                                <th>name</th>
                                <th>action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($college as $key => $data) { ?>
                                <tr>
                                    <td><?= ++$key ?></td>
                                    <td class="text-capitalize"><?= $data->name ?></td>
                                    <td>
                                        <a href="edit-college.php?cid=<?= $data->id ?>" class="font-icon"><i
                                                    class="fa fa-edit"></i></a>
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
