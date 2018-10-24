<?php
namespace LeoGalleguillos\PoemTest\Model\Table;

use LeoGalleguillos\Poem\Model\Table as PoemTable;
use LeoGalleguillos\Test\TableTestCase;
use Zend\Db\Adapter\Adapter;
use PHPUnit\Framework\TestCase;

class PoemTest extends TableTestCase
{
    protected function setUp()
    {
        $this->poemTable = new PoemTable\Poem($this->getAdapter());

        $this->dropTable('poem');
        $this->createTable('poem');
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
}
