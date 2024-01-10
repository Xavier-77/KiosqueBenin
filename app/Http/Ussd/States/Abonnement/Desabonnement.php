<?php

namespace App\Http\Ussd\States;

use Sparors\Ussd\State;

class Desabonnement extends State
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
        // Définition des transitions
        $transitions = [
            '#' => Welcome::class,
            '*' => Abonnement::class,
            '0' => Goodbye::class,
        ];

        // Vérifie si l'argument correspond à une transition définie
        if (array_key_exists($argument, $transitions)) {
            $this->decision->custom(function () use ($argument, $transitions) {
                return true;
            }, $transitions[$argument]);
        } else {
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
                }, 
				Welcome::class
            )
			->custom(
				function ($argument) {
					$choix = false;
					if($argument == '*') {
						// $pre = $this->record->get('precedent');
						// $this->record->set("parent_n1",$pre);
						$choix=true;
					}
					return $choix;
				}, 
				Abonnement::class
			)
			->custom(
				function ($argument) {
					$choix = false;
					if($argument == '0') {
						$choix=true;
					}
					return $choix;
				}, 
				Goodbye::class
			)
			->any(Error::class);
    }*/
}
