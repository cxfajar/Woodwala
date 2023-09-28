<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ads extends Model
{
    use HasFactory;
    protected $table="ads";
    protected $fillable = array('title','img','quantity', 'price', 'description','status','post_by','hired_user','type','ad_status');
}
