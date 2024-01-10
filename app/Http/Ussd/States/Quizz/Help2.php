<?php

namespace App\Http\Ussd\States\Quizz;

use Sparors\Ussd\State;

class Help2 extends State
{
    protected function beforeRendering(): void
    {
       
        $this->menu->xmlmenu(
            [
            'screen_type'                     => 'Menu',
            'text'                            => 'Et tenter de gagner 100000F/Semaine, 500000F/mois et 2000000F le gros lot. Vous pouvez gagner egalement des telephones et un pocket wifi. Cout : 50 fcfa',
            'list'                            => [],
            'back_link'                       => 0,
            'home_link'                       => 1,
            'session_op'                      => 'continue',
            'screen_id'                       => 1,

            ]
        );
    }
    protected function afterRendering(string $argument): void
    {
        $this->decision
            ->any(Error::class);
    }
}
