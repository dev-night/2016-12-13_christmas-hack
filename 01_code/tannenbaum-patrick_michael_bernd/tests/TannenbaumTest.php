<?php

require_once __DIR__ . '/../vendor/autoload.php';


class TannenbaumTest extends PHPUnit_Framework_TestCase
{
    const ONETREE = "X\n" .
    "I";
    const TWOTREE = " X\n" .
    "XXX\n" .
    " I";
    const TWOTREEWITHSTAR = " *\n" .
    " X\n" .
    "XXX\n" .
    " I";
    const FIVETREE = "    X\n" .
    "   XXX\n" .
    "  XXXXX\n" .
    " XXXXXXX\n" .
    "XXXXXXXXX\n" .
    "    I";
    const FIVETREEWITHSTAR = "    *\n" .
    "    X\n" .
    "   XXX\n" .
    "  XXXXX\n" .
    " XXXXXXX\n" .
    "XXXXXXXXX\n" .
    "    I";

    /** @var Tannenbaum */
    private $tannenbaum;

    public function setUp()
    {
        $this->tannenbaum = new Tannenbaum(new DummyOutputService(), new TreeBuilder());
    }

    public function testClassExists()
    {
        $this->assertInstanceOf(Tannenbaum::class, $this->tannenbaum);
    }

    public function testDrawOneStageTannenbaumm()
    {
        $this->assertEquals(self::ONETREE, $this->tannenbaum->zeichnen(1));
    }

    public function test_it_is_constructed_with_its_services()
    {
        $outputServiceMock = $this->createMock(DummyOutputService::class);
        $outputServiceMock->expects($this->once())
            ->method('output');
        $treeBuilderMock = $this->createMock(TreeBuilder::class);
        $treeBuilderMock->expects($this->once())
            ->method('buildTrunk');
        $treeBuilderMock->expects($this->once())
            ->method('buildBranches');
        $tannenbaum = new Tannenbaum($outputServiceMock, $treeBuilderMock);
        $tannenbaum->zeichnen(1);
    }

    public function testDrawTwoStageTannenbaum()
    {
        $this->assertEquals(self::TWOTREE, $this->tannenbaum->zeichnen(2));
    }

    public function testDrawFiveStageTannenbaum()
    {
        $this->assertEquals(self::FIVETREE, $this->tannenbaum->zeichnen(5));
    }

    public function testDrawTwoStageTannenbaumWithStar()
    {
        $this->assertEquals(self::TWOTREEWITHSTAR, $this->tannenbaum->zeichnen(2, true));
    }

    public function testDrawFiveStageTannenbaumWithStar()
    {
        $this->assertEquals(self::FIVETREEWITHSTAR, $this->tannenbaum->zeichnen(5, true));
    }
}
