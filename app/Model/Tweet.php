<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model {

    protected $fillable = [
        'tweet_id',
        'text',
        'retweet_count',
        'favorite_count',
        'hashtag',
        'mention',
        'latitude',
        'longitude',
        'user_id',
        'user_name',
        'query',
        'purchase_action',
    ];

}
