README
==============

Requirements
------------
- PHP 8.2
- PHPUnit 10.5

Installation
------------

Use composer to install the dependencies

    git clone https://github.com/stutov3/boarding-cards-api.git
    cd boarding-cards-api

    composer install

Usage
-----

    php index.php

Tests
-----

Tests were written with PHPUnit

To run tests:
```
./vendor/bin/phpunit tests
```

What as been done and assumptions
----------------
1. Implemented a sorting algorithm that works with any set of boarding passes, assuming there is always an unbroken chain between all the legs of the trip.
2. The data will come from an array or JSON in the specified format. It could come from various datasource like database or json
```
[
    [
        'type' => 'bus', // a bus boarding card
        'departure' => 'Stockholm',
        'arrival' => 'Boo',
        'transportNumber' => '117',
        'seat' => '18C',
    ],
    ...
    [
        'type' => 'train', // a train boarding card
        'departure' => 'Madrid',
        'arrival' => 'Barcelona',
        'transportNumber' => '78A',
        'seat' => '45B',
    ],
]
```
3. Implemented a printer interface and one printer class for printing boarding cards. In future we can use another class for printing in HTML format.
4. Another sorting class can be added in the future.
5. With this structure, you can easily extend the system to support new boarding card types, printing methods, and sorting algorithms in the future.

