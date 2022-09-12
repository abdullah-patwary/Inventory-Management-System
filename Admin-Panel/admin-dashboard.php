<?php
session_start();
if(!isset($_SESSION["username"]))
{
    header("location:../index.php");
}

?> 


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IMS-Dashboard</title>

    <link rel="stylesheet" href="../CSS/boxicons-2.1.2/css/boxicons.min.css">
    <link rel="stylesheet" href="../CSS/boxicons-2.1.2/css/boxicons.css">
    <link rel="stylesheet" href="../CSS/boxicons-2.1.2/css/animations.css">
    <link rel="stylesheet" href="../CSS/boxicons-2.1.2/css/transformations.css">
    <link rel="stylesheet" href="../CSS/bootstrap-icons-1.9.1/bootstrap-icons.css">
    <link rel="shortcut icon" href="../images/Akmu logo.jpg" type="img/jpg">

    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/bootstrap.min.css.map">
    <link rel="stylesheet" href="../CSS/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../CSS/admin.css">

</head>

<body>
    <!-------------- Navbar  ---------------->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark fixed-top">
        <div class="container-fluid">
            <!-- offcanvas Trigger -->
            <button class="navbar-toggler sidebar-toggler me-3" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                <span class="navbar-toggler-icon" data-bs-target="#offcanvasExample"></span>
            </button>
            <!-- offcanvas Trigger -->
            <a class="navbar-brand me-auto name-logo" href="admin-dashboard.php"><img src="../images/name&logo.png" alt=""></a>
            <a href="admin-dashboard.php" class="top-name">AKMU</a>
            <div class="noti-icon">
                <div class="btn-group">
                    <button class="btn" type="button" data-bs-toggle="dropdown" data-bs-auto-close="outside"
                        aria-expanded="false">
                        <a href="#">
                            <i class='bx bxs-bell bx-flashing bx-flip-horizontal ms-5 bell' style='color:#fff'></i>
                        </a>
                    </button>
                    <ul class="dropdown-menu notification-expand">
                        <li><a class="dropdown-item" href="#">Request for...</a></li>
                        <li><a class="dropdown-item" href="#">Request for...</a></li>
                        <li><a class="dropdown-item" href="#">Request for...</a></li>
                    </ul>
                </div>
                <button class="navbar-toggler right-toggle" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="d-flex ms-auto">
                    <div class="input-group my-2 my-lg-0">
                        <input type="text" class="form-control  font-style" placeholder="Search..."
                            aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn bg-primary" type="button" id="button-addon2">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>

                <ul class="navbar-nav mb-lg-0 bg-dark pb-1">
                    <li class="nav-item dropdown pb-3">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="bi bi-person-fill"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><?php $_SESSION["username"]?>
                                <a class="dropdown-item" href="../logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-------------- Navbar  ---------------->

    <!-- Sidebar Using Offcanvas -->

    <div class="offcanvas offcanvas-start sidebar-nav bg-dark text-white" tabindex="-1" id="offcanvasExample"
        aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-body p-0">
            <nav class="navbar-dark">
                <div class="items d-flex flex-column">
                    <li class="pt-4 pb-4">
                        <a href="admin-dashboard.php" id="dashboard">
                            <i class="bi bi-box"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="pt-4 pb-4">
                        <a href="category.php" id="category">
                            <i class="bi bi-diagram-3-fill"></i><span>Category</span></a>
                    </li>
                    <li class="pt-4 pb-4">
                        <a href="employee.php" id="employee">
                            <i class="bi bi-people-fill"></i><span>Employee</span></a>
                    </li>
                    <li class="pt-4 pb-4">
                        <a class="sidebar-link" data-bs-toggle="collapse" href="#collapseExample" role="button"
                            aria-expanded="false" aria-controls="collapseExample"><i
                                class="bi bi-play-fill right-icon"></i><span>Stock</span>
                        </a>
                        <div class="collapse stock-link px-3" id="collapseExample">
                            <a href="stock-in.php" class="pt-3 pb-1"><i
                                    class="bi bi-play-fill"></i><span>Stock-in</span></a>
                            <a href="stock-out.php" class="pt-2"><i
                                    class="bi bi-play-fill"></i><span>Stock-out</span></a>
                        </div>
                    </li>
                    <li class="pt-4 pb-4">
                        <a href="profile.php">
                            <i class="bi bi-person-square"></i><span>Profile</span>
                        </a>
                    </li>
                    <li class="pt-4 pb-4">
                    <?php $_SESSION["username"]?>
                        <a href="../logout.php" id="logout">
                            <i class="bi bi-box-arrow-left"></i><span>Logout</span></a>
                    </li>
                </div>
            </nav>
        </div>
    </div>

    <!-- Sidebar Using Offcanvas -->

    <!-- Main Content -->
    <main class="shadow p-3 mb-5 bg-body rounded">

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-info fs-1 pt-2" style="font-family: var(--sidebar-font);">
                    Dashboard
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-6 mb-3">
                    <div class="card bg-info mb-3 h-100">
                        <a href="category.php" style="text-decoration: none; color: black;">
                            <div class="card-header font-style">Category</div>
                            <div class="card-body">
                                <h5 class="card-title">
                                    <i class="bi bi-diagram-3-fill p-2"></i><span>Total Field: 7</span>
                                </h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-3">
                    <div class="card bg-info mb-3 h-100">
                        <a href="employee.php" style="text-decoration: none; color: black;">
                            <div class="card-header font-style">Employee</div>
                            <div class="card-body">
                                <h5 class="card-title">
                                    <i class="bi bi-people-fill pe-2"></i><span>Total User: 40</span>
                                </h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-3">
                    <div class="card bg-info mb-3 h-100">
                        <a href="stock-in.php" style="text-decoration: none; color: black;">
                            <div class="card-header font-style">Stock-in</div>
                            <div class="card-body">
                                <h5 class="card-title">
                                    <i class='bx bxs-check-square pe-2' style='color:#09ff00'></i><span>Total Stock-in:
                                        0</span>
                                </h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-3">
                    <div class="card text-black bg-info mb-3 h-100">
                        <a href="stock-out.php" style="text-decoration: none; color: black;">
                            <div class="card-header font-style">Stock-out</div>
                            <div class="card-body">
                                <h5 class="card-title">
                                    <i class='bx bxs-x-circle pe-2' style='color:#ff0000'></i><span>Total Stock-out:
                                        0</span>
                                </h5>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <h3 class="pt-3 pb-2 fw-bold">#Recent Request</h3>
            </div>
            <div class="table-responsive">
                <table class="table align-middle table-success table-striped fw-bold">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">ID</th>
                            <th scope="col">Dept.</th>
                            <th scope="col">Req. for</th>
                            <th scope="col">Status</th>
                            <th scope="col">Date</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <tr>
                            <th scope="row">1</th>
                            <td>Shovon Kumar Paul</td>
                            <td>001</td>
                            <td>CSE</td>
                            <td>Pen</td>
                            <td>Accept</td>
                            <td>21 Aug 22</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Farhana Haque</td>
                            <td>002</td>
                            <td>CSE</td>
                            <td>Paper</td>
                            <td>Accept</td>
                            <td>11 Aug 22</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Minhazul Alam</td>
                            <td>003</td>
                            <td>CSE</td>
                            <td>AC</td>
                            <td>Accept</td>
                            <td>20 Aug 22</td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Prioti Sarker</td>
                            <td>004</td>
                            <td>CSE</td>
                            <td>AC</td>
                            <td>Accept</td>
                            <td>17 Aug 22</td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td>Dr. Mahadi Hasan</td>
                            <td>001</td>
                            <td>BBA</td>
                            <td>Pen</td>
                            <td>Accept</td>
                            <td>15 Aug 22</td>
                        </tr>
                        <tr>
                            <th scope="row">6</th>
                            <td>Minhazul Alam</td>
                            <td>003</td>
                            <td>CSE</td>
                            <td>Pen</td>
                            <td>Accept</td>
                            <td>22 Aug 22</td>
                        </tr>
                        <tr>
                            <th scope="row">7</th>
                            <td>Nasif Chowdhury</td>
                            <td>003</td>
                            <td>Textile</td>
                            <td>AC</td>
                            <td>Accept</td>
                            <td>19 Aug 22</td>
                        </tr>
                        <tr>
                            <th scope="row">8</th>
                            <td>Nasif Chowdhury</td>
                            <td>003</td>
                            <td>Textile</td>
                            <td>AC</td>
                            <td>Accept</td>
                            <td>19 Aug 22</td>
                        </tr>
                        <tr>
                            <th scope="row">9</th>
                            <td>Nasif Chowdhury</td>
                            <td>003</td>
                            <td>Textile</td>
                            <td>AC</td>
                            <td>Accept</td>
                            <td>19 Aug 22</td>
                        </tr>
                        <tr>
                            <th scope="row">10</th>
                            <td>Nasif Chowdhury</td>
                            <td>003</td>
                            <td>Textile</td>
                            <td>AC</td>
                            <td>Accept</td>
                            <td>19 Aug 22</td>
                        </tr>                        
                    </tbody>
                </table>
            </div>
        </div>

    </main>
    <!-- Main Content -->

    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js.map"></script>
    <!-- <script src="../js/dataTables.bootstrap5.min.js"></script> -->
    <script src="../js/jquery-3.5.1.js"></script>
    <!-- <script src="../js/jquery.dataTables.min.js"></script> -->
    <script src="../js/script.js"></script>
</body>

</html>