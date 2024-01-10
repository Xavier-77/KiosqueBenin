<?php

namespace App\Http\Ussd\States\Affinity;

use Sparors\Ussd\State;

class FemaleName extends State
{
    protected function beforeRendering(): void
    {
        // Affichage du menu pour saisir un prénom féminin
        $this->menu->xmlmenu(
            [
            'screen_type'                     => 'Menu',
            'text'                            => 'Saisissez un prenom feminin',
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
         // Enregistrement du prénom féminin dans l'enregistrement
		$this->record->set('female', $argument);
		
		// Redirection vers l'étape suivante (Result)
        $this->decision->any(Result::class);
    }
}
