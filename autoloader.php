<?php
spl_autoload_register(function ($class_name) {
    if (file_exists($path = str_replace("\\", "/", $class_name)) . ".php") {
        include lcfirst($path) . ".php";
    }
});