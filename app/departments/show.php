<?php
// Styling 
include_once '../../shared/header.php';
include_once '../../shared/navbar.php';
// From Vendor To Get Connection Of Database
include_once '../../vendor/config.php';

// Select  Department ->  SELECT * FROM `departments` WHERE `id` = id; 
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $selectDepartment = "SELECT * FROM `departments` WHERE `id` = '$id'";
    $department = mysqli_query($connection, $selectDepartment);
    $departmentData = mysqli_fetch_assoc($department);
}


?>


<section id="list-departments">
    <div class="container col-md-6">
        <h1 class="text-start fs-4 my-4 fw-bold">Show Deapartment
            <a class="btn btn-dark float-end" href="./index.php">List Departments</a>
        </h1>
        <div class="card shadow p-4 bg-dark text-light">
            <h2 class="text-center"><?= $departmentData['title'] ?></h2>
        </div>
    </div>
</section>

<?php
include_once '../../shared/script.php';
?>