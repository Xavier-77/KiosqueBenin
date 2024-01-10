<?php

namespace App\Http\Ussd\States\Abonnement;

use Sparors\Ussd\State;

class Days extends State
{
    protected function beforeRendering(): void
    {
        // Récupération des données nécessaires
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
            'text'                            => 'Abonnement un jour effectue'.$motcle,
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
        //Aucune action supplémentaire après l'affichage du menu
    }
}
