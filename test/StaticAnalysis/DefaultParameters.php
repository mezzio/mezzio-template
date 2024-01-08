<?php

declare(strict_types=1);

namespace MezzioTest\Template\StaticAnalysis;

use Mezzio\Template\DefaultParamsTrait;

final class DefaultParameters
{
    use DefaultParamsTrait;

    /**
     * @param array<string, mixed> $params
     * @return array<string, mixed>
     */
    public function mergePreservesKeyType(array $params): array
    {
        return $this->mergeParams('whatever', $params);
    }
}
