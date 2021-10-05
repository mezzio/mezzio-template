<?php

declare(strict_types=1);

namespace MezzioTest\Template\TestAsset;

use Mezzio\Template\DefaultParamsTrait;

class DefaultParameters
{
    use DefaultParamsTrait;

    public function getParameters(): array
    {
        return $this->defaultParams;
    }

    public function mergeParameters(string $template, array $params): array
    {
        return $this->mergeParams($template, $params);
    }
}
