<?php

namespace App\Model\Entity;

use App\Model\Entity\Activity;

class Course extends Activity
{
    public function __construct(int $id, string $title, string $date, string $picture)
    {
        parent::__construct($id, $title, $date, $picture);
    }
}
