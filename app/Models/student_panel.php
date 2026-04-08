<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student_panel extends Model
{
    use HasFactory;

    protected $table = 'student_panels';   
    protected $primaryKey = 'id';
    public $timestamps = false;
}
