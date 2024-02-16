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
    <div class="container-fluid bg-white p-0 vh-100" id="jobshub">
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <?php
        include('sidebar.php');
        ?>
        <div class="container-xxl py-5">
            <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
                <div class="container">
                    <div class="row g-2">
                        <div class="col-md-10">
                            <div class="row g-2">
                                <div class="col-12">
                                    <input type="search" class="form-control " placeholder="Search for location" v-model="searchLoc" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-dark border-0 w-100" disabled>Search</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Job Listing</h1>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="job-item p-4 mb-4 bg-dark text-primary" v-for="j of searchJob">
                                <div class="row g-4">
                                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid border rounded" :src="'/pandayhub/Assets/img/' + j.picture" alt="" style="width: 80px; height: 80px;">
                                        <div class="text-start ps-4">
                                            <h5 class="mb-3 text-primary">{{j.job_title}}</h5>
                                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{j.job_location}}</span>
                                            <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>{{j.job_payment}} {{j.job_project == 'Daily' ? 'Per Day': 'Amount'}} </span>
                                            <h6 class="text-truncate text-primary mt-2">Experience: {{j.job_require_exp}}</h6>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                        <div :class="j.job_poser != <?php echo $_SESSION['userId'] ?> ? 'd-flex mb-3' : 'd-flex mb-3 visually-hidden'">
                                            <button type="button" class="btn btn-primary text-dark" data-bs-toggle="modal" data-bs-target="#selectedJobsModal" @click="selectedJob(j.job_id)">Apply</button>
                                            <!-- <a class="btn btn-primary text-dark" @click="applyNow(j.job_poser, j.job_id)">Apply</a> -->
                                        </div>
                                        <div :class="j.job_poser == <?php echo $_SESSION['userId'] ?> ? 'd-flex mb-3' : 'd-flex mb-3 visually-hidden'">
                                            <button class="btn btn-primary text-dark" disabled>Apply</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="selectedJobsModal" tabindex="-1" aria-labelledby="selectedJobsModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content" v-for="sr of selectedIdJob">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="selectedJobsModalLabel">Apply</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="text-primary text-start">
                                            <div class="mb-3 mt-3">
                                                <label for="Email" class="me-5">Job Title</label>
                                                <input type="text" readonly class="form-control" :value="sr.job_title" />
                                            </div>
                                            <div class="mb-3 mt-3">
                                                <label for="Email" class="me-5">Location</label>
                                                <input type="text" readonly class="form-control" :value="sr.job_location" />
                                            </div>
                                            <div class="mb-3 mt-3">
                                                <label for="Password" class="me-3 fw-bold">Project Type</label>
                                                <select :value="sr.job_project" disabled class="form-control">
                                                    <option value="" selected hidden>Select Project Type</option>
                                                    <option value="Daily">Daily</option>
                                                    <option value="Pakyaw">Pakyaw</option>
                                                </select>
                                            </div>
                                            <div class="mb-3 mt-3">
                                                <label for="Password" class="me-3">Amount {{ job_project == 'Daily' ? 'Per Day' : job_project == 'Pakyaw' ? 'Pakyaw' : '' }}</label>
                                                <input type="text" readonly class="form-control" :value="sr.job_payment" />
                                            </div>
                                            <div class="mb-3 mt-3">
                                                <label for="Password" class="me-3">Experience</label>
                                                <textarea value="sr.job_require_exp" readonly class="form-control form-control-sm" cols="30" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary px-5" @click="applyNow(sr.job_poser, sr.job_id)">Apply</button>
                                    </div>
                                </div>
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
    <script src="/pandayhub/BackEnd/middleware/user/jobs.js"></script>
</body>

</html>