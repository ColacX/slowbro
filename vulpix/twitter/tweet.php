<?php

require_once('TwitterAPIExchange.php');
/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "869162790031851520-C5Ffm5SoYI6wxRpdkG8MBkH445FeDQ6",
    'oauth_access_token_secret' => "RRqG3wToxyD0I0SSv9uIHLoCrYjEuOyPmyztejURslm07",
    'consumer_key' => "5yAdtjKyk0FDX93UlYz04KdD6",
    'consumer_secret' => "LBS73MMNuRfbHd6D5g8aTjEnZZdOJgCvSqd18n7KTfxIvAAW6a"
);
$url = "https://api.twitter.com/1.1/statuses/user_timeline.json";
$requestMethod = "GET";
$user = "nylenpeace";
$count = 1;

if (isset($_GET['user'])) { $user = $_GET['user']; }
if (isset($_GET['count'])) { $count = $_GET['count'];}

$getfield = "?screen_name=$user&count=$count";
$twitter = new TwitterAPIExchange($settings);
$string = json_decode($twitter->setGetfield($getfield)->buildOauth($url, $requestMethod)->performRequest(),$assoc = TRUE);

if(isset($string["errors"][0]["message"])) {
   // echo "<h3>Sorry, there was a problem.</h3><p>Twitter returned the following error message:</p><p><em>".$string[errors][0]["message"]."</em></p>";
    exit();
}
/*
echo '<pre>';
foreach($string as $items)
    {
        echo "Time and Date of Tweet: ".$items['created_at']."<br />";
        echo "Tweet: ". $items['text']."<br />";
        echo "Tweeted by: ". $items['user']['name']."<br />";
        echo "Screen name: ". $items['user']['screen_name']."<br />";
        echo "Followers: ". $items['user']['followers_count']."<br />";
        echo "Friends: ". $items['user']['friends_count']."<br />";
        echo "Listed: ". $items['user']['listed_count']."<br /><hr />";
    }

echo '</pre>';
*/
//print_r ($string) ;
$tweet_text = $string[0]['text'] ;

?>