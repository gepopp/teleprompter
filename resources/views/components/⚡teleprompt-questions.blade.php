<?php

use Livewire\Component;

new class extends Component {

    public \App\Models\Event $event;

    public bool $mirror = false;

    public float $current = 0;

    public function togglemirror()
    {
        $this->mirror = !$this->mirror;
    }

    public function next()
    {
        if ($this->current < count($this->event->questions)) {
            $this->current += .5;
        } else {
            $this->current = 0;
        }
    }

};
?>
<div class="relative">

    <div wire:click="next()" class="cursor-pointer h-screen w-screen flex justify-center bg-black text-white font-medium text-[8vw] pt-10">
        <div @class(["p-2", "-scale-x-100" => $mirror])>
            @if($current == 0)
                <h1 wire:transition>{{ $event->name }}</h1>
            @else
                @if(floor($current) != $current)
                    <h1 wire:transition>Bitte stelle dich vor, wer du bist und was du tust?</h1>
                @else
                    <div wire:transition class="text-center">
                        <small class="text-2xl mb-4 text-center leading-0 animate-pulse">bitte vorlesen und beenden</small>
                        <h1 class="leading-none">{{ $event->questions[$current - 1] }}</h1>
                    </div>
                @endif
            @endif
        </div>
    </div>


    <div class="absolute top-0 right-1">
        <flux:button wire:click="togglemirror()" size="sm" class="m-1 relative !z-[9999]">spiegeln</flux:button>
        <flux:button onclick="document.fullscreenElement ? document.exitFullscreen() : document.documentElement.requestFullscreen()" size="sm" class="m-1 relative !z-[9999]">fullscreen</flux:button>
    </div>
</div>