<?php
    session_start();
    if(isset($_SESSION['userId'])){
        header("location: users/client/index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/9a0808c715.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">
    <link rel="stylesheet" href="/pandayhub/assets/css/index.css">
    </head>
  <!-- <body class="overflow-hidden"> -->
  <body>
    <div id="authentication">
        <!-- navbar -->
        <nav class="navbarHeight navbar navbar-expand-lg navbar-light fixed-top">
          <div class="container">
            <a href="#" class="navbar-brand"><img src="/pandayhub/assets/img/logo.png" alt="" height="60" width="80"></a>

            <button
              class="navbar-toggler"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#navmenu">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-center" id="navmenu">
          
            </div>
            <div class="button d-flex align-items-end">
              <div class="btn">
                  <button type="button" class="reg-btn btn-primary" data-bs-toggle="modal" data-bs-target="#register">REGISTER</button>
              </div>
              <div class="btn d-flex align-items-end">
                  <button type="button" class="log-btn btn-primary" data-bs-toggle="modal" data-bs-target="#login">LOGIN</button>
              </div>
            </div>
          </div>
        </nav>
        
          <!-- REGISTER MODAL -->
        <div id="register" class="modal fade mt-5">
          <div class="modal-dialog d-flex modal-dialog-center">
            <div class="modal-content">
              <div class="modal-body">
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                <div class="myform">
                  <h1 class="reg text-center">REGISTER FORM</h1>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="mb-3">
                          <label for="Email" class="me-5">FirstName</label>
                          <input type="text" name="firstname" class="form-control" id="firstname" />
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="mb-3">
                          <label for="Email" class="me-5">LastName</label>
                          <input type="text" name="lastname" class="form-control" id="lastname" />
                        </div>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label for="Email" class="me-5">Email</label>
                      <input type="Email" name="email" class="form-control" id="email" />
                    </div>
                    <div class="mb-2 mt-3">
                      <label for="Password" class="me-3">Password</label>
                      <input type="password" name="password" class="form-control" id="password" />
                    </div>
                    <button @click="registerUsers" class="btn-modal btn fw-bold mt-3">REGISTER</button>
                    <div class="d-flex mt-1">
                      <p class="text-white">Already Have an Account Please</p>
                      <a href="#" class="nav-link ms-1 fw-bold" type="button" class="log-btn" data-bs-toggle="modal" data-bs-target="#login">Login</a>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
          <!-- LOGIN MODAL -->
        <div class="modal fade mt-5" id="login">
          <div class="modal-dialog d-flex modal-dialog-center">
            <div class="modal-content">
              <div class="modal-body">
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                <div class="myform">
                  <h1 class="reg text-center">LOGIN FORM</h1>
                    <div class="mb-3 mt-3">
                      <label for="Email" class="me-5">Email</label>
                      <input type="Email" class="form-control" id="EmailLogin" />
                    </div>
                    <div class="mb-3 mt-3">
                      <label for="Password" class="me-3">Password</label>
                      <input type="password" class="form-control" id="PasswordLogin" />
                    </div>
                    <button type="button" @click="loginUser" class="btn-modal btn fw-bold mt-3" id="btn_login">LOGIN</button>
                    <div class="d-flex">
                      <p class="text-white">Don't have an Account Please</p>
                      <a href="#" class="nav-link fw-bold ms-1" type="button" class="log-btn" data-bs-toggle="modal" data-bs-target="#register">Register</a>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>  

        <div id="carouselExampleIndicators" class="carousel slide" data-bs-touch="false" data-bs-interval="false">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="/pandayhub/assets/img/front3.jpg" id="carouselImage" class="d-block w-100" >
            </div>
            <div class="carousel-item">
              <img src="/pandayhub/assets/img/front2.jpg" id="carouselImage" class="d-block w-100" >
            </div>
            <div class="carousel-item">
              <img src="/pandayhub/assets/img/front.jpg" id="carouselImage" class="d-block w-100" >
            </div>
          </div>
          <button class="carousel-control-prev" role="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" role="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
          </div>
        </div>
        
        <section>
          <div class="container mt-5">
            <div class="row justify-content-center text-center">
              <h1 class="build col-lg-9 mt-5 text-white fw-bold" data-aos="fade-right" data-aos-delay="50" data-aos-duration="1000">BUILD FOR</h1>
              <h1 class="future col-lg-3 mt-5 fw-bold" data-aos="fade-left" data-aos-delay="50" data-aos-duration="1000">FUTURE</h1>
            </div>
          </div>
        </section>

        <!-- section -->
          <section class="text-center vh-100">
            <div class="house container-fluid">
              <div class="navbarHeight">
                <!-- this is just for height -->
              </div>
              <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-2 col-12">
                  <div class="cabin">
                    <img src="/pandayhub/assets/img/cabin.jpg" class="" height="299px" width="400px" data-aos="fade-right" data-aos-delay="50" data-aos-duration="1000">
                  </div>
                  <div class="para mt-3" data-aos="fade-right" data-aos-delay="50" data-aos-duration="1000">
                      <h1>CABIN</h1>
                      <p class="deff">
                         A cabin house is a structure built away from the city and often close to the woods or a jungle, meant to offer a serene and peaceful getaway destination to the owner.
                      </p>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                  <div class="copecod">
                    <div class="">
                      <img src="/pandayhub/assets/img/copecod.webp" class="cat" height="299px" width="410px" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1000">
                    </div>
                    <div class="para mt-3" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1000">
                      <h1>COPE COD</h1>
                      <p class="deff">
                        Cape Cod style homes are traditionally single story homes with a low and broad rectangular profile, a central chimney, and a pitched, side-gabled roof
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                  <div class="colonial">
                    <div class="">
                      <img src="/pandayhub/assets/img/colonial.jpeg" class="bird" height="299px" width="410px" data-aos="fade-left" data-aos-delay="50" data-aos-duration="1000">
                    </div>
                    <div class="para mt-3" data-aos="fade-left" data-aos-delay="50" data-aos-duration="1000">
                      <h1>COLONIAL</h1>
                      <p>
                        American Colonial homes are generally characterized by a square or rectangular facade, a central entrance and windows symmetrically placed on either side of the entrance.
                      </p>
                    </div>
                  </div>
                </div>
            </div>
          </section>
        <!-- footer -->
        <footer class="bg-light text-center text-lg-start">
          <!-- Copyright -->
          <div class="container-fluid">
              <div class="row">
                  <div class="text-center p-3 col-md-2" style="background-color: rgba(0, 0, 0, 0.2);">
                      <p><a href="" class="footer fw-bold">James Michael Guevarra</a></p>
                    </div>
                    <div class="text-center p-3 col-md-8" style="background-color: rgba(0, 0, 0, 0.2);">
                      <p><a href="" class="footer fw-bold">Jovet Quillan</a></p>
                    </div>
                    <div class="text-center p-3 col-md-2" style="background-color: rgba(0, 0, 0, 0.2);">
                      <p><a href="" class="footer fw-bold">Jose Jeff Jumao-as</a></p>
                    </div>
              </div>
          </div>
          <!-- Copyright -->
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            once: false
        });
    </script>
  </body>

  <script src="BackEnd/vue/axios.js"></script>
  <script src="BackEnd/vue/vue.3.js"></script>
  <script src="BackEnd/middleware/authentication.js"></script>
</html>