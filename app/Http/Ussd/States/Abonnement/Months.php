<?php

namespace App\Http\Ussd\States\Abonnement;

use Sparors\Ussd\State;

class Months extends State
{
    protected function beforeRendering(): void
    {
        $etape1 = $this->record->get('etape1');
        $repport = $this->record->get('fin');
        $keyword = $repport;
        $etape2 = $this->record->get('etape2');
        $sc = $this->record->get('shortcode');
        $motcle = $etape1.$keyword.$etape2;

        $this->record->delete('etape1');
        $this->record->delete('motcle');
        $this->record->delete('etape2');
        $this->record->delete('shortcode');
        
		$this->menu->xmlmenu(
            [
            'screen_type'                     => 'Menu',
            'text'                            => 'Abonnement un mois effectue'.$motcle,
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
