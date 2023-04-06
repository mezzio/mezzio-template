<?php

declare(strict_types=1);

namespace MezzioTest\Template;

use Mezzio\Template\Exception\ExceptionInterface;
use Mezzio\Template\Exception\InvalidArgumentException;
use Mezzio\Template\Exception\RenderingException;
use PHPUnit\Framework\TestCase;

use function is_a;

class ExceptionTest extends TestCase
{
    /** @psalm-return array<class-string, array<int, class-string>> */
    public static function exception(): array
    {
        return [
            InvalidArgumentException::class => [InvalidArgumentException::class],
            RenderingException::class       => [RenderingException::class],
        ];
    }

    /**
     * @dataProvider exception
     * @param class-string $exception
     */
    public function testExceptionIsInstanceOfExceptionInterface(string $exception): void
    {
        self::assertStringContainsString('Exception', $exception);
        self::assertTrue(is_a($exception, ExceptionInterface::class, true));
    }
}
