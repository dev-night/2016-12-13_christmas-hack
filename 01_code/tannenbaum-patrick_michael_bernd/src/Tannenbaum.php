<?php

class Tannenbaum
{
    private $outputService;
    private $treeBuilder;

    public function __construct(OutputServiceInterface $outputService, TreeBuilder $treeBuilder)
    {
        $this->outputService = $outputService;
        $this->treeBuilder = $treeBuilder;
    }

    public function zeichnen(int $lines, bool $star = false)
    {
        $parts = [];

        if ($star === true) {
            $parts[] = $this->treeBuilder->buildStar($lines);
        }

        for ($i = 1; $i <= $lines; $i++) {
            $parts[] = $this->treeBuilder->buildBranches($i, $lines);
        }

        $parts[] = $this->treeBuilder->buildTrunk($lines);

        $tree = implode("\n", $parts);

        return $this->outputService->output($tree);
    }
}
