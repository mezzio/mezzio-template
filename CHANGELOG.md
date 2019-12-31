# Changelog

All notable changes to this project will be documented in this file, in reverse chronological order by release.

## 1.0.2 - 2016-01-25

### Added

- Nothing.

### Deprecated

- Nothing.

### Removed

- [zendframework/zend-expressive-template#4](https://github.com/zendframework/zend-expressive-template/pull/4) removes
  the dependency on laminas-stdlib by inlining the `ArrayUtils::merge(`) routine as a
  private method of `Mezzio\Template\DefaultParamsTrait`.

### Fixed

- Nothing.

## 1.0.1 - 2015-12-02

### Added

- [zendframework/zend-expressive-template#1](https://github.com/zendframework/zend-expressive-template/pull/1) imports
  the `RenderingException` class from mezzio, pushing it into the
  `Mezzio\Template\Exception` namespace.

### Deprecated

- Nothing.

### Removed

- Nothing.

### Fixed

- Nothing.

## 1.0.0 - 2015-12-02

First stable release.

See the [Mezzio CHANGELOG](https://github.com/mezzio/mezzio/blob/master/CHANGELOG.md]
for a history of changes prior to 1.0.
