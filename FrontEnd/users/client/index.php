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
            <img src="/pandayhub/assets/img/logo.png" class="img-fluid d-none d-sm-block" width="100" height="160">
        </div>
        <?php
        include('sidebar.php');
        ?>


        <div class="container-fluid p-0">
            <div class=" position-relative">
                <div class=" position-relative">
                    <img class="img-fluid w-100 vh-100 bg-primary" alt="">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8">
                                    <h1 class="display-3 text-white mb-4">GET YOUR <span class="text-primary">BUILDERS</span> NOW</h1>
                                    <p class="fs-5 fw-medium text-white mb-4 pb-2">The Contruction of is a testament to the hardwok and expertise of
                                        the team, resulting in a sturdy and visually and stunning structure</p>
                                    <button class="btn btn-primary btn-primary px-5 py-2 rounded shadow" data-bs-toggle="modal" data-bs-target="#jobs">
                                        Post job
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row mt-5 ms-5">
                    <div class="col-3 bg-primary mt-5 ms-5 me-5">
                        <div class="wrap mt-2 justify-content-center text-center">
                            <img src="/pandayhub/assets/img/copecod.webp" alt="" height="300" width="350">
                            <h1 class="text-primary">COPECOD</h1>
                            <p class="text-primary">A Cape Cod house is a low, broad, single or double-story frame building with a moderately-steep-pitched gabled roof,
                                a large central chimney, and very little ornamentation.</p>
                        </div>
                    </div>

                    <div class="col-3 bg-primary mt-5 ms-5 me-5">
                        <div class="wrap mt-2 justify-content-center text-center">
                            <img src="/pandayhub/assets/img/cabin.jpg" alt="" height="300" width="350">
                            <h1 class="text-primary">CABIN</h1>
                            <p class="text-primary">A cabin house today is that and more. The key difference between the two remains the location.
                                A cabin house is always constructed in a lesser populated area with minimum intervention.</p>
                        </div>
                    </div>

                    <div class="col-3 mt-5 bg-primary ms-5">
                        <div class="wrap mt-2 justify-content-center text-center">
                            <img src="/pandayhub/assets/img/colonial.jpeg" alt="" height="300" width="350">
                            <h1 class="text-primary">COLONIAL</h1>
                            <p class="text-primary">Colonial home is an architectural style that can be found in neighborhoods all across the United States. From California to the Carolinas,
                                different iterations of these homes still capture the eye of buyers.</p>
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