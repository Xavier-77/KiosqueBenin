<?php

namespace App\Http\Ussd\States;

use App\Http\Ussd\UssdHelpers;
use Sparors\Ussd\State;
use App\Models\Sousmenu1;
use App\Models\Sousmenu2;
use App\Http\Ussd\States\Abonnement\List2;
use App\Http\Ussd\States\Niveau3;
use App\Http\Ussd\States\Niveau1;
use App\Http\Ussd\States\Goodbye;
use App\Http\Ussd\States\Welcome;
use App\Http\Ussd\States\Error;
 
class Niveau2 extends State
{
    protected function beforeRendering(): void
    {
		// Récupération des informations sur le menu parent
        $parent_id= $this->record->get("parent_n1");
        $parent = Sousmenu1::where('id', $parent_id)->first();
        
		// Récupération des sous-menus de niveau 2
		$collection = collect(Sousmenu2::where('parent_id', $parent_id)->get());
        
		// Création d'un tableau associatif pour le menu USSD
		$listes= $collection->map(
            function ($item, $key) {
                return $item->nom;
            }
        )->toArray();
        $tab = $collection->map(
            function ($item,$key) {
                $key=$key+1;$obj = ['id' => $item->id,'key' =>$key];
                return $obj;
            }
        )->toArray();
        
		// Enregistrement des informations dans la session
		$this->record->set('tabs', $tab);
        $this->record->delete('precedent');
        $this->record->set('precedent', $parent_id);
        $this->record->delete('parent_n1');
        // $this->menu->text($parent->nom)
        //            ->lineBreak(2)
        //            ->listing($listes)
        //            ->lineBreak(2)
        //            ->line('* Pour menu precedent')
        //            ->line('# Pour menu principal')
        //            ->line('0 Pour sortir');
        
		// Journalisation de l'action
		ussdlog(request()->get('msisdn'), $parent->nom, request()->query('sc'), 'Ok');
        
		// Affichage du Menu
		$this->menu->xmlmenu(
            [
            'screen_type'                     => 'Menu',
            'text'                            => $parent->nom,
            'list'                            => $listes,
            'back_link'                       => 0,
            'home_link'                       => 1,
            'session_op'                      => 'continue',
            'screen_id'                       => 1,
            ]
        );
    }
	
	/*protected function afterRendering(string $argument): void
    {
        $this->decision->custom2(
            function ($argument) {
                return UssdHelpers::handleSubMenuChoice($this->record, $argument);
            },
            function ($argument) {
                return UssdHelpers::handleCheckResult($this->record, $argument, 'checkIn', Sousmenu2::class);
            },
            function ($argument) {
                return UssdHelpers::handleCheckResult($this->record, $argument, 'checkInSoumenuTwo', Sousmenu2::class);
            },
            Niveau3::class, List2::class, EndOfMenu::class
        )
            ->custom(
                function ($argument) {
                    $choix = false;
                    if ($argument == '#') {
                        $choix = true;
                    }
                    return $choix;
                },
                Welcome::class
            )
            ->custom(
                function ($argument) {
                    $choix = false;
                    if ($argument == '*') {
                        $pre = $this->record->get('precedent');
                        $this->record->set("parent_n1", $pre);
                        $choix = true;
                    }
                    return $choix;
                },
                Niveau1::class
            )
            ->custom(
                function ($argument) {
                    $choix = false;
                    if ($argument == '0') {
                        $choix = true;
                    }
                    return $choix;
                },
                Goodbye::class
            )
            ->any(Error::class);
    }*/
	
    protected function afterRendering(string $argument): void
    {
        $this->decision->custom2(
            function ($argument) {
                $choix1 = false;
                $listes1 = $this->record->get("tabs");
                foreach($listes1 as $p){
                    // dd(gettype($p->selecteur));
                    if($p['key'] == $argument) {
                        $choix1=true;
                        $this->record->set("parent_n1", $p['id']);
                    }
                }
                return $choix1;
            }, function ($argument) {
                $choix = false;
                $listes = $this->record->get("tabs");
                foreach($listes as $p){
                    // dd(gettype($p->selecteur));
                    if($p['key'] == $argument) {
                        $checkResult = checkInSoumenuTwo($p['id']);
                        if($checkResult['isEnd'] == true) {
                            $this->record->set('fin', $checkResult);
                            $choix=true;
                        }
                    
                    }
                }
                return $choix;
            }, function ($argument) {
                $choix = false;
                $listes = $this->record->get("tabs");
                foreach($listes as $p){
                    // dd(gettype($p->selecteur));
                    if($p['key'] == $argument) {
                        $checkResult = checkIn(Sousmenu2::class, $p['id']);
                        if($checkResult['isEnd'] == true) {
                            $this->record->set('fin', $checkResult);
                            $choix=true;
                        }
                    
                    }
                }
                return $choix;
            }, Niveau3::class, List2::class, EndOfMenu::class
        )
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
                if($argument == '*') {
                    $pre = $this->record->get('precedent');
                    $this->record->set("parent_n1", $pre);
                    $choix=true;
                }
                return $choix;
            }, Niveau1::class
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
    }
}
