    <div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="danger">

        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.devluk.com.au" class="simple-text">
                    devluk technologies
                </a>
            </div>

            <ul class="nav">
                <li class="<?php if ($title == "index") {
                    echo 'active';
                } ?>">
                    <a href="index.php">
                        <i class="fa fa-dashboard"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="<?php if ($title == "college") {
                    echo 'active';
                } ?>">
                    <a href="colleges.php">
                        <i class="fa fa-university"></i>
                        <p>colleges</p>
                    </a>
                </li>
                <li class="<?php if ($title == "faculty") {
                    echo 'active';
                } ?>">
                    <a href="faculty.php">
                        <i class="fa fa-book"></i>
                        <p>faculty</p>
                    </a>
                </li>
                <li class="<?php if ($title == "student") {
                    echo 'active';
                } ?>">
                    <a href="students.php">
                        <i class="fa fa-users"></i>
                        <p>student details</p>
                    </a>
                </li>

                <li class="<?php if ($title == "result") {
                    echo 'active';
                } ?>">
                    <a href="result.php">
                        <i class="fa fa-newspaper-o"></i>
                        <p>publish result</p>
                    </a>
                </li>


                <li>
                    <a href="logout.php">
                        <i class="fa fa-power-off"></i>
                        <p>logout</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>


    <div class="main-panel">