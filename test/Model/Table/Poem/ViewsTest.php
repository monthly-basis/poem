<?php
namespace LeoGalleguillos\PoemTest\Model\Table\Poem;

use LeoGalleguillos\Poem\Model\Table as PoemTable;
use LeoGalleguillos\Test\TableTestCase;

class ViewsTest extends TableTestCase
{
    protected function setUp()
    {
        $this->dropTable('poem');
        $this->createTable('poem');

        $this->viewsTable = new PoemTable\Poem\Views($this->getAdapter());
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(
            PoemTable\Poem\Views::class,
            $this->viewsTable
        );
    }
}
