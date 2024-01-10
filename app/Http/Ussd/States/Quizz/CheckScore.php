<?php

namespace App\Http\Ussd\States\Quizz;

use Sparors\Ussd\State;
use Illuminate\Support\Facades\Http;

class CheckScore extends State
{
    protected function beforeRendering(): void
    {
        $msisdn = request()->get('msisdn');
		
		//setting('admin.api_key')setting('admin.api_opera')
		$api=setting('admin.api_opera');
		$response = Http::get($api.'/quizmoovbn/get_subscription.php', [
            'msisdn' => '229'.$msisdn,
            'request' => 'score',
        ]);
		
        //$response = Http::get($api.'/quizmoovbn/get_subscription.php', [
        //    'msisdn' => '229'.$msisdn,
        //    'request' => 'score',
        ///]);
        /*$response = trim($response);

        $this->menu->xmlmenu([
            'screen_type'                     => 'Menu',
            'text'                            => $response,
            'list'                            => [],
            'back_link'                       => 0,
            'home_link'                       => 1,
            'session_op'                      => 'continue',
            'screen_id'                       => 1,

        ]);*/
		if ($response->successful()) {
            $responseText = trim($response);

            $this->menu->xmlmenu([
                'screen_type' => 'Menu',
                'text' => $responseText,
                'list' => [],
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
   
        ->any(Error::class);
    }
}
