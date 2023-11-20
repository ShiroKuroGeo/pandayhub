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

    <div class="container-fluid mt-5 px-5" style="overflow-y: scroll; height: 80vh;" id="applicantsHub">
        <table class="table align-middle mb-0 bg-white mt-5">
            <tbody class="data">
                <tr v-for="j of applicants">
                    <td class="py-3">
                        <div class="d-flex align-items-center ms-2">
                            <img :src="'/pandayhub/Assets/img/'+ j.profile" alt="" style="width: 45px; height: 45px" class="rounded-circle" />
                            <div class="ms-3">
                                <a href="#" class="nav-link2 fw-bold mb-1">{{j.lastname}} {{j.firstname}}</a>
                                <p class="mb-0">{{j.email}}</p>
                            </div>
                        </div>
                    </td>
                    <td class="fw-bold" style="color:#FF9900;">
                        <p class="mb-1">{{j.created_at}}</p>
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
            </tbody>
        </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="BackEnd/vue/nav.js"></script>
    <script src="/pandayhub/BackEnd/vue/axios.js"></script>
    <script src="/pandayhub/BackEnd/vue/vue.3.js"></script>
    <script src="/pandayhub/BackEnd/middleware/user/applicants.js"></script>

</body>

</html>