<?php
session_start();
require '../config/auth.php';
include '../config/db_connection.php';
include '../classes/zaposleni_klasa.php';


/* Filterovanje zaposlenih prema poziciji */
if(isset($_GET['select_position'])):
    $position = $_GET['select_position'];

    if($position == 'All'):
        $sql = 'SELECT zaposleni.name,surname,email,position_id,salary,zaposleni.id,pozicija.pozicija_name FROM zaposleni JOIN pozicija ON zaposleni.position_id = pozicija.pozicija_id';
    else: 
        $sql = "SELECT zaposleni.name,surname,email,position_id,salary,zaposleni.id,pozicija.pozicija_name FROM zaposleni JOIN pozicija ON zaposleni.position_id = pozicija.pozicija_id WHERE pozicija.pozicija_name = '$position'";
    endif;
else:
    $sql = 'SELECT zaposleni.name,surname,email,position_id,salary,zaposleni.id,pozicija.pozicija_name FROM zaposleni JOIN pozicija ON zaposleni.position_id = pozicija.pozicija_id';
endif;

/* Prikazivanje zaposlenih u tabeli */
$result = mysqli_query($connection, $sql);
$zaposleni = mysqli_fetch_all($result, MYSQLI_ASSOC);

/* Prikupljanje podataka za popularizovanje SELECT opcije za filterovanje */
$pozicije = mysqli_fetch_all(mysqli_query($connection,'SELECT * FROM pozicija'));

/* Brisanje pojedinačnog zaposlenog iz baze */
if(isset($_POST['delete'])):
    $id_to_delete = mysqli_real_escape_string($connection, $_POST['id_to_delete']);
    $sql = "DELETE FROM zaposleni WHERE zaposleni.id = $id_to_delete";
    if(mysqli_query($connection,$sql)):
        header('Location: zaposleni.php');
    else:
        echo 'query error ' .mysqli_error($connection);
    endif;
endif;

/* Oslobađanje memorije od rezultata i konekcije sa bazom*/
mysqli_free_result($result);
mysqli_close($connection);

?>

<!DOCTYPE html>
<html lang="en">
<?php include '../templates/header.php' ?>
<body>
<?php include '../templates/navigation.php' ?>

<div class="container zaposleni__controls">
    <form action="" class='form-select'>
        <select name="select_position" id="" class="form-select__select">
            <option value='All' class="form-select__option">All</option>
            <?php foreach($pozicije as $position):
                echo "<option class='form-select__option' value='{$position[1]}'>$position[1]</option>";
            endforeach; ?>
        </select>
        <input type="submit" value="Filter" class="btn">
    </form>
    <a href="new_employee.php" class="btn">Add new</a>
</div>

<div class="table-container">
    <table class="zaposleni__table">
        <thead>
            <th>Name</th>
            <th>Surname</th>
            <th>E-mail</th>
            <th>Salary</th>
            <th>Pozicija</th>
            <th colspan="2">Options</th>
        </thead>
        <tbody>
            <?php foreach($zaposleni as $row): 
                $radnik = new Zaposleni($row);
                $radnik->prikazi_radnika('lista');
            endforeach; ?>
        </tbody>
    </table>
</div>

<?php include '../templates/footer.php' ?>
</body>
</html>