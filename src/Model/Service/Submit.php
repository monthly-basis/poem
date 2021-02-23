<?php
namespace LeoGalleguillos\Poem\Model\Service;

use Exception;
use MonthlyBasis\Flash\Model\Service as FlashService;
use LeoGalleguillos\Poem\Model\Table as PoemTable;
use LeoGalleguillos\User\Model\Entity as UserEntity;

class Submit
{
    public function __construct(
        FlashService\Flash $flashService,
        PoemTable\Poem $poemTable
    ) {
        $this->flashService    = $flashService;
        $this->poemTable = $poemTable;
    }

    public function submit(
        UserEntity\User $userEntity
    ) {
        $errors = [];
        if (empty($_POST['title'])) {
            $errors[] = 'Invalid title.';
        }
        if (empty($_POST['body'])) {
            $errors[] = 'Invalid poem.';
        }
        if ($errors) {
            $this->flashService->set('errors', $errors);
            throw new Exception('Invalid form input.');
        }

        $poemId = $this->poemTable->insert(
            $userEntity->getUserId(),
            $_POST['title'],
            $_POST['body']
        );

        return $poemId;
    }
}
