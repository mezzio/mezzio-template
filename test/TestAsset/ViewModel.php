<?php

/**
 * @see       https://github.com/mezzio/mezzio-template for the canonical source repository
 * @copyright https://github.com/mezzio/mezzio-template/blob/master/COPYRIGHT.md
 * @license   https://github.com/mezzio/mezzio-template/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace MezzioTest\Template\TestAsset;

class ViewModel
{
    private $variables;

    public function __construct(array $variables)
    {
        $this->variables = $variables;
    }

    public function getVariables(): array
    {
        return $this->variables;
    }
}
