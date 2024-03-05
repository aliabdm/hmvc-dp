<?php

namespace Modules\Content\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Content\database\factories\ContentFactory;

class Content extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];

    protected static function newFactory(): ContentFactory
    {
        return ContentFactory::new();
    }

    public function contentType()
    {
        return $this->belongsTo(ContentType::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
