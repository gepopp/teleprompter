<?php

use Illuminate\Support\Collection;
use Livewire\Component;

new class extends Component {

    public int $event_id = 0;

    public function updatedEventId($id)
    {
        return redirect(route('questions', $id), true);
    }

    #[\Livewire\Attributes\Computed]
    public function events()
    {
        return \App\Models\Event::orderBy('event_date')->limit(5)->get();
    }
};
?>

<div class="w-screen h-screen flex items-center justify-center">
    <div class="max-w-2xl">
        <flux:radio.group label="Events" variant="cards" class="flex-col" wire:model.live="event_id">
            @foreach ($this->events as $event)
                <flux:radio value="{{ $event->id }}" label="{{ $event->name }}" description="{{ $event->event_date->format('d.m.Y H:i') }}" />
            @endforeach
        </flux:radio.group>
    </div>
</div>