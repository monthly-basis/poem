<?php
namespace LeoGalleguillos\Poem\Model\Table\Poem;

use Laminas\Db\Adapter\Adapter;

class Views
{
    /**
     * @var Adapter
     */
    protected $adapter;

    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
    }

    public function incrementWherePoemId(
        int $poemId
    ): int {
        $sql = '
            UPDATE `poem`
               SET `views` = `views` + 1
             WHERE `poem_id` = ?
                 ;
        ';
        $parameters = [
            $poemId,
        ];
        return (int) $this->adapter
                          ->query($sql)
                          ->execute($parameters)
                          ->getAffectedRows();
    }
}
