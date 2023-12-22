<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/9a0808c715.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">
    <link rel="stylesheet" href="/pandayhub/assets/css/admin.css">
    <title>Admin Reports</title>
</head>

<body>

    <div id="adminHub">
        <div class="d-flex" id="wrapper">

            <!-- sidebar starts -->

            <div class="background" id="sidebar-wrapper">
                <div class="sidebar-heading text-center py-4 secondary-text fs-4 fw-bold text-uppercase border-bottom">
                    <i class="fas fa-user-secret me-2"></i>PandayHub
                </div>
                <div class="list-group list-group-flush my-3">
                    <a href="index.php" class="list-group-item list-group-item-action bg-transparent second-text active">
                        <i class="fas fa-gauge me-2"></i>Dashboard
                    </a>
                    <a href="user.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold active">
                        <i class="fas fa-table-list me-2"></i>Users
                    </a>
                    <a href="report.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                        <i class="fas fa-table-list me-2"></i>Reports
                    </a>
                    <a href="/pandayhub/Backend/logout.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold">
                        <i class="fas fa-project-diagram me-2"></i>Logout
                    </a>
                </div>
            </div>

            <!-- sidebar ends -->

            <div id="page-content-wrapper">
                <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                        <h2 class="dashboard fs-2 m-0">Dashboard</h2>
                    </div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle primary-text fw-bold" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-user me-2"></i>
                                    <span class="text-capitalize">{{firstname}}</span>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a href="#" class="dropdown-item">Profile</a></li>
                                    <li><a href="#" class="dropdown-item">Settings</a></li>
                                    <hr class="dropdown-divider">
                                    <li><a href="/pandayhub/Backend/logout.php" class="dropdown-item">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid px-4">

                    <div class="row my-5">
                        <h3 class="primary-text fs-4 mb-3">Recent Reports</h3>
                        <div class="col">
                            <table class="table rounded shadow-sm">
                                <thead class="">
                                    <tr>
                                        <th scope="col">Reporter</th>
                                        <th scope="col">Reported</th>
                                        <th scope="col">Reason</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="g of getAllReported">
                                        <td class="text-capitalize">{{g.lastname}}, {{g.firstname}}</td>
                                        <td class="text-capitalize">{{g.repLastname}}, {{g.repFirstname}}</td>
                                        <td class="text-capitalize">{{g.reason}}</td>
                                        <td class="text-capitalize">
                                            <button style="cursor: pointer" type="button" class="btn btn-primary btn-sm" @click="getUserId(g.reported_id)" data-bs-toggle="modal" data-bs-target="#restrict">Restrict User</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal fade" id="restrict" tabindex="-1" aria-labelledby="restrictLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="restrictLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure want to restrict user?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" @click="reportToRestrict(ids)">Restrict</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../../BackEnd/vue/axios.js"></script>
    <script src="../../BackEnd/vue/vue.3.js"></script>
    <script src="../../BackEnd/middleware/admin.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        var el = document.getElementById("wrapper")
        var toggleButton = document.getElementById("menu-toggle")
        toggleButton.onclick = function() {
            el.classList.toggle("toggled")
        }
    </script>
</body>

</html>