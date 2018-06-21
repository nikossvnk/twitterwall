<?php
/**
 *
 */

namespace App\Repository;


use Commercetools\Core\Builder\Request\RequestBuilder;
use Commercetools\Core\Model\CustomObject\CustomObjectDraft;
use Commercetools\Symfony\CtpBundle\Model\Repository;

class MediawallRepository extends Repository
{
    public function getTwitterCreds()
    {
        $twitterCreds = RequestBuilder::of()->customObjects()->getByContainerAndKey('credentials', 'twitter');

        return $this->executeRequest($twitterCreds);
    }

    public function setTwitterCreds($values)
    {
        $customObject = CustomObjectDraft::ofContainerKeyAndValue('credentials', 'twitter', $values);
        $twitterCreds = RequestBuilder::of()->customObjects()->create($customObject);

        return $this->executeRequest($twitterCreds);
    }
}
