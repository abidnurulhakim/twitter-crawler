<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Model\Tweet;
use Abraham\TwitterOAuth\TwitterOAuth;

class CrawlerController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('crawler.index');
    }

    public function crawling(Request $request)
    {
        $query = $request->input('query');
        $resultType = strtolower($request->input('result-type', 'recent'));
        $latitude = $request->input('latitude', -6.208763);
        $longitude = $request->input('longitude', 106.845599);
        $range = $request->input('range', 25);
        $connection = new TwitterOAuth(env('TWITTER_CONSUMER_KEY'), env('TWITTER_CONSUMER_SECRET'), env('TWITTER_ACCESS_TOKEN'), env('TWITTER_ACCESS_TOKEN_SECRET'));
        $statuses = $connection->get('search/tweets', [
            'q' => $query,
            'result_type' => $resultType,
            'count' => 100,
            'geocode' => $latitude.','.$longitude.','.$range.'mi',
        ]);
        $status = 201;
        $count_tweet = 0;
        if ($statuses->statuses) {
            $status = 200;
            $tweets = $statuses->statuses;
            for ($i=0; $i < sizeof($tweets); $i++) {
                if (Tweet::where('tweet_id', $tweets[$i]->id_str)->where('query', trim(strtolower($query)))->count() < 1) {
                    $tweet = new Tweet();
                    $tweet->tweet_id = $tweets[$i]->id_str;
                    $tweet->text = $tweets[$i]->text;
                    $tweet->retweet_count = $tweets[$i]->retweet_count;
                    $tweet->favorite_count = $tweets[$i]->favorite_count;
                    $tweet->latitude = ($tweets[$i]->geo) ? $tweets[$i]->geo->coordinates[0] : -6.208763;
                    $tweet->longitude = ($tweets[$i]->geo) ? $tweets[$i]->geo->coordinates[1] : 106.845599;
                    $tweet->user_id = $tweets[$i]->user->id_str;
                    $tweet->user_name = $tweets[$i]->user->screen_name;
                    $tweet->query = $query;
                    $mentions = "";
                    for ($i=0; $i < sizeof($tweets[$i]->entities->user_mentions); $i++) {
                        $mentions .= $tweets[$i]->entities->user_mentions[$i]->screen_name;
                        if ($i < sizeof($tweets[$i]->entities->user_mentions)-1) {
                            $mentions .= ", ";
                        }
                    }
                    $tweet->mention = $mentions;
                    $hashtags = "";
                    for ($i=0; $i < sizeof($tweets[$i]->entities->hashtags); $i++) {
                        $hashtags .= $tweets[$i]->entities->hashtags[$i]->text;
                        if ($i < sizeof($tweets[$i]->entities->hashtags)-1) {
                            $hashtags .= ", ";
                        }
                    }
                    $tweet->hashtag = $hashtags;
                    $tweet->save();
                    $count_tweet++;
                }
            }
        }
        return response()->json(["status" => 200, "count_tweet" => $count_tweet]);
    }
}
