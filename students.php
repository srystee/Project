<?php
ob_start();
session_start();
require_once 'includes/header.php';
$page_title = "student details";
$title = "student";
include_once 'autoload/Autoload.php';
require_once 'lib/security.php';

$std = new students();
$student = $std->selectData();

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
                            List of <?= $page_title ?>
                            <a href="add-student.php" class="btn btn-primary text-uppercase">add student</a>
                        </h4>
                        <hr>
                    </div>
                    <div class="content table-responsive table-full-width">

                        <table class="table table-striped" id="myTable">
                            <thead>
                            <tr class="text-capitalize">
                                <th>ID</th>
                                <th>name</th>
                                <th>contact</th>
                                <th>college</th>
                                <th>faculty</th>
                                <th>batch</th>
                                <th>regd number</th>
                                <th>symbol</th>
                                <th>action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($student as $key => $data) { ?>
                                <tr>
                                    <td><?= $data->id ?></td>
                                    <td class="text-capitalize"><?= $data->student_name ?></td>
                                    <td><?= $data->contact ?></td>
                                    <td class="text-capitalize"><?= $data->college_name ?></td>
                                    <td><?= $data->faculty_name ?></td>
                                    <td><?= $data->batch ?></td>
                                    <td><?= $data->regd_number ?></td>
                                    <td><?= $data->symbol_number ?></td>
                                    <td>
                                        <a href="edit-college.php?cid=<?= $data->id ?>" class="font-icon"><i
                                                    class="fa fa-edit"></i></a>
                                        <a href="edit-college.php?cid=<?= $data->id ?>" class="font-icon color-green"><i
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
