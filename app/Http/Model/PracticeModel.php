<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class PracticeModel extends Model
{
    protected $table='practice';
    protected $primaryKey='pra_id';
    public $timestamps=false;
    protected $guarded=[];
}
