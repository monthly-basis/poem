<?php
namespace LeoGalleguillos\Poem\Model\Table;

use Exception;
use Generator;
use Laminas\Db\Adapter\Adapter;

class Poem
{
    /**
     * @var Adapter
     */
    protected $adapter;

    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
    }

    protected function getSelect(): string
    {
        return '
            SELECT `poem_id`
                 , `user_id`
                 , `title`
                 , `body`
                 , `views`
                 , `created`
        ';
    }

    public function insert(
        int $userId,
        string $title,
        string $body
    ): int {
        $sql = '
            INSERT
              INTO `poem` (
                   `user_id`, `title`, `body`, `created`
                   )
            VALUES (?, ?, ?, UTC_TIMESTAMP())
                 ;
        ';
        $parameters = [
            $userId,
            $title,
            $body,
        ];
        return (int) $this->adapter
                          ->query($sql)
                          ->execute($parameters)
                          ->getGeneratedValue();
    }

    /**
     * Select.
     *
     * @yield array
     * @return Generator
     */
    public function select(): Generator
    {
        $sql = '
            SELECT `poem_id`
                 , `user_id`
                 , `title`
                 , `body`
                 , `views`
                 , `created`
              FROM `poem`
             ORDER
                BY `poem_id` DESC
             LIMIT 100
                 ;
        ';
        foreach ($this->adapter->query($sql)->execute() as $row) {
            yield($row);
        }
    }

    public function selectWherePoemId(int $poemId): array
    {
        $sql = '
            SELECT `poem_id`
                 , `user_id`
                 , `title`
                 , `body`
                 , `views`
                 , `created`
              FROM `poem`
             WHERE `poem_id` = ?
                 ;
        ';
        $parameters = [
            $poemId,
        ];
        return $this->adapter->query($sql)->execute($parameters)->current();
    }

    public function selectWhereUserId(
        int $userId,
        int $limitOffset,
        int $limitRowCount
    ): Generator {
        $sql = $this->getSelect()
             . "
              FROM `poem`
             WHERE `user_id` = ?
             LIMIT $limitOffset, $limitRowCount
                 ;
        ";
        $parameters = [
            $userId,
        ];
        foreach ($this->adapter->query($sql)->execute($parameters) as $array) {
            yield $array;
        }
    }
}
