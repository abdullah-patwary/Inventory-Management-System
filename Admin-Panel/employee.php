<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("location:../index.php");
}

//connecting the database
$host        = "localhost";
$user        = "root";
$password    = "";
$db          = "IMS";

$insert = false;
$failed = false;

$conn = mysqli_connect($host, $user, $password, $db);
if ($conn === false) {
    die("connection error");
}

//Adding new department
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //Insert Image
    $filename = $_FILES["profile"]["name"];
    $tempname = $_FILES["profile"]["tmp_name"];
    $folder = "./profile/" . $filename;

    $name = $_POST['fname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $department = $_POST['department'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $type = $_POST['type'];
    $address = $_POST['address'];

    // $profile = $_FILES["profile"]["name"];

    $sql = "INSERT INTO `employee` (`name`, `department`, `email`, `username`, `password`, `mobile`, `user_type`, `address`, `image`) VALUES ('$name', '$department', '$email', '$username', '$password', '$mobile', '$type', '$address', '$filename')";

    move_uploaded_file($tempname, $folder);

    $result = mysqli_query($conn, $sql);
    if ($result) {
        $insert = true;
    }
}


?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IMS-Employee</title>

    <link rel="stylesheet" href="../CSS/boxicons-2.1.2/css/boxicons.min.css">
    <link rel="stylesheet" href="../CSS/boxicons-2.1.2/css/boxicons.css">
    <link rel="stylesheet" href="../CSS/boxicons-2.1.2/css/animations.css">
    <link rel="stylesheet" href="../CSS/boxicons-2.1.2/css/transformations.css">
    <link rel="stylesheet" href="../CSS/bootstrap-icons-1.9.1/bootstrap-icons.css">
    <link rel="shortcut icon" href="../images/Akmu logo.jpg" type="img/jpg">

    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/bootstrap.min.css.map">
    <link rel="stylesheet" href="../CSS/bootstrap/css/dataTable.min.css">
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

        <!-- ---- Modal for Assign Button ---- -->
        <div class="modal fade" id="specific" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Assign</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <!-- Data insertion form -->
                    <form action="" method="POST">
                        <!-- <h3 class="ps-2 bg-warning text-center">
                            <?php
                            // if ($warning != '') {
                            //     echo "$warning";
                            // }
                            ?>
                        </h3> -->

                        <div class="modal-body">
                            <div class="input-group mb-3 d-flex align-items-center">
                                <label for="name" class="pe-3">Material</label>
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="name">
                                    <option value="Marker">Marker</option>
                                    <option value="Duster">Duster</option>
                                    <option value="Paper">Paper</option>
                                    <option value="Chair">Chair</option>
                                    <option value="Table">Table</option>
                                    <option value="Light">Light</option>
                                    <option value="Fan">Fan</option>
                                    <option value="Tissue Paper">Tissue Paper</option>
                                </select>
                            </div>
                            <div class="input-group mb-3 d-flex align-items-center">
                                <label for="quantity" class="pe-3">Quantity</label>
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="quantity">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <label for="quantity" class="pe-5">ID</label>
                                <input type="text" class="form-control ms-3" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="id">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-info">Assign</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- ---- Modal for Assign Button ---- -->
        <div class="modal fade" id="assign-material" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Assign</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <!-- Data insertion form -->
                    <form action="" method="POST">
                        <!-- <h3 class="ps-2 bg-warning text-center">
                            <?php
                            // if ($warning != '') {
                            //     echo "$warning";
                            // }
                            ?>
                        </h3> -->

                        <div class="modal-body">
                            <div class="input-group mb-3 d-flex align-items-center">
                                <label for="name" class="pe-3">Material</label>
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="name">
                                    <option value="Marker">Marker</option>
                                    <option value="Duster">Duster</option>
                                    <option value="Paper">Paper</option>
                                    <option value="Chair">Chair</option>
                                    <option value="Table">Table</option>
                                    <option value="Light">Light</option>
                                    <option value="Fan">Fan</option>
                                    <option value="Tissue Paper">Tissue Paper</option>
                                </select>
                            </div>
                            <div class="input-group mb-3 d-flex align-items-center">
                                <label for="quantity" class="pe-3">Quantity</label>
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="quantity">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#specific">
                                Specific
                            </button>
                            <button type="button" class="btn btn-info">Assign to All</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- ---- Modal for Assign Button ---- -->

        <!-- Using Modal for the Add Employee -->

        <!-- Modal -->
        <div class="modal fade" id="add-department" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add a New User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!--︾ Add new Employee  ︾-->
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">

                            <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupFile01">Change Profile</label>
                                <input type="file" class="form-control" id="inputGroupFile01" name="profile">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" name="fname">
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">User Name</label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" name="username">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <div class="mb-3">
                                <label for="department" class="form-label">Department</label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" name="department">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" aria-describedby="emailHelp" name="email">
                            </div>
                            <div class="mb-3">
                                <label for="mobile" class="form-label">Mobile</label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" name="mobile">
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" name="address">
                            </div>
                            <div class="input-group mb-3 d-flex align-items-center">
                                <label for="types" class="pe-3">User Type</label>
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="type">
                                    <option value="user">user</option>
                                    <option value="admin">admin</option>
                                </select>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="add" class="btn btn-dark" id="add">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Using Modal for the Add Employee -->

        <div class="container-fluid h-auto">

            <div class="row">
                <?php
                if ($insert) {
                    echo "
                        <div class='alert alert-info alert-dismissible fade show' role='alert'>
                            <strong>Wonderful!</strong> New Stock Added Successfully!
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                        ";
                }
                if ($failed) {
                    echo "
                        <div class='alert alert-info alert-dismissible fade show' role='alert'>
                            <strong>Failed!</strong> File is not uploaded!
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                        ";
                }

                ?>
            </div>

            <div class="row">
                <div class="col-md-12 fw-bold fs-2 pt-2" style="font-family: var(--sidebar-font);">
                    <ul class="d-flex list-unstyled fs-3 fw-bold upper-btns">
                        <li class="flex-grow-1">Employees</li>
                        <li class="pe-2">
                            <!-- trigger modal button-->
                            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#assign-material">
                                Assign Material
                            </button>
                        </li>
                        <li>
                            <!-- trigger modal button-->
                            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#add-department">
                                Add User
                            </button>
                        </li>
                    </ul>
                    <hr>
                </div>
            </div>

            <div class="row">
                <?php
                $sql = "SELECT * FROM `employee`";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($row["user_type"] == "user") {
                ?>
                        <div class='col-xxxl-2 col-lg-3 col-md-6 col-sm-6 con-xs-12'>
                            <div class='card' style='width: 18rem;'>
                                <img src="./profile/<?php echo $row['image']; ?>" width="250px" height="250px" class='card-img-top' alt='Employee Image'>
                                <div class='card-body'>
                                    <h5 class='card-title'><?php echo $row['name']; ?></h5>
                                    <h5 class='card-title'>ID: <?php echo $row['username']; ?></h5>
                                    <h5 class='card-title'>Department of <?php echo $row['department']; ?></h5>
                                    <button class='btn align-center w-100 fs-bold bg-info'>View</button>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>


        </div>
    </main>
    <!-- Main Content -->

    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery-3.5.1.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/script.js"></script>

    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>

</html>