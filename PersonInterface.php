<?php

interface PersonInterface
{

    /**
    * @param $name
    * @return void
    */
    public function setName($name);

    /**
    * @param $birth_date
    * @return void
    */
    public function setBirthDate($birth_date);

    /**
    * @param $gender
    * @return void
    */
    public function setGender($gender);

    /**
    * @param $interest
    * @return void
    */
    public function setInterest($interest);

}
