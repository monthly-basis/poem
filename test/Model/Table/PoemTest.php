<?php
namespace LeoGalleguillos\PoemTest\Model\Table;

use LeoGalleguillos\Poem\Model\Table as PoemTable;
use LeoGalleguillos\Test\TableTestCase;
use Laminas\Db\Adapter\Adapter;
use PHPUnit\Framework\TestCase;
use TypeError;

class PoemTest extends TableTestCase
{
    protected function setUp(): void
    {
        $this->dropTable('poem');
        $this->createTable('poem');

        $this->poemTable = new PoemTable\Poem($this->getAdapter());
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(
            PoemTable\Poem::class,
            $this->poemTable
        );
    }

    public function testInsert()
    {
        $poemId = $this->poemTable->insert(
            1,
            'title',
            'body'
        );
        $this->assertSame(
            $poemId,
            1
        );
    }

    public function testSelect()
    {
        $generator = $this->poemTable->select();
        $this->assertEmpty(
            iterator_to_array($generator)
        );

        $this->poemTable->insert(
            1,
            'title',
            'body'
        );
        $this->poemTable->insert(
            1,
            'title 2',
            'body 2'
        );

        $generator = $this->poemTable->select();
        $array = iterator_to_array($generator);
        $this->assertSame(
            'title 2',
            $array[0]['title']
        );
        $this->assertSame(
            'title',
            $array[1]['title']
        );
    }

    public function testSelectWherePoemId()
    {
        try {
            $this->poemTable->selectWherePoemId(1);
            $this->fail();
        } catch (TypeError $typeError) {
            $this->assertSame(
                'Return value',
                substr($typeError->getMessage(), 0, 12)
            );
        }

        $this->poemTable->insert(
            1,
            'title',
            'body'
        );
        $array = $this->poemTable->selectWherePoemId(1);
        unset($array['created']);
        $this->assertSame(
            [
                'poem_id' => '1',
                'user_id' => '1',
                'title' => 'title',
                'body' => 'body',
                'views' => '0',
            ],
            $array
        );
    }
}
