<?php

namespace App\Model\Entity;

use DateTime;

class Profile
{
    private $id;
    private $name;
    private $firstName;
    private $birthday;
    private $picture;
    private $cv;

    public function __construct(int $id, string $name, string $firstName, string $birthday, string $picture, string $cv = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->firstName = $firstName;
        $this->birthday = $birthday;
        $this->picture = $picture;
        $this->cv = $cv;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getBirthday()
    {
        return $this->birthday;
    }

    public function getPicture()
    {
        return $this->picture;
    }

    public function getCv()
    {
        return $this->cv;
    }

    public function birthdayToAge()
    {
        //Create a DateTime object using the user's date of birth.
        $birthDate = new DateTime($this->birthday);

        //We need to compare the user's date of birth with today's date.
        $now = new DateTime();

        //Calculate the time difference between the two dates.
        $difference = $now->diff($birthDate);

        //Get the difference in years, as we are looking for the user's age.
        $age = $difference->y;

        return $age;
    }
}
