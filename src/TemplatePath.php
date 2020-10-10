<?php

/**
 * @see       https://github.com/mezzio/mezzio-template for the canonical source repository
 * @copyright https://github.com/mezzio/mezzio-template/blob/master/COPYRIGHT.md
 * @license   https://github.com/mezzio/mezzio-template/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace Mezzio\Template;

class TemplatePath
{
    /** @var string */
    protected $path;

    /** @var null|string */
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
