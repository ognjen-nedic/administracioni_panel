<?php
session_start();
require '../config/auth.php';
include '../config/db_connection.php';
include '../classes/zaposleni_klasa.php';


//Check GET request ID perameter
if(isset($_GET['id'])):
    $id = mysqli_real_escape_string($connection, $_GET['id']);
    $sql = "SELECT * FROM zaposleni JOIN pozicija ON zaposleni.position_id = pozicija.pozicija_id WHERE zaposleni.id = $id ";
    $results = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($results);
endif;



if(isset($_POST['new']) ) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $salary = $_POST['salary'];
    
    $sql = "UPDATE zaposleni SET zaposleni.name='$name', surname='$surname', email='$email', salary='$salary' WHERE zaposleni.id = $id";
    mysqli_query($connection, $sql);
    header('Location: zaposleni.php');
}

// Free memory
if(isset($_GET['id'])):
mysqli_free_result($results);

// Close the connection to the database
mysqli_close($connection);
endif;
?>

<!DOCTYPE html>
<html lang="en">
<?php include '../templates/header.php' ?>
<body>
<?php include '../templates/navigation.php' ?>

<div class="container">
    <h2>Edit employee</h2>
    <?php
    if(isset($_GET['id'])):
        $radnik = new Zaposleni($row);
        $radnik->prikazi_radnika('edit');
    else:
        echo '<h2>No employee with that name.</h2>';
    endif;
    ?>
</div>

<?php include '../templates/footer.php' ?>
</body>
</html>