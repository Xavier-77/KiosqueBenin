<?php

namespace App\Http\Ussd\States;

use Sparors\Ussd\State;
use App\Models\Sousmenu2;
use App\Models\Sousmenu3;
use App\Models\Sousmenu4;
use App\Http\Ussd\States\Abonnement\List2;
use App\Http\Ussd\States\Error;
use App\Http\Ussd\States\Goodbye;
use App\Http\Ussd\States\Niveau1;
use App\Http\Ussd\States\Welcome;




class Niveau4 extends State
{
    protected function beforeRendering(): void
    {
		// Récupération des informations sur le menu parent
        $parent_id= $this->record->get("parent_n1");
        $parent = Sousmenu3::where('id', $parent_id)->first();
        
		// Récupération des sous-menus de niveau 4
		$collection = collect(Sousmenu4::where('parent_id', $parent_id)->get());
        
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
    
	// Nouvelle méthode pour gérer le choix du sous-menu
    /*protected function handleSubMenuChoice($argument)
    {
        $choix = false;
        $listes = $this->record->get("tabs");
        foreach ($listes as $p) {
            if ($p['key'] == $argument) {
                $choix = true;
                $this->record->set("parent_n1", $p['id']);
            }
        }
        return $choix;
    }
	
	// Nouvelle méthode pour gérer les résultats de vérification
    protected function handleCheckResult($argument, $checkFunction, $class = null)
    {
        $choix = false;
        $listes = $this->record->get("tabs");
        foreach ($listes as $p) {
            if ($p['key'] == $argument) {
                $checkResult = $this->$checkFunction($p['id'], $class);
                if ($checkResult['isEnd'] == true) {
                    $this->record->set('fin', $checkResult);
                    $choix = true;
                }
            }
        }
        return $choix;
    }
	
	// Nouvelle méthode pour gérer la vérification du sous-menu
    protected function checkInSoumenu($id, $class)
    {
        $menu = $class::where('id', $id)->where('principal', 'Abonnement')->first();
        if ($menu && !is_null($menu->keyword)) {
            return [
                'isEnd'   => true,
                'id'      => $menu->id,
                'nom'     => $menu->nom,
                'classe'  => $class,
                'keyword' => $menu->keyword,
            ];
        } else {
            return ['isEnd' => false];
        }
    }
	
	// Nouvelle méthode pour vérifier le sous-menu 4
    protected function checkInSoumenuFour($id)
    {
        return $this->checkInSoumenu($id, Sousmenu4::class);
    }
	
	protected function afterRendering(string $argument): void
    {
        $this->decision->custom2(
            function ($argument) {
                return $this->handleSubMenuChoice($argument);
            },
            function ($argument) {
                return $this->handleCheckResult($argument, 'checkInSoumenuFour');
            },
            function ($argument) {
                return $this->handleCheckResult($argument, 'checkIn', Sousmenu4::class);
            },
            Unavailable::class,
            List2::class,
            EndOfMenu::class
        )->custom(
            function ($argument) {
                return $argument == '#';
            },
            Welcome::class
        )->custom(
            function ($argument) {
                return $argument == '*';
            },
            function () {
                $pre = $this->record->get('precedent');
                $this->record->set("parent_n1", $pre);
            },
            Niveau2::class
        )->custom(
            function ($argument) {
                return $argument == '0';
            },
            Goodbye::class
        )->any(Prompt::class);
    }*/

    
	
	protected function afterRendering(string $argument): void
    {
        $this->decision->custom2(
            function ($argument) {
                $choix1 = false;
                $listes1 = $this->record->get("tabs");
                foreach($listes1 as $p){
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
                        $checkResult = checkInSoumenuFour($p['id']);
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
                        $checkResult = checkIn(Sousmenu4::class, $p['id']);
                        if($checkResult['isEnd'] == true) {
                            $this->record->set('fin', $checkResult);
                            $choix=true;
                        }
                    }
                }
                return $choix;
            }, Unavailable::class, List2::class, EndOfMenu::class
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
            }, Niveau2::class
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
        ->any(Prompt::class);
    }
}
