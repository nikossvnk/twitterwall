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

        $feed = new MixedFeed([

            new TwitterSearchFeed(
                [
                    '#cthack', // do not specify a key for string searchs
                ]
            // you can add a doctrine cache provider
            )

        ]);

        $res = $feed->getItems(12);

        $cart = $this->manager->getCustomObjects();

//        return new JsonResponse($res);
        return $this->render('index.html.twig', [
            'res' => $res,
            'cart' => $cart
        ]);

    }
}
