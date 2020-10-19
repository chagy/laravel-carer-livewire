<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryCarer extends Model
{
    use HasFactory;

    protected $fillable = [
        'cc_name',
        'cc_desc',
        'cc_status'
    ];
}
