<?php
namespace App\Http\Controllers;


use App\Http\Ussd\Actions\Middleware;
use Illuminate\Http\Request;
use Sparors\Ussd\Facades\Ussd;
use Spatie\ArrayToXml\ArrayToXml;
class UssdController extends Controller
{
    public function index(Request $request)
    {    
	    // Nouveau : Déterminer le Content-Type en fonction de l'environnement
        $contentType = env('USSD_SIMULATOR') ? 'application/json' : 'application/xml';
		
		$ussd = Ussd::machine()
            ->set(
                [
                'network' => $request->query('sc'),
                'phoneNumber' => $request->query('msisdn'),
                'input' => $request->query('user_input'),
                'sessionId' => $request->query('session_id'),
                'req_no' => $request->query('req_no'),
                'screen_id' => $request->query('screen_id'),
                ]
            )
            ->setInitialState(Middleware::class)
			->setResponse(function(string $message, string $action) {
				return $message;
			});

			// Retourner la réponse avec les en-têtes appropriés
			return response($ussd->run())
			    ->header("Content-Type",  $contentType)
				->header("Access-Control-Allow-Origin",  "*");
    }
}
