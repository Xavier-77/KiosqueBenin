<?php

namespace App\Http\Ussd\States;

use Sparors\Ussd\State;

class Unavailable extends State
{
    protected function beforeRendering(): void
    {
        //
    }

    protected function afterRendering(string $argument): void
    {
        //
    }
}
