<?php
namespace LeoGalleguillos\PoemTest\Model\Table\Poem;

use LeoGalleguillos\Poem\Model\Table as PoemTable;
use MonthlyBasis\LaminasTest\TableTestCase;

class ViewsTest extends TableTestCase
{
    protected function setUp(): void
    {
        $this->dropTable('poem');
        $this->createTable('poem');

        $this->poemTable = new PoemTable\Poem($this->getAdapter());
        $this->viewsTable = new PoemTable\Poem\Views($this->getAdapter());
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(
            PoemTable\Poem\Views::class,
            $this->viewsTable
        );
    }

    public function testIncrementWherePoemId()
    {
        $this->assertSame(
            0,
            $this->viewsTable->incrementWherePoemId(1)
        );

        $this->poemTable->insert(
            1,
            'title',
            'body'
        );

        $this->assertSame(
            1,
            $this->viewsTable->incrementWherePoemId(1)
        );
    }
}
