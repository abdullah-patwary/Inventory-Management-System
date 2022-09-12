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
    <title>IMS-Profile</title>

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
            <a class="navbar-brand me-auto name-logo" href="admin-dashboard.php"><img src="../images/name&logo.png" alt=""></a>
            <a href="admin-dashboard.php" class="top-name">AKMU</a>
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
                            <li><a class="dropdown-item" href="profile.php">Profile</a></li>
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
                        <a class="sidebar-link" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="bi bi-play-fill right-icon"></i><span>Stock</span>
                        </a>
                        <div class="collapse stock-link px-3" id="collapseExample">
                            <a href="stock-in.php" class="pt-3 pb-1"><i class="bi bi-play-fill"></i><span>Stock-in</span></a>
                            <a href="stock-out.php" class="pt-2"><i class="bi bi-play-fill"></i><span>Stock-out</span></a>
                        </div>
                    </li>
                    <li class="pt-4 pb-4">
                        <a href="profile.php">
                            <i class="bi bi-person-square"></i><span>Profile</span>
                        </a>
                    </li>
                    <li class="pt-4 pb-4">
                        <?php $_SESSION["username"] ?>
                        <a href="../logout.php" id="logout">
                            <i class="bi bi-box-arrow-left"></i><span>Logout</span></a>
                    </li>
                </div>
            </nav>
        </div>
    </div>

    <!-- Sidebar Using Offcanvas -->

    <!-- Main Content -->
    <main class="shadow p-3 mb-5 bg-body rounded h-auto">

        <!-- update profile info from the database -->



        <!-- update profile info from the database -->

        <!-- Pop-up Modal -->

        <!-- Button trigger modal -->

        <!-- Modal -->
        <div class="modal fade" id="edit-admin-profile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog modal-lg bg-info">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Profile</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <!--︾ Update profile info  ︾-->
                    <form action="" method="POST">
                        <div class="modal-body">

                            <!-- Change Admin Profile -->
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupFile01">Change Profile</label>
                                <input type="file" class="form-control" id="inputGroupFile01" name="profile">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Institute</span>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="institute">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">User ID</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="id">
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">E-mail ID</span>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="email">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Telephone</span>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="telephone">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Mobile</span>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="mobile">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Website</span>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="website">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">ERP Website</span>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="erp">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Address</span>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="address">
                            </div>
                            <!-- Update Social Media -->
                            <div>
                                <hr class="mt-3 mb-3" style="height: 5px; width: 100%;" />
                                <h4>Social Media</h4>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Facebook Page</span>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="facebook">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Linkedin</span>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="linkedin">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Telegram</span>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="telegram">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Twitter</span>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="twitter">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="update" class="btn btn-dark">Update Info</button>
                        </div>
                    </form>
                    <!--︽ Update Profile info ︽-->
                </div>
            </div>
        </div>

        <!--︽ Pop-up Modal ︽-->

        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12 fw-bold fs-2 pt-2" style="font-family: var(--sidebar-font);">
                    <ul class="d-flex justify-content-between align-items-center list-unstyled fs-3 fw-bold">
                        <li>Admin Profile</li>
                        <li>
                            <button type="button" class="btn btn-dark fs-5" data-bs-toggle="modal" data-bs-target="#edit-admin-profile" style="border-radius: 5px;">
                                Edit
                            </button>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="profile mx-auto" style="max-width: 200px;">
                    <img src="../images/Akmu logo.jpg" alt="">
                </div>
                <div>
                    <hr class="mt-3 mb-3" style="height: 5px; width: 100%;" />
                </div>
                <div class="table-responsive">
                    <table class="table mt-5 align-middle table-warning table-striped fw-bold fs-2 table-bordered" style="border-collapse: separate; border-spacing: 5 10;">
                        <tbody class="table-group-divider">
                            <tr>
                                <td class="col-sm-3 text-center">Institute</td>
                                <td>Anwer Khan Modern University</td>
                            </tr>
                            <tr>
                                <td class="col-sm-3 text-center">User ID</td>
                                <td>admin@akmu</td>
                            </tr>
                            <tr>
                                <td class="col-sm-3 text-center">Password</td>
                                <td>@#Admin</td>
                            </tr>
                            <tr>
                                <td class="col-sm-3 text-center">E-mail ID</td>
                                <td>info@akmu.edu.bd</td>
                            </tr>
                            <tr>
                                <td class="col-sm-3 text-center">Telephone</td>
                                <td>+88 02 48957276-85</td>
                            </tr>
                            <tr>
                                <td class="col-sm-3 text-center">Mobile</td>
                                <td>01975214261 - 3</td>
                            </tr>
                            <tr>
                                <td class="col-sm-3 text-center">Website</td>
                                <td><a href="https://akmu.edu.bd" style="text-decoration: none;">https://akmu.edu.bd</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-sm-3 text-center">ERP Website</td>
                                <td><a href="http://akmu.pipilikasoft.com" style="text-decoration: none;">http://akmu.pipilikasoft.com</a></td>
                            </tr>
                            <tr>
                                <td class="col-sm-3 text-center">Address</td>
                                <td>
                                    <address>H- 6, Gareeb E Nawaz Road, Sec-11, Uttara</address>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <h3 class="fw-bold p-2 bg-warning" style="width: max-content; border-radius: 5px;">Social Media
                    </h3>
                    <table class="table table-responsive align-middle table-warning table-striped fw-bold fs-2 table-bordered" style="border-collapse: separate; border-spacing: 5 10;">
                        <tbody class="table-group-divider">
                            <tr>
                                <td class="col-sm-3 text-center">Facebook Page</td>
                                <td><a href="https://www.facebook.com/akmuniversity.edu.bd" style="text-decoration: none;">www.facebook.com/akmuniversity.edu.bd</a></td>
                            </tr>
                            <tr>
                                <td class="col-sm-3 text-center">Linkedin</td>
                                <td><a href="https://www.linkedin.com/company/akmu/" style="text-decoration: none;">www.linkedin.com/company/akmu</a></td>
                            </tr>
                            <tr>
                                <td class="col-sm-3 text-center">Telegram</td>
                                <td><a href="https://t.me/+fK3n1jKb4IViNjU9" style="text-decoration: none;">https://t.me/+fK3n1jKb4IViNjU9</a></td>
                            </tr>
                            <tr>
                                <td class="col-sm-3 text-center">Twitter</td>
                                <td>--</td>
                            </tr>
                        </tbody>
                    </table>
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