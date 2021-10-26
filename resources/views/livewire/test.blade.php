<div id="test">
    <x-slot name="header">
        @section('title', 'Test')
        @yield('title')
    </x-slot>

    <div class="app-container">
        <button wire:click="$set('showModal', true)">
            Show modal
        </button>

        <x-jet-modal wire:model="showModal">
            <form>
                <label for="test-name">Name</label>
                <input
                    id="test-name"
                    type="text"
                    wire:model="data.name"
                >

                <label for="test-surname">Surname</label>
                <input
                    id="test-surname"
                    type="text"
                    wire:model.defer="data.surname"
                >
            </form>
        </x-jet-modal>
    </div>
</div>
