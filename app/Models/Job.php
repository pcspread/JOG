<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// SoftDeletes読込
use Illuminate\Database\Eloquest\SoftDeletes;

class Job extends Model
{
    use HasFactory;
    use SoftDeletes;

    // 編集可能なカラムの設定
    protected $fillable = [
        'user_id',
        'genre_id',
        'location_id',
        'name',
        'content',
        'email',
        'tel',
        'salary',
        'time',
        'shift',
    ];
}
