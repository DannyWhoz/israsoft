<x-text.title class="text-center my-10">
    {{ __('Registration') }}
</x-text.title>
<form action="{{ route('store_players', $game->id) }}" method="post" class="w-[80%] m-auto">
    @csrf
    <div class="grid grid-cols-2 grid-rows-4 gap-6">
        <div class="flex relative">
            <x-label id="name_label" for="name">{{ __('Name') }}</x-label>
            <x-input type="text" name="name" id="input_name"/>
        </div>
        <div class="flex relative">
            <x-label id="surname_label" for="surname">{{ __('Surname') }}</x-label>
            <x-input type="text" name="surname" id="input_surname"/>
        </div>
        <div class="flex relative">
            <x-label id="callsign_label" for="callsign">{{ __('Call sign') }}</x-label>
            <x-input type="text" name="callsign" id="input_callsign"/>
        </div>
        <div class="flex relative">
            <x-label id="email_label" for="email">{{ __('Email') }}</x-label>
            <x-input type="email" name="email" id="input_email"/>
        </div>
        <div class="flex relative">
            <x-label id="phone_label" for="phone">{{ __('Phone') }}</x-label>
            <x-input type="text" name="phone" id="input_phone"/>
        </div>
        <div class="flex relative">
            <x-label id="team_label" for="team">{{ __('Team') }}</x-label>
            <x-select name="team" id="input_team" :teams="$teams" :teams_count="$teams_count"/>
        </div>
        <x-button value="Play" class="w-full"/>
    </div>
</form>