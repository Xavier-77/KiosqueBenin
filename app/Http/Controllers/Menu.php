<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sousmenu1;
use App\Models\Sousmenu2;
use App\Models\Sousmenu3;
use App\Models\Sousmenu4;

class Menu extends Controller
{
    public function menu()
    {
        $id = 2;
        $sousmenus1 = Sousmenu1::where('parent_id', $id)->get();
        foreach ($sousmenus1 as $sousmenu1){
            $sousmenu1->principal='Abonnement';
            $sousmenu1 -> save();
            $sousmenus2 = Sousmenu2::where('parent_id', $sousmenu1->id)->get();
            if (count($sousmenus2)>0) {
                foreach ($sousmenus2 as $sousmenu2){
                    $sousmenu2->principal='Abonnement';
                    $sousmenu2 -> save();
    
                    $sousmenus3 = Sousmenu3::where('parent_id', $sousmenu2->id)->get();
                    if(count($sousmenus3)>0) {
                        foreach ($sousmenus3 as $sousmenu3){
                            $sousmenu3->principal='Abonnement';
                            $sousmenu3 -> save();
        
                            $sousmenus4 = Sousmenu4::where('parent_id', $sousmenu3->id)->get();
                            if(count($sousmenus4)>0) {
                                foreach ($sousmenus4 as $sousmenu4){
                                    $sousmenu4->principal='Abonnement';
                                    $sousmenu4 -> save();
                                }
                            }
                        }
                    }
                    
                }
            }
            
        }
        return 'Operation réussie!';
    }
    public function patchKeywords()
    {
        $sousmenus1 = Sousmenu1::all();
        foreach ($sousmenus1 as $sousmenu1){
            if(substr($sousmenu1 -> keyword, -2) == '01') {
                $sousmenu1->keyword=substr($sousmenu1 -> keyword, 0, strlen($sousmenu1->keyword) -2);
            }
            $sousmenu1->save();
        }
        $sousmenus2 = Sousmenu2::all();
        foreach ($sousmenus2 as $sousmenu2){
            if(substr($sousmenu2 -> keyword, -2) == '01') {
                $sousmenu1->keyword=substr($sousmenu1 -> keyword, 0, strlen($sousmenu2->keyword) -2);
            }
            $sousmenu2->save();
        }
        $sousmenus3 = Sousmenu3::all();
        foreach ($sousmenus3 as $sousmenu3){
            if(substr($sousmenu3 -> keyword, -2) == '01') {
                $sousmenu3->keyword=substr($sousmenu3 -> keyword, 0, strlen($sousmenu3->keyword) -2);
            }
            $sousmenu3->save();
        }
        $sousmenus4 = Sousmenu4::all();
        foreach ($sousmenus4 as $sousmenu4){
            
            if(substr($sousmenu4 -> keyword, -2) == '01') {
                $sousmenu4->keyword=substr($sousmenu4 -> keyword, 0, strlen($sousmenu4->keyword) -2);
            }
            $sousmenu4->save();
        }
        dd($sousmenus4);
    }
}
