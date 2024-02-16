<!DOCTYPE html>
<html lang="en">
<?php
session_start();

if (!isset($_SESSION['userId'])) {
    header('location:./index.php');
}

if ($_GET['id'] == $_SESSION['userId']) {
    header('location: chats.php');
}
?>

<head>
    <meta charset="utf-8">
    <title>PandayHub</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="../../../Assets/assets/lib/animate/animate.min.css" rel="stylesheet">
    <link href="../../../Assets/assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../../../Assets/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../Assets/assets/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid overflow-hidden bg-white vh-100" id="chatHub">
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <img src="/pandayhub/assets/img/logo.png" class="img-fluid d-none d-sm-block" width="100" height="160">
        </div>
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
                            <li><a class="dropdown-item" href="../../../BackEnd/logout.php" id="logout">Logout</a></li>
                        </div>
                    </div>
                </div>
                <a href="" data-bs-toggle="modal" data-bs-target="#jobs" class="<?php echo $_SERVER['SCRIPT_NAME'] == '/pandayhub/FrontEnd/users/jobs.php' ? 'btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block text-dark' : 'btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block visually-hidden text-dark' ?> ">Post A Job<i class="fa fa-arrow-right ms-3"></i></a>
                <a href="" data-bs-toggle="modal" data-bs-target="#pandays" class="<?php echo $_SERVER['SCRIPT_NAME'] == '/pandayhub/FrontEnd/users/pandays.php' ? 'btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block text-dark' : 'btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block visually-hidden text-dark' ?>">Post Panday<i class="fa fa-arrow-right ms-3"></i></a>
            </div>
        </nav>
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
        <div class="container-xxl py-5">
            <section>
                <div class="container py-2">

                    <div class="row d-flex justify-content-center">
                        <div class="col-md-8 col-lg-6 col-xl-4">
                            <div class="card" id="chat1" style="border-radius: 15px;">
                                <div class="card-header d-flex justify-content-between align-items-center p-3 bg-info text-white border-bottom-0" style="border-top-left-radius: 15px; border-top-right-radius: 15px;">
                                    <a href="chats.php" class="text-white"><i class="fas fa-angle-left"></i></a>
                                    <p class="mb-0 fw-bold">{{fullname}}</p>
                                    <a href="chats.php" class="text-white"><i class="fas fa-times"></i></a>
                                </div>
                                <div class="card-body">
                                    <div class="chats overflow-auto" style="height: 250px;">
                                        <div v-for="a of allMessage" :class="a.sender != <?php echo $_SESSION['userId'] ?> ? 'd-flex flex-row justify-content-start mb-4' : 'd-flex flex-row justify-content-end mb-4'">
                                            <div v-if="a.sender == <?php echo $_SESSION['userId'] ?>" class="d-flex">
                                                <div class="p-3 me-3 border" style="border-radius: 15px; background-color: #fbfbfb;">
                                                    <p class="small mb-0">{{a.message}}</p>
                                                </div>
                                                <img :src="'/pandayhub/assets/img/'+a.sendPic" class="rounded-circle me-2" alt="avatar 1" style="width: 45px; height: 100%;">
                                            </div>
                                            <div v-if="a.sender != <?php echo $_SESSION['userId'] ?>" class="d-flex">
                                                <img :src="'/pandayhub/assets/img/'+a.sendPic" class="rounded-circle me-2" alt="avatar 1" style="width: 45px; height: 100%;">
                                                <div class="p-3 me-3 border" style="border-radius: 15px; background-color: #fbfbfb;">
                                                    <p class="small mb-0">{{a.message}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-outline mt-3">
                                        <textarea class="form-control" id="textAreaExample" rows="4" v-model="message" placeholder="Test your Messages"></textarea>
                                        <button class="btn btn-sm btn-primary mt-3 px-4" @click="thisId">Send</button>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </section>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../../Assets/assets/lib/wow/wow.min.js"></script>
    <script src="../../../Assets/assets/lib/easing/easing.min.js"></script>
    <script src="../../../Assets/assets/lib/waypoints/waypoints.min.js"></script>
    <script src="../../../Assets/assets/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../../../Assets/assets/js/main.js"></script>
    <script src="/pandayhub/BackEnd/vue/axios.js"></script>
    <script src="/pandayhub/BackEnd/vue/vue.3.js"></script>
    <script src="../../../BackEnd/middleware/chat.js"></script>
</body>

</html>