<?php

require_once __DIR__ . '/../vendor/autoload.php';


class TreebuilderTest extends PHPUnit_Framework_TestCase
{
    /** @var TreeBuilder */
    private $treeBuilder;

    public function setUp()
    {
        $this->treeBuilder = new TreeBuilder();
    }

    public function test_can_draw_a_single_step()
    {
        $step = $this->treeBuilder->buildBranches(1, 5);
        $this->assertEquals("    X", $step);
    }

    public function test_can_draw_bottom_treepart_5_stages()
    {
        $bottom = $this->treeBuilder->buildTrunk(5);
        $this->assertEquals("    I", $bottom);
    }

    public function test_can_draw_bottom_treepart_4_stages()
    {
        $bottom = $this->treeBuilder->buildTrunk(4);
        $this->assertEquals("   I", $bottom);
    }

    public function test_can_draw_bottom_treepart_3_stages()
    {
        $bottom = $this->treeBuilder->buildTrunk(3);
        $this->assertEquals("  I", $bottom);
    }
}
