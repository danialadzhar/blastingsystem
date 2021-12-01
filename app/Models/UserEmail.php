<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserEmail extends Model
{
    use HasFactory;

    protected $table = 'user_email';

    protected $fillable = [
        'name',
        'email',
        'group_id'
    ];
}
