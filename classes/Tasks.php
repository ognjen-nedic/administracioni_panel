<?php

class Task {
    public $project_name;
    public $task_description;
    public $responsible;
    public $task_deadline;
    public $task_id;
    private $urgency;

    function __construct($row){
        $this->project_name = $row['project_name'];
        $this->task_description = $row['task_description'];
        $this->responsible = $row['name'];
        $this->task_deadline = $row['task_deadline'];
        $this->task_id = $row['task_id'];
        if($this->task_deadline <= date("Y-m-d", strtotime("+3 day"))):
            $this->urgency = 'red';
            elseif($this->task_deadline >= date("Y-m-d", strtotime("+3 day")) && $this->task_deadline <= date("Y-m-d", strtotime("+5 day"))):
                $this->urgency = 'yellow';
            else: $this->urgency = 'green';
        endif;
    }

    public function prikazi_zadatak($type) {
        if($type=='lista'):
        echo 
        "<tr>
            <td>$this->project_name</td>
            <td>$this->task_description</td>
            <td>$this->responsible</td>
            <td>$this->task_deadline</td>
            <td class='urgency-column'><span class='urgency-circle urgency-$this->urgency' ></span><td>
        </tr>";
        endif;
        /* if($type=='edit'):
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
        endif;  */    
    }

}

?>