<?php
/**
 *
 */

namespace App\Controller;

use App\Manager\MediawallManager;
use App\Repository\MediawallRepository;
use Commercetools\Core\Builder\Request\RequestBuilder;
use Commercetools\Core\Client;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use RZ\MixedFeed\MixedFeed;
use RZ\MixedFeed\InstagramFeed;
use RZ\MixedFeed\TwitterFeed;
use RZ\MixedFeed\TwitterSearchFeed;
use RZ\MixedFeed\FacebookPageFeed;
use Symfony\Component\HttpFoundation\Response;


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

        $feed = new MixedFeed([

            new TwitterSearchFeed(
                [
                    '#cthack', // do not specify a key for string searchs
                ],
                'WzOQpWGNtf4Iwlb3YcEKIN0uI',
                '3tXo9KyGM5xdhZVqN1JaX0K6Yjz3vNomoJoB2V9gt4dim2XlWl',
                '1009424748428890113-wmroO7JVI5ouI210bfB7eZ7xvvvnBW',
                'IaW4BwMVE9R7R00UnbLIfHNWOVWAhvCF2K2C4k2oS4koy'
            // you can add a doctrine cache provider
            )

        ]);

        return $feed->getItems(12);

//        $this->manager->getCustomObjects();
//
////        return new Response($res);
//        return $this->render('index');

    }
}
