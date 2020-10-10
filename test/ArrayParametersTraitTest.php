<?php

/**
 * @see       https://github.com/mezzio/mezzio-template for the canonical source repository
 * @copyright https://github.com/mezzio/mezzio-template/blob/master/COPYRIGHT.md
 * @license   https://github.com/mezzio/mezzio-template/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace MezzioTest\Template;

use ArrayIterator;
use Mezzio\Template\Exception\InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class ArrayParametersTraitTest extends TestCase
{
    /** @var TestAsset\ArrayParameters */
    private $subject;

    protected function setUp(): void
    {
        $this->subject = new TestAsset\ArrayParameters();
    }

    public function testNullParamsAreReturnedAsEmptyArray()
    {
        $this->assertEquals([], $this->subject->normalize(null));
    }

    public function testArrayParamsAreReturnedVerbatim()
    {
        $params = ['foo' => 'bar'];
        $this->assertSame($params, $this->subject->normalize($params));
    }

    public function testExtractsVariablesFromObjectsImplementingGetVariables()
    {
        $params = ['foo' => 'bar'];
        $model  = new TestAsset\ViewModel($params);
        $this->assertSame($params, $this->subject->normalize($model));
    }

    public function testCastsTraversablesToArrays()
    {
        $params = ['foo' => 'bar'];
        $model  = new ArrayIterator($params);
        $this->assertSame($params, $this->subject->normalize($model));
    }

    public function testCastsObjectsToArrays()
    {
        $params = ['foo' => 'bar'];
        $model  = (object) $params;
        $this->assertSame($params, $this->subject->normalize($model));
    }

    public function nonNullScalarParameters()
    {
        // @codingStandardsIgnoreStart
        //                  [scalar,       expected exception string]
        return [
            'true'       => [true,         'bool'],
            'false'      => [false,        'bool'],
            'zero'       => [0,            'int'],
            'int'        => [1,            'int'],
            'zero-float' => [0.0,          'double'],
            'float'      => [1.1,          'double'],
            'string'     => ['view param', 'string'],
        ];
        // @codingStandardsIgnoreEnd
    }

    /**
     * @dataProvider nonNullScalarParameters
     *
     * @param mixed $scalar
     * @param string $expectedString
     */
    public function testNonNullScalarsRaiseAnException($scalar, $expectedString)
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage($expectedString);

        $this->subject->normalize($scalar);
    }
}
