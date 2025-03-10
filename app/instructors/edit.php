<?php
// Style 
include_once '../../shared/header.php';
include_once '../../shared/navbar.php';
// Connect To Data Base
include_once "../../vendor/config.php";


// Select All Department عشان يختار هو هيعدل في اي ؟ 
$selectDepartments = "SELECT * FROM `departments`";
$departments = mysqli_query($connection, $selectDepartments);
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $selectInstructor = "SELECT * FROM `instructors` WHERE `id` = '$id'";
    $instructor = mysqli_query($connection, $selectInstructor);
    $instructorData = mysqli_fetch_assoc($instructor);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $hire_date = $_POST['hire_date'];
        $department_id = $_POST['department_id'];
        $editInstructor = "UPDATE `instructors` SET `name`= '$name',`email`='$email',`hire_date` ='$hire_date' , `department_id` = '$department_id'
        WHERE `id` ='$id'";
        mysqli_query($connection , $editInstructor);
        header("Location:http://localhost/College-System/app/instructors/show.php?id=$id") ;
     }
}
mysqli_close($connection);
?>

<section id="edit-instructor">
    <div class="container col-md-6">
        <h1 class="text-start fs-4 my-4 fw-bold">Edit Instructor
            <a class="btn btn-dark float-end" href="./index.php">List Instructors</a>
        </h1>
        <div class="card p-4 bg-dark text-light">
            <form method="POST">
                <div class="form-group">
                    <label for="name">Edit Name : </label>
                    <input type="text" value="<?= $instructorData['name'] ?>" name="name" id="name"
                        class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Edit email : </label>
                    <input type="email" value="<?= $instructorData['email'] ?>" name="email" id="email"
                        class="form-control">
                </div>
                <div class="form-group">
                    <label for="title">Edit hire_date : </label>
                    <!-- yyyy-mm-dd -->
                    <input type="date" value="<?= $instructorData['hire_date'] ?>" name="hire_date" id="hire_date"
                        class="form-control">
                </div>
                <div class="form-group">
                    <label for="department_id">Edit Department : </label>
                    <select name="department_id" id="department_id" class="form-control">
                        <option disabled selected hidden>select Department</option>
                        <?php foreach ($departments as $department): ?>
                        <?php if ($department['id'] == $instructorData['department_id']): ?>
                        <option selected value="<?= $department['id'] ?>"> <?= $department['title'] ?> </option>
                        <?php else: ?>
                        <option value="<?= $department['id'] ?>"><?= $department['title'] ?></option>
                        <?php endif; ?>
                        <?php endforeach ?>
                    </select>
                </div>
                <button class="btn btn-light mt-2 mx-auto d-block">Edit</button>
            </form>
        </div>
    </div>
</section>

<?php
include_once '../../shared/script.php';
?>