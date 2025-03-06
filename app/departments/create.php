<?php
// Styling 
include_once '../../shared/header.php';
include_once '../../shared/navbar.php';
// From Vendor To Get Connection Of Database
include_once '../../vendor/config.php';
$msg = null;
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $addDepartment = "INSERT INTO `departments` (`title`) VALUES ('$title')";
    mysqli_query($connection, $addDepartment);
    $msg = 'Department Added Successfully ';
}
?>


<section id="add-department">
    <div class="container col-md-6">
        <h1 class="text-start fs-4 my-4 fw-bold">Add Department
            <a class="btn btn-dark float-end" href="./index.php">List Departments</a>
        </h1>
        <div class="card shadow p-4 bg-dark text-light">
            <?php if ($msg != null): ?>
            <div class="alert alert-success text-center fw-bold">
                <h5><?= $msg ?></h5>
            </div>
            <?php endif ?>
            <form method="post">
                <div class="form-group">
                    <label for="title">Enter Title Of Department :</label>
                    <input type="text" name="title" id="title" class="form-control">
                </div>
                <button type="submit" name="submit" class="btn btn-light mt-2 mx-auto d-block">Add Now</button>
            </form>
        </div>
    </div>
</section>

<?php
include_once '../../shared/script.php';
?>