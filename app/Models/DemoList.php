<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemoList extends Model
{
    use HasFactory;

    protected $table = 'demo_lists';
    protected $primaryKey = 'TaskId';
    protected $fillable = [
        'TaskName',
        'TaskAbout',
        'TaskStatus',
        'TaskDelete',
    ];

    public $timestamps = true;
}
