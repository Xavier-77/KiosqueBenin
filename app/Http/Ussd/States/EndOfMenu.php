<?php

namespace App\Http\Ussd\States;

use Sparors\Ussd\State;

class EndOfMenu extends State
{
    protected function beforeRendering(): void
    {
        ussdlog(request()->get('msisdn'), 'Erreur/Option', request()->query('sc'), 'Opération éffectuée avec succès!');

        $repport = $this->record->get('fin');
        $titre = $repport['keyword'];
        $this->menu->xmlmenu(
            [
            'screen_type'                     => 'Menu',
            'text'                            => 'Mot clé : '.$titre,
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
        //
    }
}
