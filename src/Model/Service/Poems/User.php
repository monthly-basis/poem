<?php
namespace MonthlyBasis\Poem\Model\Service\Poems;

use Generator;
use MonthlyBasis\User\Model\Entity as UserEntity;
use MonthlyBasis\Poem\Model\Factory as PoemFactory;
use MonthlyBasis\Poem\Model\Table as PoemTable;

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
