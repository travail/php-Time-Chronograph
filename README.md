# \Time\Chronograph

## NAME

\Time\Chronograph -

## SYNOPSIS

```php
require_once 'path/to/Time/Chronograph.php';

$chrono = new \Time\Chronograph();
$chrono->start();

/* Do something */

$chrono->stop();
$total = $chrono->total();
echo sprintf("Took %.3f seconds\n", $total);
$total_in_micro_seconds = $chrono->total(6);
echo sprintf("Took %.6f seconds\n", $total_in_micro_seconds);
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
