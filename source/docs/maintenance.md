---
title: Maintenance
description: How we maintain our app.
extends: _layouts.documentation
section: content
---

## Maintenance

We choose [Test-driven development(TDD)](https://en.wikipedia.org/wiki/Test-driven_development) agile methodology because it ensures source code is thoroughly tested at confirmatory level. We used [PHPUnit testing](https://phpunit.readthedocs.io/en/9.1/) within our [laravel application](https://laravel.com/docs/7.x/testing)


| Unit Tests | Feature Tests | Total Tests | Assertions |
| ---------- | ------------- | ----------- | ---------- |
| 72         | 501           | 573         | 1939       |


You can run whole test suite as 
``` Bash
./vendor/bin/phpunit
```
To run particular test file
``` 
./vendor/bin/phpunit --filter <name of test file>
```

To run particular test
``` 
./vendor/bin/phpunit --filter <name of test>
```

To run all unit tests
``` bash
./vendor/bin/phpunit --filter unit
```

To run all feature tests
``` bash
./vendor/bin/phpunit --filter feature
```
