<?php
namespace LeoGalleguillos\Poem\View\Helper;

use LeoGalleguillos\Poem\Model\Entity as PoemEntity;
use LeoGalleguillos\Poem\Model\Service as PoemService;
use LeoGalleguillos\Poem\View\Helper as PoemHelper;
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
