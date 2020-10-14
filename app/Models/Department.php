<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'depart_name',
        'depart_desc',
        'depart_status',
        'ref_id'
    ];

    public function parent()
    {
        return $this->belongsTo(self::class,'ref_id');
    }
}
