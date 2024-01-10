<?php
//app/Http/Ussd/UssdHelpers.php

namespace App\Http\Ussd;

/*class UssdHelpers
{
    public static function handleSubMenuChoice($record, $argument)
    {
        $choix1 = false;
        $listes1 = $record->get("tabs");
        foreach ($listes1 as $p) {
            if ($p['key'] == $argument) {
                $choix1 = true;
                $record->set("parent_n1", $p['id']);
            }
        }
        return $choix1;
    }

    public static function handleCheckResult($record, $argument, $checkFunction, $modelClass)
    {
        $choix = false;
        $listes = $record->get("tabs");
        foreach ($listes as $key => $p) {
            if ($p['key'] == $argument) {
                $checkResult = self::$checkFunction($modelClass::class, $p['id']);
                if ($checkResult['isEnd'] == true) {
                    $record->set('fin', $checkResult);
                    $choix = true;
                }
            }
        }
        return $choix;
    }

    public static function checkIn($niveau, $id)
    {
        $menu = $niveau::where('id', $id)->where('principal', null)->first();
        if ($menu && !is_null($menu->keyword)) {
            return [
                'isEnd'   => true,
                'id'      => $menu->id,
                'nom'     => $menu->nom,
                'classe'  => $niveau,
                'keyword' => $menu->keyword,
            ];
        } else {
            return [
                'isEnd' => false,
            ];
        }
		
		    public static function checkInSoumenu($id, $class)
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
    }
}*/


class UssdHelpers
{
    public static function handleSubMenuChoice($record, $argument)
    {
        $choix1 = false;
        $listes1 = $record->get("tabs");
        foreach ($listes1 as $p) {
            if ($p['key'] == $argument) {
                $choix1 = true;
                $record->set("parent_n1", $p['id']);
            }
        }
        return $choix1;
    }

    public static function handleCheckResult($record, $argument, $checkFunction, $class = null)
    {
        $choix = false;
        $listes = $record->get("tabs");
        foreach ($listes as $key => $p) {
            if ($p['key'] == $argument) {
                $checkResult = self::$checkFunction($p['id'], $class);
                if ($checkResult['isEnd'] == true) {
                    $record->set('fin', $checkResult);
                    $choix = true;
                }
            }
        }
        return $choix;
    }

    // Les fonctions spécifiques aux sous-menus (checkInSoumenuOne, checkInSoumenuTwo, etc.) ont été omises.
    // Vous pouvez ajouter ces fonctions selon les besoins.

    public static function checkInSoumenu($id, $class)
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

    public static function checkIn($class, $id)
    {
        $checkResult = self::checkInSoumenu($id, $class);

        if ($checkResult['isEnd'] == true) {
            return $checkResult;
        }

        // Logique supplémentaire si nécessaire pour le niveau global

        return ['isEnd' => false];
    }
	
	/*public static function checkIn($class, $id)
{
    $checkResult = self::checkInSoumenu($id, $class);

    if ($checkResult['isEnd'] == true) {
        return $checkResult;
    }

    // 1. Vérification des prérequis globaux
    if (Auth::check()) {
        // L'utilisateur est authentifié, continuer le processus USSD
    } else {
        // Rediriger l'utilisateur vers un niveau d'authentification
        return ['isEnd' => true, 'redirect' => 'Authentification'];
    }

    // 2. Enregistrement de statistiques ou d'analyses globales
    Analytics::track('Niveau atteint', ['niveau' => $class, 'id' => $id]);

    try {
        // ... Votre logique principale ici
    } catch (\Exception $e) {
        // 3. Gestion d'erreurs globales
        Log::error($e->getMessage());
        return ['isEnd' => true, 'error' => 'Une erreur est survenue. Veuillez réessayer.'];
    }

    // Logique supplémentaire si nécessaire pour le niveau global

    return ['isEnd' => false];
}*/


    // Ajoutez des méthodes similaires pour les autres niveaux (2, 3, 4) si nécessaire
}