<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Position extends Model implements HasMedia
{
    use HasFactory,
        InteractsWithMedia;

    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected $fillable = [
        'title',
        'company',
        'description',
        'short_description',
        'description',
        'page_content',
        'order',
        'is_active',
        'start_date',
        'end_date',
    ];
}
