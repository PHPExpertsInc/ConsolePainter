<?php declare(strict_types=1);

namespace PHPExperts\ConsolePainter\Tests;

class CombinationsGenerator
{
    /**
     * Taken from https://stackoverflow.com/a/56598845/430062.
     *
     * @param array $list
     * @return \Generator
     */
    public function generate(array $list): \Generator
    {
        // Generate even partial combinations.
        $list = array_values($list);
        $listCount = count($list);
        for ($a = 0; $a < $listCount; ++$a) {
            yield [$list[$a]];
        }

        if ($listCount > 2) {
            for ($i = 0; $i < count($list); $i++) {
                $listCopy = $list;

                $entry = array_splice($listCopy, $i, 1);
                foreach ($this->generate($listCopy) as $combination) {
                    yield array_merge($entry, $combination);
                }
            }
        } elseif (count($list) > 0) {
            yield $list;

            if (count($list) > 1) {
                yield array_reverse($list);
            }
        }
    }
}
