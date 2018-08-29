
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar bar1"></span>
                    <span class="icon-bar bar2"></span>
                    <span class="icon-bar bar3"></span>
                </button>
                <a class="navbar-brand text-capitalize"><?= $page_title ?></a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-user"></i>
                            <p class="text-capitalize">my account</p>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu text-capitalize">
                            <li><a href="change-password.php">change password</a></li>
                            <li><a href="logout.php">logout</a></li>
                        </ul>
                    </li>
                </ul>

            </div>
        </div>
    </nav>