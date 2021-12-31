<?php

namespace App\Provider;

use App\AbstractProvider;
use App\Provider\Traits\Xml;

class Facebook extends AbstractProvider
{
    use Xml;

    protected const FORMAT = '<?xml version="1.0"?>
                                <Product>
                                    {list}
                                </Product>';

    protected const ITEM = '<Item>
                                <Id>{Id}</Id>
                                <Name>{Name}</Name>
                                <Price>{Price}</Price>
                                <Category>{Category}</Category>
                            </Item>';

}