<?php

namespace App\Http\Ussd\States\Quizz;

use Sparors\Ussd\State;
use Illuminate\Support\Facades\Http;

class Unsuscribe extends State
{
    protected function beforeRendering(): void
    {
        $msisdn = request()->get('msisdn');
		$api=setting('admin.api_opera');
        $response = Http::get($api.'/quizmoovbn/get_subscription.php', [
            'msisdn' => '229'.$msisdn,
            'request' => 'stopquiz',
        ]);
		
		//$response = Http::get('http://213.246.36.116/quizmoovbn/get_subscription.php', [
        //    'msisdn' => '229'.$msisdn,
        //    'request' => 'stopquiz',
        //]);
		
        if ($response->successful()) {
            $responseText = trim($response->body());
        } else {
            // Gérer l'erreur en conséquence
            $responseText = 'Erreur lors de la requête HTTP';
        }
		
		
        $this->menu->xmlmenu([
            'screen_type'                     => 'Menu',
            'text'                            => $response,
            'list'                            => [],
            'back_link'                       => 0,
            'home_link'                       => 1,
            'session_op'                      => 'continue',
            'screen_id'                       => 1,

        ]);
    }
    protected function afterRendering(string $argument): void
    {
        $this->decision->any(Error::class);
    }
}
