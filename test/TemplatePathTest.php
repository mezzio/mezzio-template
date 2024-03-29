<?php

declare(strict_types=1);

namespace MezzioTest\Template;

use Mezzio\Template\TemplatePath;
use PHPUnit\Framework\TestCase;

/**
 * @covers Mezzio\Template\TemplatePath
 */
class TemplatePathTest extends TestCase
{
    use TemplatePathAssertionsTrait;

    public function testCanProvideNamespaceAtInstantiation(): void
    {
        $templatePath = new TemplatePath('/tmp', 'test');
        $this->assertTemplatePath('/tmp', $templatePath);
        $this->assertTemplatePathNamespace('test', $templatePath);
    }

    public function testCanInstantiateWithoutANamespace(): void
    {
        $templatePath = new TemplatePath('/tmp');
        $this->assertTemplatePath('/tmp', $templatePath);
        $this->assertEmptyTemplatePathNamespace($templatePath);
    }

    public function testCastingToStringReturnsPathOnly(): void
    {
        $templatePath = new TemplatePath('/tmp');
        $this->assertTemplatePathString('/tmp', $templatePath);

        $templatePath = new TemplatePath('/tmp', 'test');
        $this->assertTemplatePathString('/tmp', $templatePath);
    }
}
