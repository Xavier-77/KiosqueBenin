<?php
namespace App\Http\Ussd\States\Abonnement;

use Sparors\Ussd\State;

class Abonnement extends State
{
    protected function beforeRendering(): void
    {
        $menus = [
        'Un jour a 25F',
        'Une semaine a 100F',
        'Un mois a 400F',
        ];
        $pre = $this->record->get('mode');
        $this->record->delete('mode');
        $this->record->set('abonnement', $pre.'/');
        
		$this->menu->xmlmenu(
            [
            'screen_type'                     => 'Menu',
            'text'                            => 'Type Abonnement',
            'list'                            => $menus,
            'back_link'                       => 0,
            'home_link'                       => 1,
            'session_op'                      => 'continue',
            'screen_id'                       => 1
            ]
        );
    }
	
	protected function afterRendering(string $argument): void
{
    $transitions = [
        '1' => ['etape2' => 'O1', 'class' => Days::class],
        '2' => ['etape2' => 'O7', 'class' => Semaine::class],
        '3' => ['etape2' => '30', 'class' => Months::class],
        '#' => ['class' => Welcome::class],
        '*' => ['class' => Niveau1::class],
        '0' => ['class' => Goodbye::class],
    ];

    // Vérifie si l'argument correspond à une transition définie
    if (array_key_exists($argument, $transitions)) {
        $this->record->set($transitions[$argument]['etape2'] ?? null);
        $this->decision->custom(function () use ($argument, $transitions) {
            return true;
        }, $transitions[$argument]['class'] ?? null);
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
                    if($argument == '1') {
                        $pre = $this->record->get('abonnement');
                        $this->record->set('etape2', 'O1');
                        $choix=true;
                    }
                    return $choix;
                }, 
				Days::class
            )
			->custom(
				function ($argument) {
					$choix = false;
					if($argument == '2') {
						$pre = $this->record->get('abonnement');
						$this->record->set('etape2', 'O7');
						$choix=true;
					}
					return $choix;
				}, 
				Semaine::class
			)
			->custom(
				function ($argument) {
					$choix = false;
					if($argument == '3') {
						$pre = $this->record->get('abonnement');
						$this->record->set('etape2', '30');
						$choix=true;
					}
					return $choix;
				}, 
				Months::class
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
    }*/
}
