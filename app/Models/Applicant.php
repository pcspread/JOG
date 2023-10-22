<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// SoftDeletes読込
use Illuminate\Database\Eloquest\SoftDeletes;

class Applicant extends Model
{
    use SoftDeletes;
    use HasFactory;

    // 編集可能なカラムの設定
    protected $fillable = [
        'user_id',
        'job_id',
        'appeal',
        'reason',
        'experience',
        'question',
        'answer',
    ];
}
