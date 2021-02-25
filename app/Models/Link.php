<?php

namespace App\Models;

use App\Models\Traits\LinkRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Link extends Model implements HasMedia
{
    use SoftDeletes,
        HasFactory,
        InteractsWithMedia,
        LinkRelationship;

    protected $table = 'links';

    protected $fillable = [
        'title',
        'url',
        'description',
        'start_date',
        'end_date',
        'is_active',
        'order',
    ];

}
