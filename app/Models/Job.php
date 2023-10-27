<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// SoftDeletes読込
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use HasFactory;
    use SoftDeletes;

    // 編集可能なカラムの設定
    protected $fillable = [
        'user_id',
        'genre_id',
        'area_id',
        'name',
        'content',
        'email',
        'tel',
        'salary',
        'time',
        'shift',
        'location',
    ];

    /**
     * リレーション設定
     * @param void
     * @return object
     */
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    /**
     * リレーション設定
     * @param void
     * @return object
     */
    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    /**
     * リレーション設定
     * @param void
     * @return object
     */
    public function applicants()
    {
        return $this->hasMany(Applicant::class);
    }

    /**
     * scope検索(エリア)
     * @param $query,$area
     * @return object
     */
    public function scopeAreaSearch($query, $area) {
        if (!empty($area)) {
            return $query->where('area_id', $area);
        }
    }

    /**
     * scope検索(ジャンル)
     * @param void
     * @return object
     */
    public function scopeGenreSearch($query, $genre) {
        if (!empty($genre)) {
            return $query->where('genre_id', $genre);
        }
    }
}
