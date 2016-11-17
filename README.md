# NanoPi Neo GPIO Demo Project

A simple PHP-based automation project using GPIO on NanoPi Neo

## Prepare

* Install Ubuntu Core
* Install `php5-cli`
* Install `cpufrequtils`
* Change `/etc/rc.local` like the following

    ```bash
    # limit cpu from overheating
    cpufreq-set -r -u 480000
    cpufreq-set -r -d 700000

    # create gpio
    echo 199 > /sys/class/gpio/export
    echo out > /sys/class/gpio/gpio199/direction
    echo 0 > /sys/class/gpio/gpio199/value

    # start php server
    cd /srv/www
    php -S 0.0.0.0:80
    ```

## API Call

`GET /api/[0-9]/[on|off]`

### Example

* `/api/0/on` will turn on load on channel 0
* `/api/1/off` will turn off load on channel 1

> Configure GPIO to channel mapping at `api/index.php:$gpio_config`
