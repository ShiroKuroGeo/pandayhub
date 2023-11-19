<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/9a0808c715.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">
    <link rel="stylesheet" href="/pandayhub/assets/css/Profiles.css">
</head>

<body>

    <section id="profilehub">
        <div class="container py-3" v-for="gt of getUserProfile">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="head rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a class="nav-link active fs-5" href="/pandayhub/frontend/users/index.php"><i class="fa fa-home fs-4"></i>Home</a></li>
                            <button class="btn btnEdit btn-sm ms-auto fw-bold" data-bs-toggle="modal" data-bs-target="#edit">Edit Profile</button>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4 py-5">
                        <div class="card-body text-center">
                            <img :src="'/pandayhub/assets/img/' + gt.profile"  alt="avatar" class="rounded-circle img-fluid" style="width: 160px;">
                            <h5 class="my-3">{{gt.lastname}}, {{gt.firstname}}</h5>
                            <p class="text-muted mb-1">{{gt.email}}</p>
                            <p class="text-muted mb-4">Joined at {{gt.create_at}}</p>
                            <div class="d-flex justify-content-center mb-2">
                                <button type="button" class="btn btnMessage ms-1 fw-bold">Message</button>
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
                                    <p class="text-muted mb-0">{{gt.phoneNumber == null ? 'gt.phoneNumber' : 'None'}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Phone Number 2</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{gt.phoneNumber2 == null ? 'gt.phoneNumber2' : 'None'}}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- modal -->
        <div class="modal fade mt-1" id="edit">
            <div class="modal-dialog d-flex modal-dialog-center">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                        <div class="myform">
                            <h1 class="reg text-center">Profile</h1>
                            <div class="mb-2 mt-3">
                                <label for="Email" class="me-5 fw-bold">
                                    Profile Picture <br>
                                    <i class="fas fa-camera-retro fa-3x" style="color: white; cursor: pointer" onclick="document.getElementById('cameraClickJob').click()"></i>
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
                            <div class="btn-form">
                                <button type="button" @click="loginUser" data-bs-dismiss="modal" class="btn3 mt-2 fw-bold" id="btn_login">Cancel</button>
                                <button type="button" @click="updateInformation" class="btn3 mt-2 fw-bold" id="btn_login">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
</body>
<script src="/pandayhub/BackEnd/vue/axios.js"></script>
<script src="/pandayhub/BackEnd/vue/vue.3.js"></script>
<script src="/pandayhub/BackEnd/middleware/user/profiles.js"></script>

</html>