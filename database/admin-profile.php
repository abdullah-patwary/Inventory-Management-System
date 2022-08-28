<?php

$connetion = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connetion, 'IMS');

if(isset($_POST['update']));
{
    $profile = $_POST['profile'];
    $id = $_POST['id'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $mobile = $_POST['mobile'];
    $website = $_POST['website'];
    $erp = $_POST['erp'];
    $address = $_POST['address'];
    $facebook = $_POST['facebook'];
    $linkedin = $_POST['linkedin'];
    $telegram = $_POST['telegram'];
    $twitter = $_POST['twitter'];

    $query = "INSERT INTO `Admin` (`profile`, `institute`, `id`, `password`, `email`, `telephone`, `mobile`, `website`, `erp`, `address`, `facebook`, `linkedin`, `telegram`, `twitter`) VALUES (`$profile`, `$institute`, `$id`, `$password`, `$email`, `$telephone`, `$mobile`, `$website`, `$erp`, `$address`, `$facebook`, `$linkedin`, `$telegram`, `$twitter`)";
    $query_run = mysqli_query($connetion, $query);

    if($query_run)
    {
        echo '<script> alert("Information Updated); <script>';
        header('Location: ../Admin-Panel/profile.php');
    }
    else
    {
        echo '<script> alert("Information Not Updated); <script>';
    }

}



?>