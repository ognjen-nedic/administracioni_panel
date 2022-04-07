<?php

class Dropdown {
    public static function Positions($connection) {
       $positions = mysqli_fetch_all(mysqli_query($connection,'SELECT pozicija_id, pozicija_name FROM pozicija'));
       return $positions;
    }

    public static function Projects($connection) {
        $projects = mysqli_fetch_all(mysqli_query($connection,'SELECT project_id, project_name FROM projekat'));
        return $projects;
    }

    public static function Employees($connection) {
        $employees = mysqli_fetch_all(mysqli_query($connection,'SELECT id,name,surname FROM zaposleni'));
        return $employees;
    }
}

?>