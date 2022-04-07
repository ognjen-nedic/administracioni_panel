<?php

class Filtering {
    private $position = 'All';

    public function setPosition(STRING $selectInputName) {
        $this->position = $_GET[$selectInputName];
    }
}

?>