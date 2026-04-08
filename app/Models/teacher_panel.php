<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teacher_panel extends Model
{
    use HasFactory;

    protected $table = 'teacher_panels';   // ✅ image ke hisaab se
    protected $primaryKey = 'id';
    public $timestamps = false;
}
