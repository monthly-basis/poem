<?php
namespace MonthlyBasis\Poem\Model\Service;

use Generator;
use MonthlyBasis\Poem\Model\Entity as PoemEntity;
use MonthlyBasis\Poem\Model\Factory as PoemFactory;
use MonthlyBasis\Poem\Model\Table as PoemTable;

class Poems
{
    public function __construct(
        PoemFactory\Poem $poemFactory,
        PoemTable\Poem $poemTable
    ) {
        $this->poemFactory = $poemFactory;
        $this->poemTable   = $poemTable;
    }

    /**
     * Get poems.
     *
     * @yield PoemEntity\Poem
     * @return Generator
     */
    public function getPoems(): Generator
    {
        foreach ($this->poemTable->select() as $array) {
            yield $this->poemFactory->buildFromArray($array);
        }
    }
}
