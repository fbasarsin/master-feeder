<?php

require "autoload.php";

$providerName = $_GET['provider'] ?? null;

if(empty($providerName)){
    throw new Exception("Provider name is empty!");
}

echo \App\AbstractProvider::create($providerName)->getList();