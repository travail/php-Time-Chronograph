<?php

use \Time\Chronograph;

require_once __DIR__ . '/../vendor/autoload.php';

main();
exit;

function main()
{
    $sleep  = rand(1000000, 3000000);
    $chrono = new Chronograph();
    $chrono->start();

    echo "Sleep $sleep micor seconds\n";
    usleep($sleep);

    $chrono->stop();
    $total = $chrono->total(6);
    echo sprintf("Slept %.3f seconds\n", $total);
    echo sprintf("Slept %.6f seconds\n", $total);
}
