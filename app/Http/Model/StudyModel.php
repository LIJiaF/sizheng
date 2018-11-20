<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class StudyModel extends Model
{
    protected $table='study';
    protected $primaryKey='stu_id';
    public $timestamps=false;
    protected $guarded=[];
}
