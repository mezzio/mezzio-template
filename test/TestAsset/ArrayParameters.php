<?php

declare(strict_types=1);

namespace MezzioTest\Template\TestAsset;

use Mezzio\Template\ArrayParametersTrait;

final class ArrayParameters
{
    use ArrayParametersTrait;

    /**
     * @return array<non-empty-string, mixed>
     */
    public function normalize(mixed $params): array
    {
        return $this->normalizeParamsAsMap($params);
    }
}
