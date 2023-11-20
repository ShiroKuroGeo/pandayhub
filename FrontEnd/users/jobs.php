<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/9a0808c715.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">
    <link rel="stylesheet" href="/pandayhub/assets/css/jobs.css">
</head>

<body>
    <div id="jobshub">

        <?php
        include('nav.php')
        ?>

        <section class="head text-light p-5 p-lg-0 pt-lg-5 text-center text-sm-start">
            <div class="container">
                <div class="d-sm-flex justify-content-between">
                    <div class="mt-5" style="max-width: 550px;">
                        <h1 class="pt-3 mt-5">GET YOUR <span class="builders fw-bold">BUILDERS </span>NOW</h1>
                        <p class="lead my-4 mb-4 fw-bold">
                            The Contruction of is a testament to the hardwok and expertise of the team, resulting in a sturdy and visually and stunning structure
                        </p>
                        <button class="btn2 btn-sm fw-bold mb-5" type="button" data-bs-toggle="modal" data-bs-target="#jobs">ADD YOURS NOW</button>
                    </div>
                    <img src="/pandayhub/assets/img/secondary.png" class="img-fluid d-none d-sm-block mt-5" width="400" height="360">
                </div>
            </div>
        </section>


        <!-- modal -->
        <div class="modal fade mt-1" id="jobs">
            <div class="modal-dialog d-flex modal-dialog-center">
                <div class="modal-content" style="background-color: #2C2727">
                    <div class="modal-body">
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                        <div class="myform">
                            <h1 class="reg text-center">Panday FORM</h1>
                            <div class="mb-2 mt-3">
                                <label for="Email" class="me-5 fw-bold">
                                    Add Picture <br>
                                    <i class="fas fa-camera-retro fa-3x" style="color: white; cursor: pointer" onclick="document.getElementById('cameraClickJob').click()"></i>
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
                                <label for="Email" class="me-5">Project Type</label>
                                <input type="text" class="form-control" v-model="job_project" />
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="Password" class="me-3">Payments</label>
                                <input type="text" class="form-control" v-model="job_payment" />
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="Password" class="me-3">Experience</label>
                                <textarea v-model="job_require_exp" class="form-control form-control-sm" cols="30" rows="3"></textarea>
                            </div>
                            <div class="btn-form ms-auto">
                                <button type="button" @click="loginUser" data-bs-dismiss="modal" class="btn3 mt-2 fw-bold" id="btn_login">Cancel</button>
                                <button type="button" @click="storeJobs" class="btn3 mt-2 fw-bold ms-3" id="btn_login">Post</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- profiling -->
        <section style="overflow-y: scroll; height: 90vh">
            <div class="container-fluid my-3">
                <div class="row">

                    <div class="col-3 mb-3" v-for="j of getJobs">
                        <div class="card" style="width: 22rem;">
                            <img :src="'/pandayhub/Assets/img/' + j.picture" class="" height="250" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{j.job_title}}</h5>
                                <p class="card-text">This project is {{j.job_project}}</p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">{{j.job_location}}</li>
                                <li class="list-group-item">{{j.job_require_exp}}</li>
                                <li class="list-group-item">{{j.job_payment}}</li>
                            </ul>
                            <div :class="j.job_poser === <?php echo $_SESSION['userId']?> ? 'card-footer d-flex justify-content-between' : 'card-footer visually-hidden d-flex justify-content-between'">
                                <button class="btn btn-md col-12" @click="selectedJob(j.job_id)" data-bs-toggle="modal" data-bs-target="#viewMore">View More</button>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="viewMore" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="card text-center" v-for="j of selectedIdJob">
                                        <div class="card-header">
                                            {{j.job_title}}
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">This project is {{j.job_project}}</h5>
                                            <p class="card-text">Location: {{j.job_location}}</p>
                                            <div class="card-link">Payments: {{j.job_payment}}</div>
                                            <div class="card-link">Requirement: {{j.job_require_exp}}</div>
                                        </div>
                                        <div :class="j.job_poser === <?php echo $_SESSION['userId']?> ? 'card-footer' : 'card-footer visually-hidden'" >
                                            <button class="btn btn-md" @click="applyNow(j.job_poser)">Apply Now</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <!-- footer -->
        <footer class="footer text-center text-lg-start mt-5">
            <!-- Copyright -->
            <div class="container-fluid">
                <div class="row">
                    <div class="text-center p-3 col-md-2" style="background-color: rgba(0, 0, 0, 0.2);">
                        <p><a href="" class="f-text fw-bold">James Michael Guevarra</a></p>
                    </div>
                    <div class="text-center p-3 col-md-8" style="background-color: rgba(0, 0, 0, 0.2);">
                        <p><a href="" class="f-text fw-bold">Jovet Quillan</a></p>
                    </div>
                    <div class="text-center p-3 col-md-2" style="background-color: rgba(0, 0, 0, 0.2);">
                        <p><a href="" class="f-text fw-bold">Jose Jeff Jumao-as</a></p>
                    </div>
                </div>
            </div>
            <!-- Copyright -->
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
</body>
<script src="/pandayhub/BackEnd/vue/axios.js"></script>
<script src="/pandayhub/BackEnd/vue/vue.3.js"></script>
<script src="/pandayhub/BackEnd/middleware/user/jobs.js"></script>

</html>