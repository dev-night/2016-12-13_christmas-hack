<?php

class TreeBuilder
{
    const BOTTOM_CHAR = 'I';
    const TREE_CHAR = 'X';
    const STAR_CHAR = '*';

    public function buildTrunk(int $levels)
    {
        return str_pad(self::BOTTOM_CHAR, $levels, ' ', STR_PAD_LEFT);
    }

    public function buildStar(int $levels)
    {
        return str_pad(self::STAR_CHAR, $levels, ' ', STR_PAD_LEFT);
    }

    public function buildBranches(int $line, int $level)
    {
        $tree_char_count = 1 + ($line - 1) * 2;
        $tree_level = str_repeat(self::TREE_CHAR, $tree_char_count);

        $line_width = $tree_char_count + $level - $line;
        $line = str_pad($tree_level, $line_width, ' ', STR_PAD_LEFT);

        return $line;
    }
}
