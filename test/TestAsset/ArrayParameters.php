<?php

declare(strict_types=1);

namespace MezzioTest\Template\TestAsset;

use Mezzio\Template\ArrayParametersTrait;

class ArrayParameters
{
    use ArrayParametersTrait;

    /** @param mixed $params */
    public function normalize($params): array
    {
        return $this->normalizeParams($params);
    }
}
