<?php

namespace App\Http\Traits;

/**
 *
 */
trait HideModal
{
    /**
     * @param $modalId
     * @return void
     */
    public function closeModal($modalId): void
    {
        $this->dispatchBrowserEvent('hideModal', ['modalId' => $modalId]);
    }

    public function showModal($modalId): void
    {
        $this->dispatchBrowserEvent('showModal', ['modalId' => $modalId]);
    }

    public function startSelect2($modalId): void
    {
        $this->dispatchBrowserEvent('startSelect2', ['modalId' => $modalId]);
    }
}
