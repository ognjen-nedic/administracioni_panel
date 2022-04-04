<?php
session_start();
require '../config/auth.php';
include '../config/db_connection.php';

/* Povlačenje podataka o ukupnom broju zaposlenih iz baze */
$sum_employees_query = 'SELECT COUNT("id") FROM zaposleni';
$sum_employees_result =  mysqli_query($connection, $sum_employees_query);
$sum_employees = mysqli_fetch_all($sum_employees_result, MYSQLI_NUM);

/* Povlačenje podataka o prosečnoj plati iz baze */
$average_salary_query = 'SELECT AVG(salary) FROM zaposleni';
$average_salary_result = mysqli_query($connection, $average_salary_query);
$average_salary = mysqli_fetch_assoc($average_salary_result);

/*Povlačenje podataka o rasporedu zaposlenih po pozicijama */
$employees_by_position_query = 'SELECT count(position_id) AS numberInPosition,pozicija_name FROM zaposleni JOIN pozicija ON zaposleni.position_id = pozicija.pozicija_id GROUP BY pozicija_name';
$employees_by_position_result = mysqli_query($connection, $employees_by_position_query);
?>

<!DOCTYPE html>
<html lang="en">
<?php include '../templates/header.php' ?>
<body>
<?php include '../templates/navigation.php' ?>

<div class="container">
    <p>Ukupan broj zaposlenih u kompaniji: <?php echo $sum_employees[0][0]  ?></p>
    <hr>
    <p>Prosečna plata: <?php echo $average_salary['AVG(salary)']  ?> € </p>
    <hr>
    <p>Raspored broja zaposlenih po pozicijama: </p>
    <?php while($row = mysqli_fetch_assoc($employees_by_position_result)) { ?>
        <p><?php echo $row['pozicija_name'] ." : "  .$row['numberInPosition'] ?></p>
    <?php } ?>
    <hr>
</div>

<?php include '../templates/footer.php' ?>
</body>
</html>