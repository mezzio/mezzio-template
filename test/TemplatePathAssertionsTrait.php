<?php

declare(strict_types=1);

namespace MezzioTest\Template;

use Mezzio\Template\TemplatePath;

use function sprintf;
use function var_export;

trait TemplatePathAssertionsTrait
{
    public function assertTemplatePath(mixed $path, TemplatePath $templatePath, ?string $message = null): void
    {
        $message = $message ?: sprintf('Failed to assert TemplatePath contained path %s', (string) $path);
        self::assertEquals($path, $templatePath->getPath(), $message);
    }

    public function assertTemplatePathString(mixed $path, TemplatePath $templatePath, ?string $message = null): void
    {
        $message = $message ?: sprintf('Failed to assert TemplatePath casts to string path %s', (string) $path);
        self::assertEquals($path, (string) $templatePath, $message);
    }

    public function assertTemplatePathNamespace(
        mixed $namespace,
        TemplatePath $templatePath,
        ?string $message = null
    ): void {
        $message = $message ?: sprintf(
            'Failed to assert TemplatePath namespace matched %s',
            var_export($namespace, true)
        );
        self::assertEquals($namespace, $templatePath->getNamespace(), $message);
    }

    public function assertEmptyTemplatePathNamespace(TemplatePath $templatePath, ?string $message = null): void
    {
        $message = $message ?: 'Failed to assert TemplatePath namespace was empty';
        self::assertEmpty($templatePath->getNamespace(), $message);
    }

    public function assertEqualTemplatePath(
        TemplatePath $expected,
        TemplatePath $received,
        ?string $message = null
    ): void {
        $message = $message ?: 'Failed to assert TemplatePaths are equal';
        if (
            $expected->getPath() !== $received->getPath()
            || $expected->getNamespace() !== $received->getNamespace()
        ) {
            self::fail($message);
        }
    }
}
