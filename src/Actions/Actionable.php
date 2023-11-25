<?php

namespace CSGOPaka\Actions;

use CSGOPaka\Adapters\Guzzle;

abstract class Actionable
{
    public function __construct(protected Guzzle $guzzle)
    {
    }
}