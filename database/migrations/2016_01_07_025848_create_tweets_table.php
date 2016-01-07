<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTweetsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tweets', function(Blueprint $table)
        {
            $table->bigIncrements('id')->unsigned();
            $table->string('tweet_id', 50);
            $table->string('text', 300)->nullable();
            $table->integer('retweet_count')->default(0);
            $table->integer('favorite_count')->default(0);
            $table->text('hashtag')->nullable();
            $table->text('mention')->nullable();
            $table->decimal('latitude', 9, 6)->nullable();
            $table->decimal('longitude', 9, 6)->nullable();
            $table->string('user_id', 50)->nullable();
            $table->string('user_name', 60)->nullable();
            $table->string('query', 100)->nullable();
            $table->boolean('purhcase_action')->default(false);
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
        Schema::drop('tweets');
    }

}
