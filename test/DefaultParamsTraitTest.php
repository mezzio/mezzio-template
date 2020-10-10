<?php

/**
 * @see       https://github.com/mezzio/mezzio-template for the canonical source repository
 * @copyright https://github.com/mezzio/mezzio-template/blob/master/COPYRIGHT.md
 * @license   https://github.com/mezzio/mezzio-template/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace MezzioTest\Template;

use Mezzio\Template\Exception\InvalidArgumentException;
use Mezzio\Template\TemplateRendererInterface;
use MezzioTest\Template\TestAsset\ArrayParameters;
use MezzioTest\Template\TestAsset\DefaultParameters;
use PHPUnit\Framework\TestCase;

class DefaultParamsTraitTest extends TestCase
{
    /**
     * @var ArrayParameters
     */
    private $arrayParams;

    /**
     * @var DefaultParameters
     */
    private $defaultParams;

    protected function setUp(): void
    {
        $this->arrayParams   = new ArrayParameters();
        $this->defaultParams = new DefaultParameters();
    }

    public function testDefaultParamArray()
    {
        $foo = [
            1 => ['id' => 1],
            2 => ['id' => 2],
            3 => ['id' => 3],
        ];

        $expected = [
            TemplateRendererInterface::TEMPLATE_ALL => [
                'foo' => $foo,
            ],
        ];

        $this->defaultParams->addDefaultParam(TemplateRendererInterface::TEMPLATE_ALL, 'foo', $foo);
        $this->assertEquals($expected, $this->defaultParams->getParameters());
    }

    public function testMergingParamsWithDefaultParamArray()
    {
        $foo = [
            1 => ['id' => 1],
            2 => ['id' => 2],
            3 => ['id' => 3],
        ];

        $expected = [
            'foo' => [
                1 => ['id' => 1],
                2 => ['id' => 2],
                3 => ['id' => 3],
                4 => ['id' => 4],
            ],
        ];

        // Set default params
        $this->defaultParams->addDefaultParam(TemplateRendererInterface::TEMPLATE_ALL, 'foo', $foo);

        // Mimic renderer
        $params = $this->defaultParams->mergeParameters(
            TemplateRendererInterface::TEMPLATE_ALL,
            $this->arrayParams->normalize([
                'foo' => [
                    3 => ['id' => 3],
                    4 => ['id' => 4],
                ],
            ])
        );
        $params = $this->defaultParams->mergeParameters('template', $params);

        $this->assertEquals($expected, $params);
    }

    public function testExceptionOnAddDefaultParamWhenEmptyTemplateName()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('$templateName must be a non-empty string');
        $this->defaultParams->addDefaultParam('', 'name', 'value');
    }

    public function testExceptionOnAddDefaultParamWhenEmptyParamName()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('$param must be a non-empty string');
        $this->defaultParams->addDefaultParam('template', '', 'value');
    }
}
