<nav>
    <div class="navigation">
        <a href="../dashboard/dashboard.php"><strong style="font-size:25px; cursor: default" >kaɪrən </strong></a>
        <a href="zaposleni.php">Zaposleni</a>
        <a>E-mail: <?php echo $_SESSION['email'] ?></a>
        <div class="dropdown">
            <button class="dropbtn">Projekti &#9661; </button>
            <div class="dropdown-content">
                <a href="projects.php">Prikaži projekte</a>
                <a href="new_project.php">Kreiraj projekat</a>
                <a href="new_task.php">Kreiraj zadatak</a>
            </div>
        </div>
        <a href="../config/logout.php">Izloguj se</a>
    </div>
</nav>