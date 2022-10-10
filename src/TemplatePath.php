<?php

declare(strict_types=1);

namespace Mezzio\Template;

use Stringable;

class TemplatePath implements Stringable
{
    public function __construct(protected string $path, protected ?string $namespace = null)
    {
    }

    /**
     * Casts to string by returning the path only.
     */
    public function __toString(): string
    {
        return $this->path;
    }

    /**
     * Get the namespace
     */
    public function getNamespace(): ?string
    {
        return $this->namespace;
    }

    /**
     * Get the path
     */
    public function getPath(): string
    {
        return $this->path;
    }
}
