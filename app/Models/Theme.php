<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Theme extends Model implements HasMedia
{
    use HasFactory,
        InteractsWithMedia,
        SoftDeletes;

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
        'phone',
        'is_active',
        'order',
        'github_url',
        'facebook_url',
        'instagram_url',
        'twitter_url',
        'youtube_url',
        'tiktok_url',
        'is_maintenance_mode',
        'contact_active',
        'resume_active',
        'background_video_active',
        'primary_color',
        'secondary_color',
        'background_color',
    ];

    /**
     * @param Theme $theme
     * @return bool
     */
    public function activateTheme()
    {
        Theme::where('id', '!=', $this->id)->update(['is_active' => false]);

        $this->is_active = true;
        $updateSuccess = $this->save();

        if ($updateSuccess) {
            //Make artisan calls if necessary
            if ($this->is_maintenance_mode) {
                //System helper function I created
                maintenance_mode();
            } else {
                live_mode();
            }
        }

        return $updateSuccess;
    }

    /**
     * Gets the resume file if there is one.
     */
    public function resume()
    {
        return $this->getMedia('resumes')->last();
    }

    /**
     * Gets the background image if there is one.
     */
    public function background_image()
    {
        return $this->getMedia('background_images')->last();
    }

    /**
     * Gets the about image if there is one.
     */
    public function about_image()
    {
        return $this->getMedia('about_images')->last();
    }

    /**
     * @return mixed
     */
    public function favicon()
    {
        return $this->getMedia('favicons')->last();
    }

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
