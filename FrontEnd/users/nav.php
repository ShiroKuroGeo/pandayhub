<?php
    $link = "/pandayhub/frontend/users/pandays.php";
?>
<!-- navbar -->
<nav class="navbarHeight navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
        <a href="#" class="navbar-brand"><img src="/pandayhub/assets/img/logo.png" alt="" height="60" width="80"></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="navmenu">
            <ul class="navbar-nav">
                <li class="nav-item <?php echo $_SERVER['SCRIPT_NAME'] == '/pandayhub/frontend/users/index.php' ? 'fw-bold' : '' ?>">
                    <a href="/pandayhub/frontend/users/index.php" class="nav-link">HOME</a>
                </li>
                <li class="nav-item <?php echo $_SERVER['SCRIPT_NAME'] == '/pandayhub/frontend/users/jobs.php' ? 'fw-bold' : '' ?>">
                    <a href="/pandayhub/frontend/users/jobs.php" class="nav-link">FIND JOB</a>
                </li>
                <li class="nav-item <?php echo $_SERVER['SCRIPT_NAME'] == '/pandayhub/frontend/users/pandays.php' ? 'fw-bold' : '' ?>">
                    <a href="/pandayhub/frontend/users/pandays.php" class="nav-link">FIND PANDAY</a>
                </li>
                <li class="nav-item <?php echo $_SERVER['SCRIPT_NAME'] == '/pandayhub/frontend/users/chats.php' ? 'fw-bold' : '' ?>">
                    <a href="/pandayhub/frontend/users/chats.php" class="nav-link">CHATS</a>
                </li>
                <li class="nav-item <?php echo $_SERVER['SCRIPT_NAME'] == '/pandayhub/frontend/users/applications.php' ? 'fw-bold' : '' ?>">
                    <a href="/pandayhub/frontend/users/applications.php" class="nav-link">APPLICATIONS</a>
                </li>
                <li class="dropdown">
                    <a class="btn dropdown-toggle mt-1 btn-sm fw-bold ms-5" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        Logout
                    </a>
                    <ul class="dropdown-menu me-5" aria-labelledby="dropdownMenuLink">
                        <li><a class="cursor dropdown-item me-5" href="../../BackEnd/logout.php" id="logout">Logout</a></li>
                        <li><a class="cursor dropdown-item me-5 " href="/pandayhub/FrontEnd/users/profiles.php" id="post">Profile</a></li>
                        <li><a class="cursor dropdown-item me-5 " id="request">Posts</a></li>
                    </ul>
                </li>
            </ul>
        </div>

    </div>
</nav>