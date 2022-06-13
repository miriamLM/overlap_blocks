<?php

declare(strict_types=1);

require_once '../vendor/autoload.php';

if (isset($argv)) {

    try {

        $blockinput = count($argv) === 1 ? "" : $argv[1];
        echo "$blockinput";

    } catch (RuntimeException $exception) {
    }

    return;
}