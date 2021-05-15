<?php

declare(strict_types=1);

namespace Mezzio\Template\Exception;

use DomainException;

class RenderingException extends DomainException implements ExceptionInterface
{
}
