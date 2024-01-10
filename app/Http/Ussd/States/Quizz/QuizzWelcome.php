<?php

namespace App\Http\Ussd\States\Quizz;

use Sparors\Ussd\State;

class QuizzWelcome extends State
{
    protected function beforeRendering(): void
    {
        
        $menus = [
           'Consulter ses points',
           'Liste des gagnants: Semaine 1',
           'Demander de l\'aide',
            'Se desabonner'
        ];
        $this->menu->xmlmenu(
            [
            'screen_type'                     => 'Menu',
            'text'                            => 'Quiz SMS Moov Africa',
            'list'                            => $menus,
            'back_link'                       => 0,
            'home_link'                       => 1,
            'session_op'                      => 'continue',
            'screen_id'                       => 1,

            ]
        );
    }
    protected function afterRendering(string $argument): void
    {
        $this->decision
            ->equal('1', CheckScore::class)
            ->equal('2', CheckIfWinner::class)
            ->equal('3', Help1::class)
            ->equal('4', Unsuscribe::class)
            ->any(Error::class);
    }
}
