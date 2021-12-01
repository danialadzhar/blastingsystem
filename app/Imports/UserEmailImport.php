<?php

namespace App\Imports;

use App\Models\UserEmail;
use Maatwebsite\Excel\Concerns\ToModel;

class UserEmailImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new UserEmail([
            'name'     => $row[0],
            'email'    => $row[1], 
            'group_id' => $row[2],
        ]);
    }
}
