<?php
// Style 
include_once '../../shared/header.php';
include_once '../../shared/navbar.php';
// Connect To Data Base
include_once "../../vendor/config.php";


// Select All Department عشان يختار هو هيعدل في اي ؟ 
$selectDepartments = "SELECT * FROM `departments`";
$departments = mysqli_query($connection, $selectDepartments);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $hire_date = $_POST['hire_date'];
        $department_id = $_POST['department_id'];
        $addInstructor = "INSERT INTO `instructors` (`name` , `email`,`hire_date`,`department_id`)
        VALUES('$name' , '$email' , '$hire_date' , '$department_id') 
        " ; 
        mysqli_query($connection , $addInstructor);
        header("Location:http://localhost/College-System/app/instructors/") ;
     }

mysqli_close($connection);
?>

<section id="edit-instructor">
    <div class="container col-md-6">
        <h1 class="text-start fs-4 my-4 fw-bold">Add Instructor
            <a class="btn btn-dark float-end" href="./index.php">List Instructors</a>
        </h1>
        <div class="card p-4 bg-dark text-light">
            <form method="POST">
                <div class="form-group">
                    <label for="name">Add Name : </label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Add email : </label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="title">Add hire_date : </label>
                    <!-- yyyy-mm-dd -->
                    <input type="date" name="hire_date" id="hire_date" class="form-control">
                </div>
                <div class="form-group">
                    <label for="department_id">Add Department : </label>
                    <select name="department_id" id="department_id" class="form-control">
                        <option disabled selected hidden>select Department</option>
                        <?php foreach ($departments as $department): ?>
                        <option value="<?= $department['id'] ?>"><?= $department['title'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <button class="btn btn-light mt-2 mx-auto d-block">Add Now</button>
            </form>
        </div>
    </div>
</section>

<?php
include_once '../../shared/script.php';
?>