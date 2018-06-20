<?php
/**
 *
 */

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use RZ\MixedFeed\MixedFeed;
use RZ\MixedFeed\InstagramFeed;
use RZ\MixedFeed\TwitterFeed;
use RZ\MixedFeed\TwitterSearchFeed;
use RZ\MixedFeed\FacebookPageFeed;



class DefaultController
{
    public function index()
    {

        $feed = new MixedFeed([

            new TwitterSearchFeed(
                [
                    '#cthack', // do not specify a key for string searchs
                ],
                'twitter_consumer_key',
                'twitter_consumer_secret',
                'twitter_access_token',
                'twitter_access_token_secret'
            // you can add a doctrine cache provider
            )

        ]);

        $res = $feed->getItems(12);
        return new JsonResponse($res);
    }
}
