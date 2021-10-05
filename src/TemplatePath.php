<?php

declare(strict_types=1);

namespace Mezzio\Template;

class TemplatePath
{
    /** @var string */
    protected $path;

    /** @var string|null */
    protected $namespace;

    public function __construct(string $path, ?string $namespace = null)
    {
        $this->path      = $path;
        $this->namespace = $namespace;
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
