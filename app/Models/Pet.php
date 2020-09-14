<?php

namespace App\Models;

use App\Models\MongoDB;

class Pet
{
    public $collection = 'pets';

    public function all()
    {
        $database = new MongoDB;
        $pets = $database->all($this->collection);
        return $pets;
    }

}
