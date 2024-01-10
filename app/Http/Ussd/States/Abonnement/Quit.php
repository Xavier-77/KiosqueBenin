<?php

namespace App\Http\Ussd\States\Abonnement;

use Sparors\Ussd\State;

class Quit extends State
{
    protected function beforeRendering(): void
    {
        $this->menu->xmlmenu(
            [
            'screen_type'                     => 'Menu',
            'text'                            => 'Desabonnement effectue',
            'list'                            => [],
            'back_link'                       => 0,
            'home_link'                       => 1,
            'session_op'                      => 'continue',
            'screen_id'                       => 1
   
            ]
        );
    }

    protected function afterRendering(string $argument): void
    {
        //
    }
}
