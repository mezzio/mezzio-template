<?php

declare(strict_types=1);

namespace MezzioTest\Template\TestAsset;

final class ViewModel
{
    /** @var array<non-empty-string, mixed> */
    private array $variables;

    /** @param array<non-empty-string, mixed> $variables */
    public function __construct(array $variables)
    {
        $this->variables = $variables;
    }

    /** @return array<non-empty-string, mixed> */
    public function getVariables(): array
    {
        return $this->variables;
    }
}
