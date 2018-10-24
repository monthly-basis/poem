<?php
namespace LeoGalleguillos\Poem\Model\Service;

use LeoGalleguillos\Poem\Model\Entity as PoemEntity;
use LeoGalleguillos\Poem\Model\Table as PoemTable;

class IncrementViews
{
    public function __construct(
        PoemTable\Poem\Views $viewsTable
    ) {
        $this->viewsTable = $viewsTable;
    }

    public function incrementViews(
        PoemEntity\Poem $poemEntity
    ): bool {
        return (bool) $this->viewsTable->increment(
            $poemEntity->getPoemId()
        );
    }
}
