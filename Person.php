<?php

abstract class Person implements PersonInterface
{
    protected $name;
    protected $birth_date;
    protected $gender;
    protected $interests = [];

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setBirthDate($birth_date)
    {
        $this->birth_date = date('Y-m-d', strtotime($birth_date .' -10 years'));
    }

    public function setGender($gender)
    {
        $this->gender = $gender;
    }
    
    public function setInterest($interest)
    {
        $this->interests[] = $interest;
    }
}
