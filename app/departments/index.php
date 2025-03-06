<?php
// Styling 
include_once '../../shared/header.php' ; 
include_once '../../shared/navbar.php' ; 
// From Vendor To Get Connection Of Database
include_once '../../vendor/config.php' ;
// Select All Departments ->  SELECT * FROM `departments`; 
$selectDepartments = "SELECT * FROM `departments`" ; 
$departments = mysqli_query($connection , $selectDepartments);
?>


<section id="list-departments">
    <div class="container col-md-6">
        <h1 class="text-start fs-4 my-4 fw-bold">List Deapartments
            <a class="btn btn-dark float-end" href="./create.php">Add Department</a>
        </h1>
        <div class="card shadow p-4">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  foreach($departments as $department) : ?>
                    <tr>
                        <td>
                            <?= $department['id'] ?>
                        </td>
                        <td>
                            <?= $department['title'] ?>
                        </td>
                        <td>
                            <a href="./show.php?id=<?= $department['id'] ?>">show</a>
                        </td>
                    </tr>
                    <?php  endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php
include_once '../../shared/script.php' ; 
?>