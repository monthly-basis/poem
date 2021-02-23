<?php
namespace MonthlyBasis\Poem\Model\Service;

use MonthlyBasis\Poem\Model\Entity as PoemEntity;
use MonthlyBasis\Poem\Model\Service as PoemService;
use MonthlyBasis\String\Model\Service as StringService;

class RootRelativeUrl
{
    public function __construct(
        StringService\UrlFriendly $urlFriendlyService
    ) {
        $this->urlFriendlyService = $urlFriendlyService;
    }

    /**
     * Get root relative URL.
     *
     * @param PoemEntity\Poem $poemEntity
     * @return string
     */
    public function getRootRelativeUrl(
        PoemEntity\Poem $poemEntity
    ) : string {
        return '/poems/'
             . $poemEntity->getPoemId()
             . '/'
             . $this->urlFriendlyService->getUrlFriendly(
                   $poemEntity->getTitle()
               );
    }
}
