# \Time\Chronograph

## NAME

\Time\Chronograph -

## SYNOPSIS

```php

use \Time\Chronograph;

require_once '/path/to/vendor/autoload.php';

$chrono = new Chronograph();
$chrono->start();

$chrono->mark('before_do_something');
/* Do something */
$chrono->mark('after_do_something');

$chrono->stop();

$diff = $chrono->diff('before_do_something', 'after_do_something');
echo sprintf("Took %.3f to do something", $diff);

$total = $chrono->total();
echo sprintf("Took %.3f seconds\n", $total);
$total_in_micro_seconds = $chrono->total(6);
echo sprintf("Took %.6f seconds\n", $total_in_micro_seconds);
```

## INSTALLATION
To install this package into your project via composer, add the following snippet to your `composer.json`. Then run `composer install`.

```
"require": {
    "travail/time-chronograph": "dev-master"
}
```

If you want to install from gihub, add the following:

```
"repositories": [
    {
        "type": "vcs",
        "url": "git@github.com:travail/php-Time-Chronograph.git"
    }
]
```

## METHODS

### mark

#### Description

`float mark(string $mark)`

Returns the result of `gettimeofday`.

#### Parameters

* $mark

### start

#### Description

`void start(void)`

### stop

#### Description

`void stop(void)`

### total

#### Description

`float total([int $digit = 3])`

Returns the time between the mark `$start` and `$end` in given decimal place, 3 (millisecond) by default.

#### Parameters

* $digit

### diff

#### Description

`float diff(string $start, strig $end [, int $digit = 3])`

Returns the time between the mark `$start` and `$end` in given decimal place, millisecond by default.

#### Parameters

* $start
* $end
* $digit

### AUTHOR

travail

### LICENSE

This library is free software. You can redistribute it and/or modify it under the same terms as PHP itself.
