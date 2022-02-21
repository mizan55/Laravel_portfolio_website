<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseModel extends Model
{
       Protected $table ='courses';
       Protected $primarykey ='id';
       public $incrementing =true;
       Protected $keyType  = 'int';
       public $timestamps =false;
}
