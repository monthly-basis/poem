<?php
namespace LeoGalleguillos\Poem\Model\Factory;

use LeoGalleguillos\Poem\Model\Entity as PoemEntity;
use LeoGalleguillos\Poem\Model\Table as PoemTable;

class Poem
{
    public function __construct(
        PoemTable\Poem $poemTable
    ) {
        $this->poemTable = $poemTable;
    }

    /**
     * Build from array.
     *
     * @param array $array
     * @return PoemEntity\Poem
     */
    public function buildFromArray(array $array): PoemEntity\Poem
    {
        $poemEntity = new PoemEntity\Poem();
        $poemEntity->setBody($array['body'])
                         ->setPoemId($array['poem_id'])
                         ->setTitle($array['title']);

        return $poemEntity;
    }

    public function buildFromPoemId(
        int $poemId
    ): PoemEntity\Poem {
        return $this->buildFromArray(
            $this->poemTable->selectWherePoemId($poemId)
        );
    }
}
