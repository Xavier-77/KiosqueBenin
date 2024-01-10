<?php

namespace App\Http\Ussd\States;

use Sparors\Ussd\State;
use App\Http\Ussd\States\Welcome;
use App\Http\Ussd\States\Goodbye;

class Error extends State
{
    protected function beforeRendering(): void
    {
		// Enregistrement de l'erreur dans les logs
        ussdlog(request()->get('msisdn'), 'Erreur/Option', request()->query('sc'), 'Option Invalid ou Navigation terminée!');
    
	    // Affichage du menu d'erreur
        $this->menu->xmlmenu(
            [
            'screen_type'                     => 'Menu',
            'text'                            => 'Option Invalid ou Navigation terminée!',
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
        // Définition des transitions
        $transitions = [
            '#' => Welcome::class,
            '0' => Goodbye::class,
        ];

        // Vérifie si l'argument correspond à une transition définie
        if (array_key_exists($argument, $transitions)) {
            $this->decision->custom(function () use ($argument, $transitions) {
                return true;
            }, $transitions[$argument]);
        } else {
            // Par défaut, rester dans l'état d'erreur
            $this->decision->any(Error::class);
        }
    }

    /*protected function afterRendering(string $argument): void
    {
        $this->decision
            ->custom(
                function ($argument) {
                    $choix = false;
                    if($argument == '#') {
                        $choix=true;
                    }
                    return $choix;
                }, Welcome::class
            )
        ->custom(
            function ($argument) {
                $choix = false;
                if($argument == '0') {
                    $choix=true;
                }
                return $choix;
            }, Goodbye::class
        )

        ->any(Error::class);
    
    }*/
}
