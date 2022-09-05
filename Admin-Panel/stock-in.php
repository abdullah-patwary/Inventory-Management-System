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

$conn = mysqli_connect($host, $user, $password, $db);
if ($conn === false) {
    die("connection error");
}


$insert = false;
$update = false;
$delete = false;
//Data Insert in the Database

if (isset($_POST['update'])) {

    $sNo = $_POST["snoEdit"];
    $name = $_POST["updateName"];
    $quantity = $_POST["updateQuantity"];
    $price = $_POST["updatePrice"];

    $sql = "UPDATE `stock` SET `name` = '$name' , `quantity` = $quantity, `price` = $price WHERE `stock`.`id` = $sNo";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $update = true;
        // header('Location: /IMS/Admin-Panel/stock-in.php');

    }
}


//($_SERVER['REQUEST_METHOD'] == 'POST')
if (isset($_POST['add'])) {

    $name = $_POST["name"];
    $quantity = $_POST["quantity"];
    $price = $_POST["price"];

    if (!empty($price) && is_numeric($price) && $price != 0 && $price != NULL) {
        $sql = "INSERT INTO `stock` (`name`, `quantity`, `price`) VALUES ('$name', $quantity, $price)";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $insert = true;
            // header('Location: /IMS/Admin-Panel/stock-in.php');

        }
    } else {
        $warning = "Input is not correct!!!";
    }
}

if (isset($_GET['delete'])) {

    $id = $_GET['delete'];

    $sql = "DELETE FROM `stock` WHERE `stock`.`id` = $id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $delete = true;
        // header('Location: /IMS/Admin-Panel/stock-in.php');
    }
}




?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock-in</title>

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

        <!-- Modal Body -->

        <!-- Edit button using modal -->
        <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="edit">Update Information</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <!-- Data update form -->
                    <form action="/IMS/Admin-Panel/stock-in.php" method="POST">
                        <!-- <h3 class="ps-2 bg-warning text-center">
                            <?php
                            if ($warning != '') {
                                echo "$warning";
                            }
                            ?>
                        </h3> -->

                        <input type="hidden" name="snoEdit" id="snoEdit">
                        <div class="modal-body">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Materials: </span>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="updateName" id="updateName">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Quantity: </span>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="updateQuantity" id="updateQuantity">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Price: </span>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="updatePrice" id="updatePrice">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-info" name="update" id="update">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Edit modal -->

        <!-- Modal for Add Stock -->
        <div class="modal fade" id="stock" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="stock">Add New Material</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <!-- Data insertion form -->
                    <form action="/IMS/Admin-Panel/stock-in.php" method="POST">
                        <h3 class="ps-2 bg-warning text-center">
                            <?php
                            if ($warning != '') {
                                echo "$warning";
                            }
                            ?>
                        </h3>

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
                                <span class="input-group-text" id="inputGroup-sizing-default">Price: </span>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="price">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-info" name="add" id="add">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal body -->

        <div class="container-fluid">
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
                ?>
            </div>
            <div class="row">
                <?php
                if ($update) {
                    echo "
                        <div class='alert alert-info alert-dismissible fade show' role='alert'>
                            <strong>Wonderful!</strong> Information Update Successful!
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                        ";
                }
                ?>
            </div>
            <div class="row">
                <?php
                if ($delete) {
                    echo "
                    <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Success! </strong> Material Deleted Successfully!
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>
                        ";
                }
                ?>
            </div>

            <div class="row">
                <div class="col-md-12 fw-bold fs-3 pt-2" style="font-family: var(--sidebar-font);">
                    <ul class="d-flex justify-content-between align-items-center list-unstyled fs-3 fw-bold">
                        <li>Available Materials</li>
                        <li>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#stock">
                                Add New
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="table-responsive-md">
                    <table id="myTable" class="table table-success table-striped fw-bold align-middle table-hover">
                        <thead>
                            <tr>
                                <th scope="col">S.No</th>
                                <th scope="col">ID No.</th>
                                <th scope="col">Name</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
                                <th scope="col">Date & Time</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php
                            $sql = "SELECT * FROM `stock`";
                            $result = mysqli_query($conn, $sql);
                            $sNo = 0;
                            while ($col = mysqli_fetch_assoc($result)) {
                                $sNo++;
                                echo " 
                                    <tr>
                                        <th scope='row'>" . $sNo . "</th>
                                        <td>" . $col['id'] . "</td>
                                        <td>" . $col['name'] . "</td>
                                        <td>" . $col['quantity'] . "</td>
                                        <td>" . $col['price'] . "</td>
                                        <td>" . $col['date_time'] . "</td>
                                        <td><button type='button' class='edit btn btn-warning me-2' data-bs-toggle='modal' data-bs-target='#edit' name='edit' id =" . $col['sNo'] . ">Edit</button>
                                        <button type='button' class='delete btn btn-danger' name='delete' id =" . $col['sNo'] . ">Delete</button></td>
                                    </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
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
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

    <script>
        // Edit button listener
        edits = document.getElementsByClassName('edit');
        Array.from(edits).forEach(element => {
            element.addEventListener("click", (e) => {

                tr = e.target.parentNode.parentNode;
                id = tr.getElementsByTagName("td")[0].innerText;
                name = tr.getElementsByTagName("td")[1].innerText;
                quantity = tr.getElementsByTagName("td")[2].innerText;
                price = tr.getElementsByTagName("td")[3].innerText;

                snoEdit.value = id;
                updateName.value = name;
                updateQuantity.value = quantity;
                updatePrice.value = price;

                console.log(id);
            })
        })

        // Delete button
        deletes = document.getElementsByClassName('delete');
        Array.from(deletes).forEach(element => {
            element.addEventListener("click", (e) => {

                tr = e.target.parentNode.parentNode;
                id = tr.getElementsByTagName("td")[0].innerText;

                if (confirm("Confirm to delete?")) {
                    window.location = `/IMS/Admin-Panel/stock-in.php?delete=${id}`;
                }
            })
        })
    </script>
</body>

</html>