<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailGroup extends Model
{
    use HasFactory;

    protected $table = 'email_group';

    protected $fillable = [
        'group_id',
        'group_name',
    ];
}
