<?php

/**
 * @see       https://github.com/mezzio/mezzio-template for the canonical source repository
 * @copyright https://github.com/mezzio/mezzio-template/blob/master/COPYRIGHT.md
 * @license   https://github.com/mezzio/mezzio-template/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace MezzioTest\Template\TestAsset;

use Mezzio\Template\DefaultParamsTrait;

class DefaultParameters
{
    use DefaultParamsTrait;

    public function getParameters()
    {
        return $this->defaultParams;
    }

    public function mergeParameters($template, array $params)
    {
        return $this->mergeParams($template, $params);
    }
}
