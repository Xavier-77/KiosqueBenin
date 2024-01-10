<?php
namespace App\Http\Ussd\States\Abonnement;

use Sparors\Ussd\State;

class List2 extends State
{

    protected $action = self::INPUT;
    
    protected function beforeRendering(): void
    {
        $menus = [
        'Avec renouvellement',
        'Sans renouvellement',
        'Se desabonner',
         ];
        $this->menu->xmlmenu(
            [
            'screen_type'                     => 'Menu',
            'text'                            => 'Type Abonnement',
            'list'                            => $menus,
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
            ->custom(
                function ($argument) {
                    $choix = false;
                    if($argument == '1') {
                        $choix=true;
                        $this->record->set('etape1', '1');
                    }
                    return $choix;
                }, 
				Abonnement::class
            )
			->custom(
				function ($argument) {
					$choix = false;
					if($argument == '2') {
						$choix=true;
						$this->record->set('etape1', '');
					}
					return $choix;
				}, 
				Abonnement::class
			)
			->custom(
				function ($argument) {
					$choix = false;
					if($argument == '3') {
						$choix=true;
					}
					return $choix;
				}, 
				Quit::class
			)
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
				Niveau1::class
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
    }
}
