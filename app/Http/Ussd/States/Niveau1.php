<?php

namespace App\Http\Ussd\States;

use App\Http\Ussd\UssdHelpers;
use App\Http\Ussd\States\Abonnement\List2;
use Sparors\Ussd\State;
use App\Models\Sousmenu1;
use App\Models\Menuprincipal;
use App\Http\Ussd\States\Niveau2;

class Niveau1 extends State
{
    protected function beforeRendering(): void
    {
		// Récupération des informations sur le menu parent
        $parent_id= $this->record->get("parent_n1");
        $parent = Menuprincipal::where('id', $parent_id)->first();
        
		// Récupération des sous-menus de niveau 1
		$collection = collect(Sousmenu1::where('parent_id', $parent_id)->get());
        
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
        //            ->line('# Pour menu principal')
        //            ->line('0 Pour sortir');
        
		// Journalisation de l'action
		ussdlog(request()->get('msisdn'), $parent->nom, request()->query('sc'), 'Ok');
        
		// Affichage du menu USSD
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
    
	// Nouvelle méthode pour gérer la vérification du sous-menu 1
    /*protected function checkInSoumenuOne($id)
    {
        return UssdHelpers::checkIn(Sousmenu1::class, $id);
    }
	
	    protected function afterRendering(string $argument): void
    {
        $this->decision->custom2(
            function ($argument) {
                return UssdHelpers::handleSubMenuChoice($this->record, $argument);
            },
            function ($argument) {
                return UssdHelpers::handleCheckResult($this->record, $argument, 'checkIn', Sousmenu1::class);
            },
            function ($argument) {
                return UssdHelpers::handleCheckResult($this->record, $argument, 'checkInSoumenuOne', Sousmenu1::class);
            },
            Niveau2::class, List2::class, EndOfMenu::class
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
                        $choix = true;
                    }
                    return $choix;
                },
                Welcome::class
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
                        $checkResult = checkInSoumenuOne($p['id']);
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
                        $checkResult = checkIn(Sousmenu1::class, $p['id']);
                        if($checkResult['isEnd']==true) {
                            $this->record->set('fin', $checkResult);
                            $choix=true;
                        }
                    }
                }
                return $choix;
            }, Niveau2::class, List2::class, EndOfMenu::class
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
    }
}
