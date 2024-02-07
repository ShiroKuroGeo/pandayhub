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
    <title>Admin Users</title>
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
                    <a href="report.php " class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
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
                                    <span class="text-capitalize">{{firstname}}</span> </a>
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
                        <div class="d-flex justify-content-between">
                            <h3 class="primary-text fs-4 mb-3">Recent Users</h3>
                            <div class="col-2">
                                <input type="text" v-model="searchThisUser" class="col-12 form-control" placeholder="Enter User Info">
                            </div>
                        </div>
                        <div class="col">
                            <table class="table rounded shadow-sm">
                                <thead class="">
                                    <tr>
                                        <th scope="col" width="50">#</th>
                                        <th scope="col">Profile</th>
                                        <th scope="col">FirstName</th>
                                        <th scope="col">LastName</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Created_at</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(au, index) of searchUser">
                                        <td widtd="50">{{1+index++}}</td>
                                        <td>
                                            <img :src="'/pandayhub/assets/img/'+au.profile" width="120" height="80">
                                        </td>
                                        <td class="text-capitalize fw-bold">{{au.firstname}}</td>
                                        <td class="text-capitalize fw-bold">{{au.lastname}}</td>
                                        <td class="text-capitalize fw-bold">{{au.email}}</td>
                                        <td :class="au.status == 1 ? 'text-capitalize fw-bold text-primary':'text-capitalize fw-bold text-danger'">{{au.status == 1 ? 'Unrestricted':'Restricted'}}</td>
                                        <td class="text-capitalize fw-bold">{{au.role == 1 ? 'Panday': 'Applicant'}}</td>
                                        <td class="text-capitalize fw-bold">{{dateString(au.create_at)}}</td>
                                        <td>
                                            <div class="row">
                                                <button class="btn btn-md btn-primary col-5 me-1" @click="updateUsersRestriction(au.userId, 2)">Restric</button>
                                                <button class="btn btn-md btn-primary col-5 me-1" @click="updateUsersRestriction(au.userId, 1)">Unrestric</button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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