<?php

namespace App\Layers\Persistence\Repository\Todo;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'cities';

    public $timestamps = false;

    protected $guarded = [];
}
