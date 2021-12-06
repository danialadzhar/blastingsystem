<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailCron extends Model
{
    use HasFactory;
    
    protected $table = 'email_cron';

    protected $fillable = [
        'email_id',
        'subject',
        'email_content',
        'group_id',
        'email_from',
        'name_from',
        'support_file',
    ];
}
