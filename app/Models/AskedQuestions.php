<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AskedQuestions extends Model
{
    use HasFactory;
    protected $table = 'asked_questions';
    protected $guarded =[];

}