<?php

namespace App\Models;

use App\Models\Traits\LinkRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

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

    /**
     * @param Media|null $media
     * @throws InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(368)
            ->height(232)
            ->sharpen(10);
    }
}
