<?php

class Donor extends Person implements PersonInterface
{
    protected $to_attend;
    
    public function attendEvent($event)
    {
        $event->addAttendee([
            'name'=>$this->name,
            'birth_date'=>$this->birth_date,
            'gender'=>$this->gender,
            'interests'=>$this->interests,
        ]);
        $this->to_attend = $event;
    }
    
    public function printJson()
    {
        echo json_encode([
            'name'=>$this->name,
            'birth_date'=>$this->birth_date,
            'gender'=>$this->gender,
            'interests'=>$this->interests,
        ]);
    }
}

