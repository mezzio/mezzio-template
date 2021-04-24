# mezzio-template

[![Build Status](https://github.com/mezzio/mezzio-template/actions/workflows/continuous-integration.yml/badge.svg)](https://github.com/mezzio/mezzio-template/actions/workflows/continuous-integration.yml)

Template subcomponent for [Mezzio](https://github.com/mezzio/mezzio).

This package provides the following classes, interfaces, and traits:

- `TemplateRendererInterface`, a generic interface for providing template
  rendering capabilities.
- `TemplatePath`, a value object describing a (optionally) namespaced path in
  which templates reside; the `TemplateRendererInterface` returns these.
- `ArrayParametersTrait` provides helper methods you can mix in to
  implementations for normalizing template parameters to an array.
- `DefaultParamsTrait` provides helper methods you can mix in to
  implementations for aggregating default parameters as well as merging global,
  template-specific, and provided parameters when rendering.

## Installation

Typically, you will install this when installing Mezzio. However, it can be
used standalone to provide a generic way to provide templating to your
application. To do this, use:

```bash
$ composer require mezzio/mezzio-template
```

We currently support and provide the following routing integrations:

- [Plates](https://github.com/thephpleague/plates):
  `composer require mezzio/mezzio-platesrenderer`
- [Twig](http://twig.sensiolabs.org/):
  `composer require mezzio/mezzio-twigrenderer`
- [Laminas PhpRenderer](https://github.com/laminas/laminas-view):
  `composer require mezzio/mezzio-laminasviewrenderer`

## Documentation

Mezzio provides [template documentation](https://docs.mezzio.dev/mezzio/features/template/intro/).
