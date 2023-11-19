<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/9a0808c715.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">
  <link rel="stylesheet" href="/pandayhub/assets/css/applications.css">
  <title>Document</title>
</head>

<body style="overflow-y: hidden;">

  <?php
  include('nav.php')
  ?>


  <div class="container-fluid mt-5 px-5" style="overflow-y: scroll; height: 80vh;">
    <table class="table align-middle mb-0 bg-white mt-5">
    <tbody class="data">
      <tr>
        <td class="py-3">
          <div class="d-flex align-items-center ms-2">
            <img src="https://mdbootstrap.com/img/new/avatars/8.jpg" alt="" style="width: 45px; height: 45px" class="rounded-circle" />
            <div class="ms-3">
              <a href="#" class="nav-link2 fw-bold mb-1">John Doe</a>
              <p class="mb-0">john.doe@gmail.com</p>
            </div>
          </div>
        </td>
        <td class="fw-bold" style="color:#FF9900;">
          <p class="mb-1">April 27, 2023</p>
        </td>
        <td>
          <button type="button" class="btn btn-rounded btn-sm fw-bold" data-mdb-ripple-color="dark">Hire</button>
        </td>
        <td>
          <button type="button" class="btn btn-rounded btn-sm fw-bold" data-mdb-ripple-color="dark">Message</button>
        </td>
        <td>
          <button type="button" class="btn btn-sm btn-rounded fw-bold">Report</button>
        </td>
      </tr>
      <tr>
        <td class="py-3">
          <div class="d-flex align-items-center ms-2">
            <img src="https://mdbootstrap.com/img/new/avatars/6.jpg" class="rounded-circle" alt="" style="width: 45px; height: 45px" />
            <div class="ms-3">
              <a href="#" class="nav-link2 fw-bold mb-1">Alex Ray</a>
              <p class="mb-0">alex.ray@gmail.com</p>
            </div>
          </div>
        </td>
        <td class="fw-bold">
          <p class="mb-1">April 27, 2023</p>
        </td>
        <td>
          <button type="button" class="btn btn-rounded btn-sm fw-bold" data-mdb-ripple-color="dark">Hire</button>
        </td>
        <td>
          <button type="button" class="btn btn-rounded btn-sm fw-bold" data-mdb-ripple-color="dark">Message</button>
        </td>
        <td>
          <button type="button" class="btn btn-rounded btn-sm fw-bold" data-mdb-ripple-color="dark">Report</button>
        </td>
      </tr>
      <tr>
        <td class="py-3">
          <div class="d-flex align-items-center ms-2">
            <img src="https://mdbootstrap.com/img/new/avatars/7.jpg" class="rounded-circle" alt="" style="width: 45px; height: 45px" />
            <div class="ms-3">
              <a href="#" class="nav-link2 fw-bold mb-1">Kate Hunington</a>
              <p class="mb-0">kate.hunington@gmail.com</p>
            </div>
          </div>
        </td>
        <td class="fw-bold" style="color:#FF9900;">
          <p class="mb-1">April 27, 2023</p>
        </td>
        <td>
          <button type="button" class="btn btn-rounded btn-sm fw-bold" data-mdb-ripple-color="dark">Hire</button>
        </td>
        <td>
          <button type="button" class="btn btn-rounded btn-sm fw-bold" data-mdb-ripple-color="dark">Mesage</button>
        </td>
        <td>
          <button type="button" class="btn btn-rounded btn-sm fw-bold" data-mdb-ripple-color="dark">Report</button>
        </td>
      </tr>
    </tbody>
  </table>
  </div> 


  <!-- <section class="intro">
  <div class="bg-image h-100">
    <div class="d-flex align-items-center h-100">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-12">
            <div class="card shadow-2-strong">
              <div class="card-body p-0">
                <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative; height: 550px; width:1510px">
                  <table class="table table-dark mb-0">
                    <thead style="background-color: #393939;">
                      <tr class="text-uppercase text-success">
                        <th scope="col">Class name</th>
                        <th scope="col">Type</th>
                        <th scope="col">Hours</th>
                        <th scope="col">Trainer</th>
                        <th scope="col">Spots</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Like a butterflies</td>
                        <td>Boxing</td>
                        <td>9:00 AM - 11:00 AM</td>
                        <td>Aaron Chapman</td>
                        <td>10</td>
                      </tr>
                      <tr>
                        <td>Mind &amp; Body</td>
                        <td>Yoga</td>
                        <td>8:00 AM - 9:00 AM</td>
                        <td>Adam Stewart</td>
                        <td>15</td>
                      </tr>
                      <tr>
                        <td>Crit Cardio</td>
                        <td>Gym</td>
                        <td>9:00 AM - 10:00 AM</td>
                        <td>Aaron Chapman</td>
                        <td>10</td>
                      </tr>
                      <tr>
                        <td>Wheel Pose Full Posture</td>
                        <td>Yoga</td>
                        <td>7:00 AM - 8:30 AM</td>
                        <td>Donna Wilson</td>
                        <td>15</td>
                      </tr>
                      <tr>
                        <td>Playful Dancer's Flow</td>
                        <td>Yoga</td>
                        <td>8:00 AM - 9:00 AM</td>
                        <td>Donna Wilson</td>
                        <td>10</td>
                      </tr>
                      <tr>
                        <td>Zumba Dance</td>
                        <td>Dance</td>
                        <td>5:00 PM - 7:00 PM</td>
                        <td>Donna Wilson</td>
                        <td>20</td>
                      </tr>
                      <tr>
                        <td>Cardio Blast</td>
                        <td>Gym</td>
                        <td>5:00 PM - 7:00 PM</td>
                        <td>Randy Porter</td>
                        <td>10</td>
                      </tr>
                      <tr>
                        <td>Pilates Reformer</td>
                        <td>Gym</td>
                        <td>8:00 AM - 9:00 AM</td>
                        <td>Randy Porter</td>
                        <td>10</td>
                      </tr>
                      <tr>
                        <td>Supple Spine and Shoulders</td>
                        <td>Yoga</td>
                        <td>6:30 AM - 8:00 AM</td>
                        <td>Randy Porter</td>
                        <td>15</td>
                      </tr>
                      <tr>
                        <td>Yoga for Divas</td>
                        <td>Yoga</td>
                        <td>9:00 AM - 11:00 AM</td>
                        <td>Donna Wilson</td>
                        <td>20</td>
                      </tr>
                      <tr>
                        <td>Virtual Cycle</td>
                        <td>Gym</td>
                        <td>8:00 AM - 9:00 AM</td>
                        <td>Randy Porter</td>
                        <td>20</td>
                      </tr>
                      <tr>
                        <td>Like a butterfly</td>
                        <td>Boxing</td>
                        <td>9:00 AM - 11:00 AM</td>
                        <td>Aaron Chapman</td>
                        <td>10</td>
                      </tr>
                      <tr>
                        <td>Mind &amp; Body</td>
                        <td>Yoga</td>
                        <td>8:00 AM - 9:00 AM</td>
                        <td>Adam Stewart</td>
                        <td>15</td>
                      </tr>
                      <tr>
                        <td>Crit Cardio</td>
                        <td>Gym</td>
                        <td>9:00 AM - 10:00 AM</td>
                        <td>Aaron Chapman</td>
                        <td>10</td>
                      </tr>
                      <tr>
                        <td>Wheel Pose Full Posture</td>
                        <td>Yoga</td>
                        <td>7:00 AM - 8:30 AM</td>
                        <td>Donna Wilson</td>
                        <td>15</td>
                      </tr>
                      <tr>
                        <td>Playful Dancer's Flow</td>
                        <td>Yoga</td>
                        <td>8:00 AM - 9:00 AM</td>
                        <td>Donna Wilson</td>
                        <td>10</td>
                      </tr>
                      <tr>
                        <td>Zumba Dance</td>
                        <td>Dance</td>
                        <td>5:00 PM - 7:00 PM</td>
                        <td>Donna Wilson</td>
                        <td>20</td>
                      </tr>
                      <tr>
                        <td>Cardio Blast</td>
                        <td>Gym</td>
                        <td>5:00 PM - 7:00 PM</td>
                        <td>Randy Porter</td>
                        <td>10</td>
                      </tr>
                      <tr>
                        <td>Pilates Reformer</td>
                        <td>Gym</td>
                        <td>8:00 AM - 9:00 AM</td>
                        <td>Randy Porter</td>
                        <td>10</td>
                      </tr>
                      <tr>
                        <td>Supple Spine and Shoulders</td>
                        <td>Yoga</td>
                        <td>6:30 AM - 8:00 AM</td>
                        <td>Randy Porter</td>
                        <td>15</td>
                      </tr>
                      <tr>
                        <td>Yoga for Divas</td>
                        <td>Yoga</td>
                        <td>9:00 AM - 11:00 AM</td>
                        <td>Donna Wilson</td>
                        <td>20</td>
                      </tr>
                      <tr>
                        <td>Virtual Cycle</td>
                        <td>Gym</td>
                        <td>8:00 AM - 9:00 AM</td>
                        <td>Randy Porter</td>
                        <td>20</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> -->



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="BackEnd/vue/nav.js"></script>
</body>

</html>