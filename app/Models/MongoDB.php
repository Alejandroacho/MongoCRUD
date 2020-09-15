<?php

namespace App\Models;
use MongoDB\Client as Client;

class MongoDB
{
   public static function connect()
    {
        return new Client("mongodb://localhost:27017");
    }
}
?>
