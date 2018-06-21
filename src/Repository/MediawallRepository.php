<?php
/**
 *
 */

namespace App\Repository;


use Commercetools\Core\Builder\Request\RequestBuilder;
use Commercetools\Symfony\CtpBundle\Model\Repository;

class MediawallRepository extends Repository
{
    public function getTwitterCreds()
    {
        $twitterCreds = RequestBuilder::of()->customObjects()->getByContainerAndKey('credentials', 'twitter');

        return $this->executeRequest($twitterCreds);
    }
}
