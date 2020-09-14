<?php

namespace App\Models;

use MongoDB\Driver\Exception\Exception;
use MongoDB\Client as Client;

class MongoDB
{
    public function all($collection)
    {
        try {
            $connection = new Client('mongodb+srv://Admin:Admin123@cluster0.qcqfn.mongodb.net/storage?retryWrites=true&w=majority');
            $collectionData = $connection->storage->$collection;
            $items = $collectionData->find();

            foreach($items as $item)
            {
                return $item->$collection;
            }
        }
        catch (Exception $error) {
            $errorArray = [
                'Connection Error'
            ];
            return $errorArray;
        }
    }
}
?>
