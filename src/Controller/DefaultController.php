<?php
/**
 *
 */

namespace App\Controller;

use App\Manager\MediawallManager;
use Commercetools\Core\Client;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use RZ\MixedFeed\MixedFeed;
use RZ\MixedFeed\InstagramFeed;
use RZ\MixedFeed\TwitterFeed;
use RZ\MixedFeed\TwitterSearchFeed;
use RZ\MixedFeed\FacebookPageFeed;


class DefaultController extends Controller
{
    private $client;
    private $manager;

    /**
     * CartController constructor.
     */
    public function __construct(Client $client, MediawallManager $manager)
    {
        $this->client = $client;
        $this->manager = $manager;
    }

    public function index()
    {
        $twitter = $this->manager->getTwitterCreds()->getValue();

        $feed = new MixedFeed([

            new TwitterSearchFeed(
                $twitter['hashtags'],
                $twitter['consumerKey'],
                $twitter['consumerSecret'],
                $twitter['accessToken'],
                $twitter['accessTokenSecret'],
                null,
                true
            )

        ]);

        $res = $feed->getItems((int)$twitter['numOfTweets']);

        return $this->render('index.html.twig', [
            'res' => $res
        ]);

    }
}
