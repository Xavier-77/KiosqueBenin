<?php

namespace App\Http\Ussd\States\Abonnement;

use Sparors\Ussd\State;

class Semaine extends State
{
    protected $action = self::INPUT;

    protected function beforeRendering(): void
    {
        $etape1 = $this->record->get('etape1');
        $repport = $this->record->get('fin');
        $keyword = $repport;
        $etape2 = $this->record->get('etape2');
        $sc = $this->record->get('shortcode');

        // Construction du mot-clé
		$motcle = $etape1.$keyword.$etape2;
        
		// Nettoyage des données inutiles
		$this->record->delete('etape1');
        $this->record->delete('motcle');
        $this->record->delete('etape2');
        $this->record->delete('shortcode');
        
		// Affichage du menu
		$this->menu->xmlmenu(
            [
            'screen_type'                     => 'Menu',
            'text'                            => 'Abonnement une semaine effectue'.$motcle,
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
