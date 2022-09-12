<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("location:../index.php");
}

?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IMS-History</title>

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
            <button class="navbar-toggler sidebar-toggler me-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                <span class="navbar-toggler-icon" data-bs-target="#offcanvasExample"></span>
            </button>
            <!-- offcanvas Trigger -->
            <a class="navbar-brand me-auto name-logo" href="profile.php"><img src="../images/name&logo.png" alt=""></a>
            <a href="profile.php" class="top-name">AKMU</a>
            <div class="noti-icon">
                <div class="btn-group">
                    <button class="btn" type="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
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
                <button class="navbar-toggler right-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="d-flex ms-auto">
                    <div class="input-group my-2 my-lg-0">
                        <input type="text" class="form-control  font-style" placeholder="Search..." aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn bg-primary" type="button" id="button-addon2">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>

                <ul class="navbar-nav mb-lg-0 bg-dark pb-1">
                    <li class="nav-item dropdown pb-3">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-fill"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <?php $_SESSION["username"] ?>
                                <a class="dropdown-item" href="../logout.php">Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-------------- Navbar  ---------------->

    <!-- Sidebar Using Offcanvas -->

    <div class="offcanvas offcanvas-start sidebar-nav bg-dark text-white" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-body p-0">
            <nav class="navbar-dark">
                <div class="items d-flex flex-column">
                    <li class="pt-4 pb-4">
                        <a href="profile.php">
                            <i class="bi bi-person-square"></i><span>Profile</span>
                        </a>
                    </li>
                    <li class="pt-4 pb-4">
                        <a href="#">
                            <i class='bx bx-history'></i><span>History</span>
                        </a>
                    </li>
                    <li class="pt-4 pb-4">
                        <?php $_SESSION["username"] ?>
                        <a href="../logout.php" id="logout">
                            <i class="bi bi-box-arrow-left"></i><span>Logout</span>
                        </a>
                    </li>
                </div>
            </nav>
        </div>
    </div>

    <!-- Sidebar Using Offcanvas -->

    <!-- Main Content -->
    <main class="shadow p-3 mb-5 bg-body rounded h-auto">

        <!-- Pop-up Modal -->

        <!-- Button trigger modal -->

        <!-- Modal -->
        <div class="modal fade" id="request" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Profile</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <!--︾ Update profile info  ︾-->
                    <form>
                        <div class="modal-body">

                            <div class="input-group mb-3">
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                                    <option selected>Open this select menu</option>
                                    <option value="1">Marker</option>
                                    <option value="2">Duster</option>
                                    <option value="3">Paper</option>
                                    <option value="4">Chair</option>
                                    <option value="5">Table</option>
                                    <option value="6">Light</option>
                                    <option value="7">Fan</option>
                                    <option value="8">Tissue Paper</option>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Quantity</span>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-dark">Send</button>
                        </div>
                    </form>
                    <!--︽ Send Request for an Item ︽-->
                </div>
            </div>
        </div>

        <!-- Pop-up Modal -->

        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12 fw-bold fs-2 pt-2" style="font-family: var(--sidebar-font);">
                    <ul class="d-flex justify-content-between align-items-center list-unstyled fs-3 fw-bold">
                        <li>History</li>
                        <li>
                            <button type="button" class="btn btn-dark fs-5" data-bs-toggle="modal" data-bs-target="#request" style="border-radius: 5px;">
                                Request for
                            </button>
                        </li>
                    </ul>
                </div>
            </div>

        </div>

    </main>
    <!-- Main Content -->

    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js.map"></script>
    <script src="../js/dataTables.bootstrap5.min.js"></script>
    <script src="../js/jquery-3.5.1.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/script.js"></script>
</body>

</html>