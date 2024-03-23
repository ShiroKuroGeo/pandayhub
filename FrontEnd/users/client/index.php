<!DOCTYPE html>
<html lang="en">
<?php
session_start();

if (!isset($_SESSION['userId'])) {
    header('location: ../../../index.php');
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
    <div class="container-fluid p-0 bg-white" id="jobshub">
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <img src="/pandayhub/assets/img/logo.png" class="img-fluid d-none d-sm-block" width="100" height="160">
        </div>
        <?php
            include('sidebar.php');
        ?>
        <div class="container-fluid p-0">
            <div class="position-relative">
                <div class="position-relative bg-primary">
                    <img class="w-100 vh-100 bg-primary" alt="">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8">
                                    <h1 class="display-3 text-white mb-4">GET YOUR <span class="text-primary">BUILDERS</span> NOW</h1>
                                    <p class="fs-5 fw-medium text-white mb-4 pb-2">The Contruction of is a testament to the hardwok and expertise of
                                        the team, resulting in a sturdy and visually and stunning structure</p>
                                    <button class="btn text-dark btn-primary px-5 py-2 rounded shadow" data-bs-toggle="modal" data-bs-target="#jobs">
                                        Post job
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row p-5 mt-5 ms-5 d-flex justify-content-evenly">
                    <h1 class="mb-5">Best Panday</h1>
                    <div class="col-lg-2 col-12 border mx-4 shadow bg-dark" v-for="j of bestPanday">
                        <img :src="'/pandayhub/assets/img/' + j.profile" class="card-img-top mt-3" height="150" width="150" alt="...">
                        <div class="card-body text-primary">
                            <h5 class="card-title text-primary text-capitalize">{{j.fullname}}</h5>
                            <p class="card-text text-capitalize">{{j.email}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="p-4 text-center">
            <div class="d-flex justify-content-between align-items-between">
                <h5>
                    James Michael Guevarra
                </h5>
                <h5>
                    Jovet Quillan
                </h5>
                <h5>
                    Jose Jefff Juma-as
                </h5>
            </div>
        </footer>
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