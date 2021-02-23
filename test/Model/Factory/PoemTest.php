<?php
namespace MonthlyBasis\PoemTest\Model\Factory;

use MonthlyBasis\Poem\Model\Factory as PoemFactory;
use MonthlyBasis\Poem\Model\Table as PoemTable;
use PHPUnit\Framework\TestCase;

class PoemTest extends TestCase
{
    protected function setUp(): void
    {
        $this->poemTableMock = $this->createMock(
            PoemTable\Poem::class
        );
        $this->poemFactory = new PoemFactory\Poem(
            $this->poemTableMock
        );
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(
            PoemFactory\Poem::class,
            $this->poemFactory
        );
    }
}
