<?php
/**
 *
 */

namespace App\Controller;

use App\Manager\MediawallManager;
use App\Model\Form\Type\TwitterType;
use Commercetools\Core\Client;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class AdminController extends Controller
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

    public function index(Request $request)
    {
        $twitter = $this->manager->getTwitterCreds()->getValue();

        $twitter['hashtags'] = implode(' ', $twitter['hashtags']);

        $twitterForm = $this->createForm(TwitterType::class, $twitter);
        $twitterForm->handleRequest($request);

        if ($twitterForm->isSubmitted() && $twitterForm->isValid()){

            $consumerKey = $twitterForm->get('consumerKey')->getData();
            $consumerSecret = $twitterForm->get('consumerSecret')->getData();
            $accessToken = $twitterForm->get('accessToken')->getData();
            $accessTokenSecret = $twitterForm->get('accessTokenSecret')->getData();
            $numOfTweets = $twitterForm->get('numOfTweets')->getData();

            $hashtags = $twitterForm->get('hashtags')->getData();

            $values = [
                "consumerKey" => $consumerKey,
                "consumerSecret" => $consumerSecret,
                "accessToken" => $accessToken,
                "accessTokenSecret" => $accessTokenSecret,
                "hashtags" => explode(' ', $hashtags),
                "numOfTweets" => $numOfTweets
            ];

            try {
                $this->manager->setTwitterCreds($values);
            } catch (\Error $e){
                $this->addFlash('error', $e->getMessage());
            }

        }



        return $this->render('admin.html.twig', [
            'twitterForm' => $twitterForm->createView()
        ]);

    }
}
