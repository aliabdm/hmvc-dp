<?php

namespace Modules\Content\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Content\Database\factories\ContentTypeFactory;

class ContentType extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $guarded = [];

    protected static function newFactory(): ContentTypeFactory
    {
        return ContentTypeFactory::new();
    }

    public function contents()
    {
        return $this->hasMany(Content::class);
    }
}
