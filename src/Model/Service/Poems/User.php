<?php
namespace LeoGalleguillos\Poem\Model\Service\Poems;

use Generator;
use LeoGalleguillos\Poem\Model\Factory as PoemFactory;
use LeoGalleguillos\Poem\Model\Table as PoemTable;

class User
{
    public function __construct(
        PoemFactory\Poem $poemFactory,
        PoemTable\Poem $poemTable
    ) {
        $this->poemFactory = $poemFactory;
        $this->poemTable   = $poemTable;
    }

    public function getPoems(): Generator
    {
        foreach ($this->poemTable->select() as $array) {
            yield $this->poemFactory->buildFromArray($array);
        }
    }
}
