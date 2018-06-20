<?php
/**
 *
 */

namespace App\Repository;


use Commercetools\Core\Builder\Request\RequestBuilder;
use Commercetools\Symfony\CtpBundle\Model\Repository;

class MediawallRepository extends Repository
{
    public function getCustomObjects()
    {
        $categoriesRequest = RequestBuilder::of()->categories()->query()->sort($sort);

        return $this->executeRequest($categoriesRequest);
    }
}
