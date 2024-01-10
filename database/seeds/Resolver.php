<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MenuPrincipal;
use App\Models\SousMenu1;
use App\Models\SousMenu2;
use App\Models\SousMenu3;
use App\Models\SousMenu4;

class Resolver extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id = 1;
        $sousmenus1 = SousMenu1::where('parent_id', $id)->get();
        foreach ($sousmenus1 as $sousmenu1){
            $sousmenu1->principal='Abonnement';
            $sousmenu1 -> save();
            $sousmenus2 = SousMenu2::where('parent_id', $sousmenu1->id)->get();
            if (count($sousmenus2)>0) {
                foreach ($sousmenus2 as $sousmenu2){
                    $sousmenu2->principal='Abonnement';
                    $sousmenu2 -> save();
    
                    $sousmenus3 = SousMenu3::where('parent_id', $sousmenu2->id)->get();
                    if(count($sousmenus3)>0) {
                        foreach ($sousmenus3 as $sousmenu3){
                            $sousmenu3->principal='Abonnement';
                            $sousmenu3 -> save();
        
                            $sousmenus4 = SousMenu4::where('parent_id', $sousmenu3->id)->get();
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
    }
}
