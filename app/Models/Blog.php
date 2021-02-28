<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Blog extends Model implements HasMedia
{
    use HasFactory,
        InteractsWithMedia;

    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected $fillable = [
        'title',
        'author_id',
        'short_description',
        'tags',
        'description',
        'page_content',
        'external_url',
        'is_active',
        'order',
        'started_at',
        'finished_at',
    ];
}
