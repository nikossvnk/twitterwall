<?php
/**
 *
 */

namespace App\Manager;


use App\Repository\MediawallRepository;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class MediawallManager
{
    /**
     * @var MediawallRepository
     */
    private $repository;

    /**
     * @var EventDispatcherInterface
     */
    private $dispatcher;

    /**
     * CatalogManager constructor.
     * @param MediawallRepository $repository
     * @param EventDispatcherInterface $dispatcher
     */
    public function __construct(MediawallRepository $repository, EventDispatcherInterface $dispatcher)
    {
        $this->repository = $repository;
        $this->dispatcher = $dispatcher;
    }

    public function getTwitterCreds()
    {
        return $this->repository->getTwitterCreds();
    }

}
