<?php

$gpio_config = array(
    # channel => gpio
    "0" => "203", # pin7
    "1" => "198", # pin8
    "2" => "199", # pin10
);

$parts = explode('/', $_SERVER['REQUEST_URI']);

if(sizeof($parts) == 4) {
    $channel = $parts[2];
    $value = $parts[3];
    
    if($value == "on") {
        $value = 1;
    } else if($value == "off") {
        $value = 0;
    }
    
    $filename = "/sys/class/gpio/gpio" . $gpio_config[$channel] . "/value";
    file_put_contents($filename, $value);
    
    echo "success";
} else {
    echo "error";
}
