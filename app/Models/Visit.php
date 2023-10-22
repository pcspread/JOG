<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;

    // 編集可能なカラムの設定
    protected $fillable = [
        'job_id',
        'count',
    ];
}
