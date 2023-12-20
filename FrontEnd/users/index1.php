<?php
session_start();

if (!isset($_SESSION['userId'])) {
    header('location:./index.php');
}
?>
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
    <link rel="stylesheet" href="/pandayhub/assets/css/index2.css">
</head>s
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
                    <p class="lead my-4 mb-5 fw-bold">
                        The  Contruction of is a testament to the hardwok and expertise of the team, resulting in a sturdy and visually and stunning structure
                    </p>
                </div>
                <img src="/pandayhub/assets/img/secondary.png" class="img-fluid d-none d-sm-block" width="400" height="360">
            </div>
        </div>
    </section>

    <section class="pandays">

        <div class="container">
            <div class="row">
                <div class="drywall col-lg-4 justify-content-center align-items-center">
                    <div class="mt-3">
                        <img src="/pandayhub/assets/img/drywall.jpg" width="322" height="200">
                    </div>
                    <div class="description">
                        <h1 class="text-center">DRY WALL</h1>
                        <p class="text-center ms-2">
                            Drywall is a popular choice for Panday due to its ease of installation and affordability. It is also fire-resistant and provides sound insulation. It can be cut to size and shape, making it easy to install around corners, curves, and other irregular surfaces.
                        </p>
                    </div>
                </div>

                <div class="roofing col-lg-4 justify-content-center align-items-center">
                    <div class="mt-3">
                        <img src="/pandayhub/assets/img/roofing.jpg" width="322" height="200">
                    </div>
                    <div class="description">
                        <h1 class="text-center">ROOFING</h1>
                        <p class="text-center ms-2">
                            Proper installation and maintenance of roofing materials are critical to ensure the longevity and effectiveness of the roof in protecting the building and its occupants. Regular inspections and repairs can help prevent damage and extend the life of the roof.
                        </p>
                    </div>
                </div>

                <div class="flooring col-lg-4 justify-content-center align-items-center">
                    <div class="mt-3">
                        <img src="/pandayhub/assets/img/flooring.jpg" width="322" height="200">
                    </div>
                    <div class="description">
                        <h1 class="text-center">FLOORING</h1>
                        <p class="text-center ms-2">
                            Flooring installation typically involves preparing the subfloor, measuring and cutting the flooring material to fit the space, and securing it in place using adhesives, nails, or other fasteners.
                        </p>
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
    <script src="BackEnd/vue/axios.js"></script>
    <script src="BackEnd/vue/vue.3.js"></script>
    <script src="BackEnd/vue/nav.js"></script>
    <script src="BackEnd/middleware/authentication.js"></script>
</html>