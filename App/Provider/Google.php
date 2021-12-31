<?php

namespace App\Provider;

use App\AbstractProvider;
use App\Provider\Traits\Json;

class Google extends AbstractProvider
{
    use Json;

    protected const FORMAT = '[{list}]';

    protected const ITEM = '{
        "id": {Id},
        "name": "{Name}",
        "price": {Price},
        "category": "{Category}"
    },';
}