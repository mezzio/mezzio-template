<?php

declare(strict_types=1);

namespace Mezzio\Template;

use function array_replace_recursive;

/**
 * Trait for providing default template parameters.
 */
trait DefaultParamsTrait
{
    /** @var array<non-empty-string, array<non-empty-string, mixed>> */
    private array $defaultParams = [];

    /**
     * Add a default parameter to use with a template.
     *
     * Use this method to provide a default parameter to use when a template is
     * rendered. The parameter may be overridden by providing it when calling
     * `render()`, or by calling this method again with a null value.
     *
     * The parameter will be specific to the template name provided. To make
     * the parameter available to any template, pass the TEMPLATE_ALL constant
     * for the template name.
     *
     * If the default parameter existed previously, subsequent invocations with
     * the same template name and parameter name will overwrite.
     *
     * @param non-empty-string $templateName Name of template to which the param applies;
     *     use TEMPLATE_ALL to apply to all templates.
     * @param non-empty-string $param Param name.
     * @throws Exception\InvalidArgumentException
     */
    public function addDefaultParam(string $templateName, string $param, mixed $value): void
    {
        /** @psalm-suppress TypeDoesNotContainType Retaining defensive checks despite precise types */
        if ($templateName === '') {
            throw new Exception\InvalidArgumentException('$templateName must be a non-empty string');
        }

        /** @psalm-suppress TypeDoesNotContainType Retaining defensive checks despite precise types */
        if ($param === '') {
            throw new Exception\InvalidArgumentException('$param must be a non-empty string');
        }

        if (! isset($this->defaultParams[$templateName])) {
            $this->defaultParams[$templateName] = [];
        }

        $this->defaultParams[$templateName][$param] = $value;
    }

    /**
     * Returns merged global, template-specific and given params
     *
     * @param non-empty-string $template
     * @param array<non-empty-string, mixed> $params
     * @return array<non-empty-string, mixed>
     */
    private function mergeParams(string $template, array $params): array
    {
        $globalDefaults   = $this->defaultParams[TemplateRendererInterface::TEMPLATE_ALL] ?? [];
        $templateDefaults = $this->defaultParams[$template] ?? [];

        /** @psalm-var array<non-empty-string, mixed> */
        return array_replace_recursive($globalDefaults, $templateDefaults, $params);
    }
}
