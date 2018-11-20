<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class TeacherModel extends Model
{
    protected $table='teacher';
    protected $primaryKey='tea_id';
    public $timestamps=false;
    protected $guarded=[];
}
