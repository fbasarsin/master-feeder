<?php

spl_autoload_register(static function (string $className) {
    require_once(str_replace('\\', DIRECTORY_SEPARATOR, __DIR__ . "\\$className.php"));
});