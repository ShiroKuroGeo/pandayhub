<!DOCTYPE html>
<html lang="en">
<?php
session_start();

if (!isset($_SESSION['userId'])) {
    header('location:./index.php');
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
    <div class="container-fluid bg-white p-0" id="postHub">
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <?php
        include('sidebar.php');
        ?>
        <div class="container-xxl py-5">
            <div class="container">
                <div :class="pandaysLength < 1 ? 'visually-hidden mb-5' : 'mb-5'">
                    <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">My Post</h1>
                    <div class="row g-4">
                        <div class="col-lg-4 col-sm-6 wow fadeInUp text-capitalize" v-for="p of pandays" data-wow-delay="0.1s">
                            <div class="cat-item rounded p-4" href="#">
                                <img :src="'/pandayhub/assets/img/'+p.profile" style="width: 150px; height: 150px" class="rounded p-3" alt="">
                                <h6 class="mb-3">{{p.lastname}}, {{p.firstname}}</h6>
                                <h6 class="mb-3">My Level: {{p.level}}</h6>
                                <h6 class="mb-3">My Skills: {{p.skill}}</h6>
                                <h6 class="mb-3">My Location: {{p.location}}</h6>
                                <p class="mb-0">
                                    <button class="btn btn-sm me-2 col-2 btn-primary" data-bs-toggle="modal" @click="getId(p.id)" data-bs-target="#deletePanday">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                    <button class="btn btn-sm me-2 col-2 btn-primary" data-bs-toggle="modal" @click="getAllSelectedPanday(p.id)" data-bs-target="#updatePanday">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="deletePanday" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure want to delete this info?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                <button type="button" class="btn btn-primary" @click="deletepanday(id)">Yes</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="deleteJob" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure want to delete this Job?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                <button type="button" class="btn btn-primary" @click="deletejob(id)">Yes</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="updatePanday" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">View this Info</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" v-for="p of selectedPanday">

                                <img :src="'/pandayhub/assets/img/'+p.profile" style="width: 250px; height: 250px" class="rounded mb-4" alt=""><br>
                                <span class="fw-bold"> Name: </span> {{p.firstname}}, {{p.lastname}}<br>
                                <span class="fw-bold"> Location: </span> {{p.location}} <br>
                                <span class="fw-bold"> Level: </span> {{p.level}} <br>
                                <span class="fw-bold"> Skills: </span> {{p.skill}} <br>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Okay</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="updateJob" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">View Job Description</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" v-for="p of selectedJob">
                                <img :src="'/pandayhub/assets/img/'+p.image" style="width: 250px; height: 250px" class="rounded p-3" alt=""><br>
                                <span class="fw-bold">Title: </span>{{p.title}}<br>
                                <span class="fw-bold">Job Project:</span>{{p.job_project}}<br>
                                <span class="fw-bold">Job Location: </span>{{p.job_location}}<br>
                                <span class="fw-bold">Job Experience Needs: </span>{{p.job_require_exp}}<br>
                                <span class="fw-bold">Job Project Type: </span>{{p.projectType}}<br>
                                <span class="fw-bold">Job Payment: </span>{{p.job_payment}}<br>
                                <span class="fw-bold">Created: </span>{{dateString(p.created_at)}}<br>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Okay</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
    <script src="/pandayhub/BackEnd/middleware/user/post.js"></script>
</body>

</html>