<?php

namespace App\Http\Ussd\States\Affinity;

use Error;
use Sparors\Ussd\State;

class Result extends State
{
    protected function beforeRendering(): void
    {
        $male = $this->record->get('male');
        $female = $this->record->get('female');
        
		$response = $male.' est, sera et restera l\'homme de la vie de '.$female;
        
		$this->record->delete('male');
        $this->record->delete('female');
        
		$this->menu->xmlmenu(
            [
            'screen_type'                     => 'Menu',
            'text'                            => $response,
            'list'                            => [],
            'back_link'                       => 0,
            'home_link'                       => 1,
            'session_op'                      => 'continue',
            'screen_id'                       => 1,
            ]
        );
        
    }
    protected function afterRendering(string $argument): void
    {
        $this->decision->any(Error::class);
    }
}
