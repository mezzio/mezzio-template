<?php

declare(strict_types=1);

namespace Mezzio\Template\Exception;

use InvalidArgumentException as SplInvalidArgumentException;

/** @final */
class InvalidArgumentException extends SplInvalidArgumentException implements ExceptionInterface
{
}
