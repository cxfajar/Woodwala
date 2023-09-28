<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class totalresponses extends Model
{
    use HasFactory;
    protected $table = "totalresponses";
    protected $fillable = array('total_res','ad_id');
}
