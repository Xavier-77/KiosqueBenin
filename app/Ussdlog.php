<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\CodeCourt;


class Ussdlog extends Model
{
    protected $table = 'ussdlogs';
    protected $fillable = ['numero','type','sc_id','details'];

    static function log($numero, $type, $shortcode, $details)
    {

        $sc_id = CodeCourt::where('nom', $shortcode)->first();
        Ussdlog::create(
            [
            'numero'=> $numero,
            'type' => $type,
            'sc_id'=> $sc_id ? $sc_id->id : $shortcode,
            'details'=>$details
            ]
        );
    }
}
