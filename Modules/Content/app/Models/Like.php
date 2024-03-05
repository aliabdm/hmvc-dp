<?php

namespace Modules\Content\app\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Modules\Content\app\Models\Content;
use Modules\Content\Database\factories\LikeFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Like extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];

    public function content()
    {
        return $this->belongsTo(Content::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
