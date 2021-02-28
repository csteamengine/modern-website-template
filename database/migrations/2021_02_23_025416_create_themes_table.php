<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('themes', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('title');
            $table->string('github_url')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('tiktok_url')->nullable();
            $table->text('description')->nullable();
            $table->longText('page_content')->nullable();
            $table->string('resume_file_id')->nullable();
            $table->integer('background_image_id')->nullable();
            $table->integer('about_image_id')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->boolean('is_maintenance_mode')->default(false);
            $table->boolean('contact_active')->default(true);
            $table->boolean('resume_active')->default(true);
            $table->boolean('background_video_active')->default(false);
            $table->string('primary_color')->default('#FFFFFF');
            $table->string('secondary_color')->default('#000000');
            $table->string('background_color')->default('#000000');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('themes');
    }
}
