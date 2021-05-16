<?php 

class Profile  
{
    private $id;
    private $name;
    private $firstName;
    private $birthday;
    private $picture;
    private $cv;

    public function __construct(int $id, string $name, string $firstName, string $birthday, string $picture, string $cv) {
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
        $age = date('Y') - $this->birthday; 
        if (date('md') < date('md', strtotime($this->birthday))) { 
            return $age - 1; 
        } 
        return $age; 
    }
}
