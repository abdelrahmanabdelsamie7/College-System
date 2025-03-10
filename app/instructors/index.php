<?php
// Styling 
include_once '../../shared/header.php';
include_once '../../shared/navbar.php';
// From Vendor To Get Connection Of Database
include_once '../../vendor/config.php';
$counter = 0; 

// Select All Instructors ? 
$selectInstructors = "SELECT * FROM `instructors` " ;
$instructors = mysqli_query($connection , $selectInstructors) ; 

if(isset($_GET['id'])){
    $id = $_GET['id'] ; 
    $deleteInstructor = "DELETE FROM `instructors` WHERE `id` = '$id'" ; 
    mysqli_query($connection , $deleteInstructor);
    header("Location:http://localhost/College-System/app/instructors") ;
}
mysqli_close($connection);


 ?>


<section id="list-instructors">
    <div class="container col-md-6">
        <h1 class="text-start fs-4 my-4 fw-bold">List Instructors
            <a class="btn btn-dark float-end" href="./create.php">Add Instructor</a>
        </h1>
        <div class="card shadow p-4">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th colspan="3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($instructors as $instructor): ?>
                    <tr>
                        <td><?= ++ $counter ;  ?></td>
                        <td><?= $instructor['name'] ?></td>
                        <td>
                            <a href="show.php?id=<?= $instructor['id'] ?>"><i class="fa-solid fa-eye"></i></a>
                        </td>
                        <td>
                            <a href="./edit.php?id=<?= $instructor['id'] ?>"><i
                                    class="fa-solid fa-pen text-warning"></i></a>
                        </td>
                        <td>
                            <a href="./index.php?id=<?= $instructor['id'] ?>"
                                onclick="return confirm('Are You Sure You Want To Delete Instructor ? ')"><i
                                    class="fa-solid fa-trash text-danger"></i></a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php
include_once '../../shared/script.php';
?>