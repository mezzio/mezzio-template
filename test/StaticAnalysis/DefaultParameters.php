<?php

declare(strict_types=1);

namespace MezzioTest\Template\StaticAnalysis;

use Mezzio\Template\DefaultParamsTrait;

final class DefaultParameters
{
    use DefaultParamsTrait;

    /**
     * @param array<non-empty-string, mixed> $params
     * @return array<non-empty-string, mixed>
     */
    public function mergePreservesKeyType(array $params): array
    {
        return $this->mergeParams('whatever', $params);
    }
}
