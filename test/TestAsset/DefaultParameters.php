<?php

declare(strict_types=1);

namespace MezzioTest\Template\TestAsset;

use Mezzio\Template\DefaultParamsTrait;

final class DefaultParameters
{
    use DefaultParamsTrait;

    /** @return array<non-empty-string, array<non-empty-string, mixed>> */
    public function getParameters(): array
    {
        return $this->defaultParams;
    }

    /**
     * @param non-empty-string $template
     * @param array<non-empty-string, mixed> $params
     * @return array<non-empty-string, mixed>
     */
    public function mergeParameters(string $template, array $params): array
    {
        return $this->mergeParams($template, $params);
    }
}
