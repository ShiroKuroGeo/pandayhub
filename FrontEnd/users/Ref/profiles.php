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

        <section id="profilehub">
            <div class="container py-3" v-for="gt of getUserProfile">
                <div class="row">
                    <div class="col">
                        <nav aria-label="breadcrumb" class="head rounded-3 p-3 mb-4">
                            <ol class="breadcrumb mb-0">

                                <button class="btn btnEdit btn-md ms-auto fw-bold btn-primary text-dark" data-bs-toggle="modal" data-bs-target="#edit">Edit Profile</button>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="card mb-4 py-5">
                            <div class="card-body text-center">
                                <img :src="'/pandayhub/assets/img/' + gt.profile" alt="avatar" class="rounded-circle img-fluid" style="width: 160px;">
                                <h5 class="my-3">{{gt.lastname}}, {{gt.firstname}}</h5>
                                <p class="text-muted mb-1">{{gt.email}}</p>
                                <p class="text-muted mb-4">Joined at {{dateString(gt.create_at)}}</p>
                                <div class="d-flex justify-content-center mb-2">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Full Name</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{gt.lastname}}, {{gt.firstname}}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Email</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{gt.email}}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">User Types</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{gt.status == 1 ? 'User':'Admin'}}</p>
                                    </div>
                                </div>
                                <hr class="w">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Phone Number</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{gt.phoneNumber }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Phone Number 2</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{gt.phoneNumber2}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- modal -->
            <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                            <div class="form">
                                <h5 class="text-center">Profile</h5>
                                <div class="">
                                    <label for="Email" class="me-5 fw-bold">
                                        Profile Picture <br>
                                        <i class="bi bi-camera-fill text-primary" style="cursor: pointer; font-size: 60px" onclick="document.getElementById('cameraClickJob').click()"></i>
                                    </label>
                                    <input type="file" class="form-control-file rounded fw-bold visually-hidden" id="cameraClickJob" />
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mt-3">
                                            <label for="Email" class="me-5 fw-bold">First Name</label>
                                            <input type="text" class="form-control" v-model="firstname" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mt-3">
                                            <label for="Email" class="me-5 fw-bold">Last Name</label>
                                            <input type="text" class="form-control" v-model="lastname" />
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="Password" class="me-3 fw-bold">Email</label>
                                    <input type="email" class="form-control" v-model="email" />
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="Password" class="me-3 fw-bold">Phone Number 1</label>
                                    <input type="text" class="form-control" v-model="phn1" />
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="Password" class="me-3 fw-bold">Phone Number 2</label>
                                    <input type="text" class="form-control" v-model="phn2" />
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" @click="loginUser" data-bs-dismiss="modal" class="btn btn-primary mt-2 fw-bold" id="btn_login">Cancel</button>
                            <button type="button" @click="updateInformation" class="btn btn-primary mt-2 fw-bold" id="btn_login">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
    <script src="/pandayhub/BackEnd/middleware/user/profiles.js"></script>
</body>

</html>