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
    <div class="container-fluid bg-white p-0 vh-100" id="hiredshub">
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
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Notification</h1>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                    <div class="tab-content">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Profile</th>
                                    <th scope="col">Panday Name</th>
                                    <th scope="col">Panday Email</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(j, index) of hireds" :class="j.appstats == 1 ? 'bg-info text-white': j.appstats == 2 ? 'bg-primary text-white' : 'bg-danger text-white'">
                                    <th scope="row">{{1+index++}}</th>
                                    <td>
                                        <img :src="'/pandayhub/Assets/img/'+ j.profile" alt="" style="width: 45px; height: 45px" class="rounded-circle" />
                                    </td>
                                    <td>
                                        {{j.lastname}} {{j.firstname}}
                                    </td>
                                    <td>
                                        {{j.email}}
                                    </td>
                                    <td>
                                        {{j.appstats == 1 ? 'Pending': j.appstats == 2 ? 'Hired' : 'Decline'}}
                                    </td>
                                    <td>
                                        <a :href="'chatroom.php?id='+j.appli_id" class="btn btn-md me-2 btn-primary text-dark rounded-circle">
                                            <i class="bi bi-chat-dots col-2"></i>
                                        </a>
                                        <button class="btn btn-md me-2 btn-warning text-dark rounded-circle" data-bs-toggle="modal" data-bs-target="#reportUser" @click="getId(j.appli_id)">
                                            <i class="bi bi-exclamation-circle"></i>
                                        </button>
                                        <button class="btn btn-md me-2 btn-danger text-dark rounded-circle" data-bs-toggle="modal" data-bs-target="#declineUser" @click="getId(j.appli_id)">
                                            <i class="bi bi-hand-thumbs-down"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal fade" id="declineUser" tabindex="-1" aria-labelledby="reportUserLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="reportUserLabel">Decline User</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-start">
                                    Are you sure want to report this user?
                                    Reason:
                                    <textarea v-model="reasonOfReport" class="form-control" cols="30" rows="5"></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" @click="decline(id)">Decline</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="reportUser" tabindex="-1" aria-labelledby="reportUserLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="reportUserLabel">Report User</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-start">
                                    Are you sure want to report this user?
                                    Reason:
                                    <textarea v-model="reasonOfReport" class="form-control" cols="30" rows="5"></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" @click="reportUsers(id)">Report</button>
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
    <script src="/pandayhub/BackEnd/middleware/user/hireds.js"></script>
</body>

</html>