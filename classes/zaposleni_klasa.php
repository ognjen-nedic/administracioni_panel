<?php

class Zaposleni {
    public $name;
    public $surname;
    public $email;
    public $position;
    public $salary;
    public $id;
    public $display;

    function __construct($row){
        $this->name = $row['name'];
        $this->surname = $row['surname'];
        $this->email = $row['email'];
        $this->salary = $row['salary'];
        $this->id = $row['id'];
        $this->position = $row['pozicija_name'];
    }
    
    public function prikazi_radnika($type) {
        if($type=='lista'):
            if($this->position == 'administrator'):
                $this->display = 'none';
            endif;
            echo 
        "<tr>
            <td>$this->name</td>
            <td>$this->surname</td>
            <td>$this->email</td>
            <td>$this->salary €</td>
            <td>$this->position</td>
            <td style='width:60px'><a href='edit_employee.php?id=$this->id' class='btn'>Edit</a></td>
            <td>
            <form style='display : $this->display' name='delete' action='' method='POST'>
                <input type='hidden' name='id_to_delete' value='$this->id' >
                <input type='submit' name='delete' value='Delete' class='btn'>
            </form>
        </td>
        </tr>";
        endif;
        if($type=='edit'):
            echo
            "<form name='edit_form' method='POST' action='' class='zaposleni__edit-form'>
                <input type='hidden' name='new' value='1' />
                <input name='id' type='hidden' value='$this->id' />
                <input type='text' name='name' value='$this->name' class='zaposleni__edit-form__input-field'/>
                <input type='text' name='surname' value='$this->surname' class='zaposleni__edit-form__input-field'/>
                <input type='text' name='email' value='$this->email' class='zaposleni__edit-form__input-field'/>
                <input type='text' name='salary' value='$this->salary' class='zaposleni__edit-form__input-field'/>
                <div>
                    <a href='../dashboard/zaposleni.php' class='cancel-btn' >Cancel</a>
                    <input type='submit' name='submit' value='Update' class='btn'/>
                </div>
            </form>";
        endif;     
    }
    
}

?>