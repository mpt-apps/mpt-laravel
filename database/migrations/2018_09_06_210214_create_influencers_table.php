<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfluencersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('influencers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('job_position_id')->default(0);
            $table->string('political_position_id')->default('');
            $table->integer('political_party_id')->default(0);
            $table->string('country_id', 3)->default('');
            $table->integer('state_id')->default(0);
            $table->integer('city_id')->default(0);
            $table->string('screen_name')->unique();
            $table->string('name')->default('');
            $table->string('twitter_id')->unique();
            $table->string('twitter_screen_name')->unique();
            $table->string('twitter_name')->default('');
            $table->text('twitter_description')->nullable();
            $table->string('twitter_personal_url')->nullable();
            $table->string('twitter_url')->default('');
            $table->integer('twitter_followers_count')->default(0);
            $table->integer('twitter_friends_count')->default(0);
            $table->integer('twitter_statuses_count')->default(0);
            $table->string('twitter_image_normal_url')->default('');
            $table->string('twitter_image_url')->default('');
            $table->integer('active')->default(1);
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
        Schema::dropIfExists('influencers');
    }
}
