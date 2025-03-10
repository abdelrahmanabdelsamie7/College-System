<?php
// Styling 
include_once '../../shared/header.php';
include_once '../../shared/navbar.php';
// From Vendor To Get Connection Of Database
include_once '../../vendor/config.php';


if(isset($_GET['id'])){
    $id = $_GET['id'] ; 
    $selectInstructor = "SELECT * FROM `instructors` WHERE `id` = '$id' " ; 
    $instructor = mysqli_query($connection , $selectInstructor) ; 
    $instructorData = mysqli_fetch_assoc($instructor) ;
    $departmentId = $instructorData['department_id'] ; 
    // Selelct Department ? -> instructor"department_id"
    $selectDepartment = "SELECT * FROM `departments` WHERE `id` = '$departmentId' " ; 
    $department = mysqli_query($connection , $selectDepartment) ; 
    $departmentData = mysqli_fetch_assoc($department) ;
    mysqli_close(mysql: $connection);
}
?>
<section id="show-instructor">
    <div class="container col-md-6">
        <h1 class="text-start fs-4 my-4 fw-bold">Show Instructor
            <a class="btn btn-dark float-end" href="./index.php">List Instructors</a>
        </h1>
        <div class="card shadow p-4 bg-dark text-light">
            <h2 class="text-center">Name : <?= $instructorData['name'] ?></h2>
            <h2 class="text-center">Email : <?= $instructorData['email'] ?></h2>
            <h2 class="text-center">Hire Date : <?= $instructorData['hire_date'] ?></h2>
            <h2 class="text-center">Department : <?= $departmentData['title']?></h2>
        </div>
    </div>
</section>

<?php
include_once '../../shared/script.php';
?>