<?php

require_once __DIR__ . '/../vendor/autoload.php';

main();
exit;

function main()
{
    $chrono = new \Time\Chronograph();
    $chrono->start();

    $sleep_1  = rand(1000000, 3000000);
    echo "Sleep $sleep_1 micro seconds\n";
    $chrono->mark('s_sleep_1');
    usleep($sleep_1);
    $chrono->mark('e_sleep_1');

    $sleep_2  = rand(1000000, 3000000);
    echo "Sleep $sleep_2 micro seconds\n";
    $chrono->mark('s_sleep_2');
    usleep($sleep_2);
    $chrono->mark('e_sleep_2');

    $chrono->stop();

    echo sprintf("Slept %.6f seconds at first sleep\n",
        $chrono->diff('s_sleep_1', 'e_sleep_1', 6));
    echo sprintf("Slept %.6f seconds at second sleep\n",
        $chrono->diff('s_sleep_2', 'e_sleep_2', 6));
    echo sprintf("Slept %.6f seconds totally\n",
        $chrono->total(6));
}
