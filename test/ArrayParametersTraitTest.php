<?php

declare(strict_types=1);

namespace MezzioTest\Template;

use ArrayIterator;
use Mezzio\Template\Exception\InvalidArgumentException;
use MezzioTest\Template\TestAsset\ArrayParameters;
use PHPUnit\Framework\TestCase;

class ArrayParametersTraitTest extends TestCase
{
    private ArrayParameters $subject;

    protected function setUp(): void
    {
        $this->subject = new ArrayParameters();
    }

    public function testNullParamsAreReturnedAsEmptyArray(): void
    {
        self::assertEquals([], $this->subject->normalize(null));
    }

    public function testArrayParamsAreReturnedVerbatim(): void
    {
        $params = ['foo' => 'bar'];
        self::assertSame($params, $this->subject->normalize($params));
    }

    public function testExtractsVariablesFromObjectsImplementingGetVariables(): void
    {
        $params = ['foo' => 'bar'];
        $model  = new TestAsset\ViewModel($params);
        self::assertSame($params, $this->subject->normalize($model));
    }

    public function testCastsTraversablesToArrays(): void
    {
        $params = ['foo' => 'bar'];
        $model  = new ArrayIterator($params);
        self::assertSame($params, $this->subject->normalize($model));
    }

    public function testCastsObjectsToArrays(): void
    {
        $params = ['foo' => 'bar'];
        $model  = (object) $params;
        self::assertSame($params, $this->subject->normalize($model));
    }

    /** @psalm-return array<string, array{scalar, string}> */
    public function nonNullScalarParameters(): array
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
     * @param string $expectedString
     */
    public function testNonNullScalarsRaiseAnException(mixed $scalar, $expectedString): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage($expectedString);

        $this->subject->normalize($scalar);
    }
}
