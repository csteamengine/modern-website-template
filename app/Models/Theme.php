<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Theme extends Model implements HasMedia
{
    use HasFactory,
        InteractsWithMedia;

    protected $casts = [
        'is_active' => 'boolean',
        'is_maintenance_mode' => 'boolean',
        'contact_active' => 'boolean',
        'resume_active' => 'boolean',
        'background_video_active' => 'boolean',
    ];

    protected $fillable = [
        'title',
        'first_name',
        'last_name',
        'description',
        'page_content',
        'email',
        'is_active',
        'order',
        'resume_file_id',
        'background_image_id',
        'about_image_id',
        'is_maintenance_mode',
        'contact_active',
        'resume_active',
        'background_video_active',
        'background_image_id',
        'resume_file_id',
        'about_image_id',
        'primary_color',
        'secondary_color',
        'background_color',
    ];
}
