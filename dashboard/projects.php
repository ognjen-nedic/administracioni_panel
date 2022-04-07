<?php
session_start();
require '../config/auth.php';
include '../config/db_connection.php';
include '../classes/Tasks.php';


$projects_query = 'SELECT project_name, task_description, name, task_deadline,task_id FROM zadatak JOIN projekat ON zadatak.project_foreign_id = projekat.project_id JOIN zaposleni ON zadatak.employee_foreign_id = zaposleni.id ORDER BY task_deadline ASC';
$projects_result =  mysqli_query($connection, $projects_query);
$projects = mysqli_fetch_all($projects_result, MYSQLI_ASSOC);

//var_dump($projects['project_name']);

?>

<!DOCTYPE html>
<html lang="en">
<?php include '../templates/header.php' ?>
<body>
<?php include '../templates/navigation.php' ?>

<div class="table-container">
    <table class="projects__table">
        <thead>
            <th>Project name</th>
            <th>Task</th>
            <th>Responsible</th>
            <th>Deadline</th>
            <th style="text-align: center;">Urgency</th>
        </thead>
        <tbody>
            <?php foreach($projects as $row):
                $task = new Task($row);
                $task->prikazi_zadatak('lista');
            endforeach; ?>
        </tbody>
    </table>
</div>

<?php include '../templates/footer.php' ?>
</body>
</html>