<?php

class Owner extends Person implements PersonInterface
{
    public function getName()
    {
        return $this->name;
    }
    
    public function printJson()
    {
        echo json_encode([
            'name'=>$this->name,
            'birth_date'=>$this->birth_date,
            'gender'=>$this->gender,
            'interests'=>$this->interests
        ]);
    }
}

