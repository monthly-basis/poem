<?php
namespace LeoGalleguillos\Poem\Model\Service\Poems;

use Generator;
use LeoGalleguillos\User\Model\Entity as UserEntity;
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

    public function getPoems(UserEntity\User $userEntity): Generator
    {
        $generator = $this->poemTable->selectWhereUserId(
            $userEntity->getUserId(),
            0,
            100
        );
        foreach ($generator as $array) {
            yield $this->poemFactory->buildFromArray($array);
        }
    }
}
