<?php

namespace App\Observers;

use App\Models\Agendamento;


class AgendamentoObserver
{
    /**
     * Handle the Agendamento "created" event.
     */
    public function created(Agendamento $agendamento): void
    {
        //
    }

    /**
     * Handle the Agendamento "updated" event.
     */
    public function updated(Agendamento $agendamento)
    {


    }
    /**
     * Handle the Agendamento "deleted" event.
     */
    public function deleted(Agendamento $agendamento): void
    {
        //
    }

    /**
     * Handle the Agendamento "restored" event.
     */
    public function restored(Agendamento $agendamento): void
    {
        //
    }

    /**
     * Handle the Agendamento "force deleted" event.
     */
    public function forceDeleted(Agendamento $agendamento): void
    {
        //
    }
}
