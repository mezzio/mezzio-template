<?php

/**
 * @see       https://github.com/mezzio/mezzio-template for the canonical source repository
 * @copyright https://github.com/mezzio/mezzio-template/blob/master/COPYRIGHT.md
 * @license   https://github.com/mezzio/mezzio-template/blob/master/LICENSE.md New BSD License
 */

namespace MezzioTest\Template\TestAsset;

use Mezzio\Template\ArrayParametersTrait;

class ArrayParameters
{
    use ArrayParametersTrait;

    public function normalize($params)
    {
        return $this->normalizeParams($params);
    }
}
