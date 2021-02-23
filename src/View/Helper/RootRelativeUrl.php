<?php
namespace MonthlyBasis\Poem\View\Helper;

use MonthlyBasis\Poem\Model\Entity as PoemEntity;
use MonthlyBasis\Poem\Model\Service as PoemService;
use MonthlyBasis\Poem\View\Helper as PoemHelper;
use Laminas\View\Helper\AbstractHelper;

class RootRelativeUrl extends AbstractHelper
{
    public function __construct(
        PoemService\RootRelativeUrl $rootRelativeUrlService
    ) {
        $this->rootRelativeUrlService = $rootRelativeUrlService;
    }

    /**
     * Get root relative URL.
     *
     * @param PoemEntity\Poem $PoemEntity
     * @return string
     */
    public function __invoke(
        PoemEntity\Poem $PoemEntity
    ) : string {
        return $this->rootRelativeUrlService->getRootRelativeUrl(
            $PoemEntity
        );
    }
}
