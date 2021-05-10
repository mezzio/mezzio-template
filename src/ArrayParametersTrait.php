<?php

declare(strict_types=1);

namespace Mezzio\Template;

use Traversable;

use function gettype;
use function is_array;
use function is_object;
use function iterator_to_array;
use function method_exists;
use function sprintf;

trait ArrayParametersTrait
{
    /**
     * Cast params to an array, if possible.
     *
     * Casts the provided $params argument to an array, using the following rules:
     *
     * - null values result in an empty array
     * - array values are returned verbatim
     * - laminas-view view models return the result of getVariables()
     * - Traversables are cast using iterator_to_array
     * - objects that are not laminas-view view models nor traversables are cast
     *   using PHP's type casting
     * - scalar values result in an exception
     *
     * @param mixed $params
     * @throws Exception\InvalidArgumentException
     */
    private function normalizeParams($params): array
    {
        if (null === $params) {
            return [];
        }

        if (is_array($params)) {
            return $params;
        }

        // Special case for laminas/laminas-view view models.
        // Not using typehinting, so as not to require laminas-view as a dependency.
        if (is_object($params) && method_exists($params, 'getVariables')) {
            return $params->getVariables();
        }

        if ($params instanceof Traversable) {
            return iterator_to_array($params);
        }

        if (is_object($params)) {
            return (array) $params;
        }

        throw new Exception\InvalidArgumentException(sprintf(
            '%s template adapter can only handle arrays, Traversables, and objects '
            . 'when rendering; received %s',
            static::class,
            gettype($params)
        ));
    }
}
