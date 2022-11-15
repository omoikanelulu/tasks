<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    /**
     * 変更を加えたくないカラムを保護する
     *
     * @var array
     */
    protected $guarded = [
        'id',
        'user_id',
    ];

    /**
     * リレーション
     */
    public function User()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
