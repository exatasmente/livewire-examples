<?php

namespace App\Http\Livewire;

use App\Screencast;
use App\UiAction;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class ExploreCode extends Component
{
    public $screencast;

    public function mount(Screencast $screencast)
    {
        $this->screencast = $screencast;
    }

    public function sendInvite()
    {
        Http::withToken(env('GITHUB_TOKEN'))
            ->put('https://api.github.com/repos/livewire/surge/collaborators/'.auth()->user()->github_username, ['permissions' => 'pull']);

        UiAction::markInviteAsSent(auth()->user());
    }

    public function getHasProperty()
    {

    }

    public function render()
    {
        return view('livewire.explore-code');
    }
}
