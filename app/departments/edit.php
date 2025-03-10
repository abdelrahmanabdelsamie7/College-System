<?php
// Style 
include_once '../../shared/header.php';
include_once '../../shared/navbar.php';
// Connect To Data Base
include_once "../../vendor/config.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $selectDepartment = "SELECT * FROM `departments` WHERE `id` = '$id'";
    $department = mysqli_query($connection, $selectDepartment);
    $departmentData = mysqli_fetch_assoc($department);
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $title = $_POST['title'] ; 
        $updateRow = "UPDATE `departments` SET `title` = '$title'  WHERE `id` = '$id'" ; 
        mysqli_query($connection , $updateRow) ;
        header("Location:http://localhost/College-System/app/departments/show.php?id=$id" ) ;   
    }
}
?>

<section id="edit-department">
    <div class="container col-md-6">
        <h1 class="text-start fs-4 my-4 fw-bold">Edit Department
            <a class="btn btn-dark float-end" href="./index.php">List Departments</a>
        </h1>
        <div class="card p-4 bg-dark text-light">
            <form method="POST">
                <div class="form-group">
                    <label for="title">Edit Title : </label>
                    <input type="text" value="<?=$departmentData['title'] ?>" name="title" id="title"
                        class="form-control">
                </div>
                <button class="btn btn-light mt-2 mx-auto d-block">Edit</button>
            </form>
        </div>
    </div>
</section>

<?php
include_once '../../shared/script.php';
?>