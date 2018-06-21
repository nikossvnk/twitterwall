<?php
/**
 *
 */

namespace App\Controller;

use App\Manager\MediawallManager;
use Commercetools\Core\Client;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


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

    public function index()
    {
        $twitter = $this->manager->getTwitterCreds()->getValue();


        return $this->render('admin.html.twig', [
            'res' => $twitter
        ]);

    }
}
