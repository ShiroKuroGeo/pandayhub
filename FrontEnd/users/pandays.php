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
    <link rel="stylesheet" href="/pandayhub/assets/css/pandays.css">
</head>

<body>
    <div id="petStore">

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
                        <button class="btn2 btn-sm fw-bold mb-5" type="button" data-bs-toggle="modal" data-bs-target="#pandays">ADD YOURS NOW</button>
                    </div>
                    <img src="/pandayhub/assets/img/secondary.png" class="img-fluid d-none d-sm-block mt-5" width="400" height="360">
                </div>
            </div>
        </section>

        <!-- modal -->
        <div class="modal fade mt-5" id="pandays">
            <div class="modal-dialog d-flex modal-dialog-center">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                        <div class="myform">
                            <h1 class="reg text-center">CLIENT FORM</h1>
                            
                            <div class="mb-3 mt-3">
                                <label for="Email" class="me-5 fw-bold">Panday Skill</label>
                                <input type="Email" v-model="Panday_skill" class="form-control" />
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="Email" class="me-5 fw-bold">Panday Location</label>
                                <input type="Email" v-model="Panday_location" class="form-control" />
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="Password" class="me-3 fw-bold">Panday Level</label>
                                <input type="password" v-model="Panday_level" class="form-control" />
                            </div>
                            <div class="btn-form ms-auto">
                                <button type="button" class="btn3 mt-2 fw-bold" data-bs-dismiss="modal">Cancel</button>
                                <button type="button" class="btn3 mt-2 fw-bold ms-3" @click="storePanday">Post</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

         <!-- profiling -->
        <section style="overflow-y: scroll; height: 90vh" >
            <div class="container-fluid my-3">
                <div class="row d-flex px-3">

                    <div class="jobs col-4 me-2 mb-1 rounded" v-for="p of pandays">
                        <div class="row">
                            <!-- <div class="jobsIMG col-md-5 mt-2"> -->
                                <img class="col-4 p-2 rounded" style="max-width: 140px;" :src="'/pandayhub/assets/img/' + p.profile" alt="">
                            <!-- </div> -->
                            <div class="info col-md-5 p-0">
                                <h6 class="mt-2 text-capitalize">Name: {{p.lastname}}, {{ p.firstname }}</h6>
                                <h6 class="mt-3 text-capitalize">Location: {{p.location}}</h6>  
                                <h6 class="mt-3 text-capitalize">Skill: {{p.skill}}</h6>
                                <h6 class="mt-2 text-capitalize">Level: {{p.level}}</h6>
                            </div>
                            <div class="btn-view col-md-3">
                                <button class="btn btn-sm">Message</button>
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
<script src="../../BackEnd/vue/axios.js"></script>
<script src="../../BackEnd/vue/vue.3.js"></script>
<script src="../../BackEnd/vue/nav.js"></script>
<script src="../../BackEnd/middleware/user/pandays.js"></script>

</html>