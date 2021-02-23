<?php
namespace MonthlyBasis\Poem\Model\Service;

use MonthlyBasis\Poem\Model\Entity as PoemEntity;
use MonthlyBasis\Poem\Model\Table as PoemTable;

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
        return (bool) $this->viewsTable->incrementWherePoemId(
            $poemEntity->getPoemId()
        );
    }
}
