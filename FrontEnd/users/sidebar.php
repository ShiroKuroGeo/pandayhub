<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="index.php" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
        <h1 class="m-0 text-primary">
            <img src="/pandayhub/assets/img/logo.png" class="img-fluid d-none d-sm-block" width="100" height="160">
        </h1>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">

            <a href="index.php" class="<?php echo $_SERVER['SCRIPT_NAME'] == '/pandayhub/frontend/users/index.php' ? 'nav-item nav-link active' : 'nav-item nav-link' ?>">Home</a>
            <a href="jobs.php" class="<?php echo $_SERVER['SCRIPT_NAME'] == '/pandayhub/frontend/users/jobs.php' ? 'nav-item nav-link active' : 'nav-item nav-link' ?>">Jobs</a>
            <a href="pandays.php" class="<?php echo $_SERVER['SCRIPT_NAME'] == '/pandayhub/frontend/users/pandays.php' ? 'nav-item nav-link active' : 'nav-item nav-link' ?>">Panday</a>
            <a href="applications.php" class="<?php echo $_SERVER['SCRIPT_NAME'] == '/pandayhub/frontend/users/applicants.php' ? 'nav-item nav-link active' : 'nav-item nav-link' ?>">Applicant</a>
            <a href="hireds.php" class="<?php echo $_SERVER['SCRIPT_NAME'] == '/pandayhub/frontend/users/hireds.php' ? 'nav-item nav-link active' : 'nav-item nav-link' ?>">Hire</a>
            <div class="nav-item dropstart">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Jovet</a>
                <div class="dropdown-menu rounded-0 m-0">
                    <li><a class="dropdown-item " href="/pandayhub/FrontEnd/users/profiles.php" id="post">Profile</a></li>
                    <li><a class="dropdown-item " href="/pandayhub/FrontEnd/users/chats.php" id="post">Messages</a></li>
                    <li><a class="dropdown-item " href="/pandayhub/FrontEnd/users/post.php" id="post">My Post</a></li>
                    <li><a class="dropdown-item" href="../../BackEnd/logout.php" id="logout">Logout</a></li>
                </div>
            </div>
        </div>
        <a href="" data-bs-toggle="modal" data-bs-target="#jobs" class="<?php echo $_SERVER['SCRIPT_NAME'] == '/pandayhub/FrontEnd/users/jobs.php' ? 'btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block text-dark' : 'btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block visually-hidden text-dark' ?> ">Post A Job<i class="fa fa-arrow-right ms-3"></i></a>
        <a href="" data-bs-toggle="modal" data-bs-target="#pandays" class="<?php echo $_SERVER['SCRIPT_NAME'] == '/pandayhub/FrontEnd/users/pandays.php' ? 'btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block text-dark' : 'btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block visually-hidden text-dark' ?>">Post Panday<i class="fa fa-arrow-right ms-3"></i></a>
    </div>
</nav>
<div class="container-fluid p-0">
    <div class=" position-relative">
        <div class=" position-relative">
            <img class="img-fluid w-100 vh-100 bg-dark" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(43, 57, 64, .5);">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-10 col-lg-8">
                            <h1 class="display-3 text-white mb-4">GET YOUR <span class="text-primary">BUILDERS</span> NOW</h1>
                            <p class="fs-5 fw-medium text-white mb-4 pb-2">The  Contruction of is a testament to the hardwok and expertise of 
                            the team, resulting in a sturdy and visually and stunning structure</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade mt-1" id="jobs">
    <div class="modal-dialog d-flex modal-dialog-center">
        <div class="modal-content" style="background-color: #2C2727">
            <div class="modal-body">
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                <div class="text-primary">
                    <h1 class="text-primary text-center">Job FORM</h1>
                    <div class="mb-2 mt-3">
                        <label for="Email" class="me-5 fw-bold">
                            Add Picture <br>
                            <i class="fas fa-camera-retro fa-3x text-primary" style="color: white; cursor: pointer" onclick="document.getElementById('cameraClickJob').click()"></i>
                        </label>
                        <input type="file" class="form-control-file rounded fw-bold visually-hidden" name="file" id="cameraClickJob" />
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="Email" class="me-5">Job Title</label>
                        <input type="text" class="form-control" v-model="job_title" />
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="Email" class="me-5">Location</label>
                        <input type="text" class="form-control" v-model="job_location" />
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="Password" class="me-3 fw-bold">Project Type</label>
                        <select v-model="job_project" class="form-control">
                            <option value="" selected hidden>Select Project Type</option>
                            <option value="Daily">Daily</option>
                            <option value="Pakyaw">Pakyaw</option>
                        </select>
                        <!-- <label for="Email" class="me-5">Project Type</label>
                        <input type="text" class="form-control" v-model="job_project" /> -->
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="Password" class="me-3">Payments</label>
                        <input type="text" class="form-control" v-model="job_payment" />
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="Password" class="me-3">Experience</label>
                        <textarea v-model="job_require_exp" class="form-control form-control-sm" cols="30" rows="3"></textarea>
                    </div>
                    <div class="footer">
                        <button type="button" @click="loginUser" data-bs-dismiss="modal" class="btn btn-primary mt-2 fw-bold" id="btn_login">Cancel</button>
                        <button type="button" @click="storeJobs" class="btn btn-primary mt-2 fw-bold ms-3" id="btn_login">Post</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade mt-5" id="pandays">
    <div class="modal-dialog d-flex modal-dialog-center">
        <div class="modal-content" style="background-color: #2C2727">
            <div class="modal-body text-primary">
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                <div class="myform">
                    <h1 class="reg text-center text-primary">Panday Form</h1>

                    <div class="mb-3 mt-3">
                        <label for="Email" class="me-5 fw-bold">Panday Skill</label>
                        <input type="text" v-model="Panday_skill" class="form-control" />
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="Email" class="me-5 fw-bold">Panday Location</label>
                        <input type="text" v-model="Panday_location" class="form-control" />
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="Password" class="me-3 fw-bold">Project Type</label>
                        <select v-model="Panday_level" class="form-control">
                            <option value="" selected hidden>Select Project Type</option>
                            <option value="Daily">Daily</option>
                            <option value="Pakyaw">Pakyaw</option>
                        </select>
                    </div>
                    <div class="btn-form ms-auto">
                        <button type="button" class="btn btn-primary text-dark mt-2 fw-bold" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary text-dark mt-2 fw-bold ms-3" @click="storePanday">Post</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>