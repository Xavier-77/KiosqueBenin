<?php
use App\Ussdlog;
use App\Models\Sousmenu1;
use App\Models\Sousmenu2;
use App\Models\Sousmenu3;
use App\Models\Menuprincipal;
use App\Http\Ussd\States\Abonnement\List2;
use App\Models\Sousmenu4;
if (! function_exists('ussdlog')) {
    function ussdlog($numero, $type, $shortcode,$details)
    {
        Ussdlog::log($numero, $type, $shortcode, $details);
    }
}
if (! function_exists('decide')) {
    function decide()
    {
        return new List2();
    }
}
if (! function_exists('checkInSoumenuOne')) {
    function checkInSoumenuOne($id)
    {
        $menu = Sousmenu1::where('id', $id)->where('principal', 'Abonnement')->first();
        if($menu && !is_null($menu->keyword) ) {
            return [
                'isEnd' => true,
                'id' => $menu->id,
                'nom' => $menu->nom,
                'classe' => "SousMenu1",
                'keyword' => $menu->keyword
            ];
        }else{
            return [
                'isEnd' => false 
                
            ];
        }
    }
}
if (! function_exists('checkInSoumenuTwo')) {
    function checkInSoumenuTwo($id)
    {
        $menu = Sousmenu2::where('id', $id)->where('principal', 'Abonnement')->first();
        if($menu && !is_null($menu->keyword) ) {
            return [
                'isEnd' => true,
                'id' => $menu->id,
                'nom' => $menu->nom,
                'classe' => "SousMenu2",
                'keyword' => $menu->keyword
            ];
        }else{
            return [
                'isEnd' => false 
            ];
        }
    }
}
if (! function_exists('checkInSoumenuThree')) {
    function checkInSoumenuThree($id)
    {
        $menu = Sousmenu3::where('id', $id)->where('principal', 'Abonnement')->first();
        if($menu && !is_null($menu->keyword) ) {
            return [
                'isEnd' => true,
                'id' => $menu->id,
                'nom' => $menu->nom,
                'classe' => "SousMenu3",
                'keyword' => $menu->keyword
            ];
        }else{
            return [
                'isEnd' => false 
            ];
        }
    }
}
if (! function_exists('checkInSoumenuFour')) {
    function checkInSoumenuFour($id)
    {
        $menu = Sousmenu4::where('id', $id)->where('principal', 'Abonnement')->first();
        if($menu && !is_null($menu->keyword) ) {
            return [
                'isEnd' => true,
                'id' => $menu->id,
                'nom' => $menu->nom,
                'classe' => "SousMenu4",
                'keyword' => $menu->keyword
                ];
        }else{
            return [
                    'isEnd' => false 
            ];
            
        }
    }
}

if (! function_exists('checkIn')) {
    function checkIn($niveau,$id)
    {
        $menu = $niveau::where('id', $id)->where('principal', null)->first();
        if($menu && !is_null($menu->keyword) ) {
            return [
                'isEnd' => true,
                'id' => $menu->id,
                'nom' => $menu->nom,
                'classe' =>  $niveau,
                'keyword' => $menu->keyword
                ];
        }else{
            return [
                 'isEnd' => false 
                ];
            
        }
    }
}
