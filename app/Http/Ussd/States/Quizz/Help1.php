<?php

namespace App\Http\Ussd\States\Quizz;

use Sparors\Ussd\State;
use Illuminate\Support\Facades\Http;

class Help1 extends State
{
    protected function beforeRendering(): void
    {
        $msisdn = request()->get('msisdn');
		$api=setting('admin.api_opera');
		
		$response = Http::get($api.'/quizmoovbn/get_subscription.php', [
            'msisdn' => '229'.$msisdn,
            'request' => 'help',
        ]);
		
        //$response = Http::get('http://213.246.36.116/quizmoovbn/get_subscription.php', [
        //    'msisdn' => '229'.$msisdn,
        //    'request' => 'help',
        //]);
        /*$response = trim($response);

        $this->menu->xmlmenu([
            'screen_type'                     => 'Menu',
            'text'                            => 'Quiz sms de MOOV Africa, Envoie Moov au 7002 et reponds aux questions qui te seront posees par 1, 2 ou 3 pour cumuler des points et tenter de gagner . . .',
            'list'                            => ['Suivant'],
            'back_link'                       => 0,
            'home_link'                       => 1,
            'session_op'                      => 'continue',
            'screen_id'                       => 1,
        ]);*/
		if ($response->successful()) {
            $responseText = trim($response);

            $this->menu->xmlmenu([
                'screen_type' => 'Menu',
                'text' => 'Quiz sms de MOOV Africa, Envoie Moov au 7002 et reponds aux questions qui te seront posees par 1, 2 ou 3 pour cumuler des points et tenter de gagner . . .',
                'list' => ['Suivant'],
                'back_link' => 0,
                'home_link' => 1,
                'session_op' => 'continue',
                'screen_id' => 1,
            ]);
        } 
    }
    protected function afterRendering(string $argument): void
    {
        $this->decision
        ->equal('1', Help2::class)
        ->any(Error::class);
    }
}
