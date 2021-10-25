@props([
'relationship' => false,
'title' => 'elemento',
'modes' => \App\Http\Livewire\Form\SharedForm::FORM_MODES,
'showRelationship' => false,
'showErrors' => true,
'maxWidth' => null,
'mode',
])

<div
    @if ($relationship) x-data="{ areModalsOpen: @entangle('areRelationshipModalsOpen') } @endif"
    @stack('listeners')
>
    <form name="{{ $relationship ? 'relation-' : '' }}item-form" data-mode="{{ $mode }}" wire:submit.prevent="handleForm">
        <x-jet-dialog-modal
            id="{{ $relationship ? 'relation-' : '' }}item-modal"
            wire:model="showModal"
            :maxWidth="$maxWidth"
        >
            <x-slot name="title">
                <span>
                    @switch ($mode)
                        @case ($modes['add']) Crea @break
                        @case ($modes['edit']) Modifica @break
                        @default Visualizza
                    @endswitch
                </span>

                {{ $title }}
            </x-slot>

            <x-slot name="content">
                @if ($showErrors) <x-jet-validation-errors /> @endif

                <fieldset
                    x-data="{
                        mode: @entangle('formMode').defer,
                        isShowMode() {
                            return this.mode === '{{ $modes['show'] }}';
                        },
                        getReadonlyClasses(...except) {
                            let classes = [ 'form-control-plaintext', 'bg-white', 'px-2' ];

                            if (this.isShowMode()) {
                                if (except && except.length > 0) {
                                    classes = classes.filter((c) => !except.includes(c));
                                }

                                return classes.join(' ');
                            }

                            return '';
                        },
                        toggleHelp(help, input) {
                            help.style.display = input.value ? 'none' : 'block';
                        }
                    }"
                    x-bind:disabled="isShowMode()"
                    x-cloak
                >
                    {{ $slot }}
                </fieldset>
            </x-slot>

            <x-slot name="footer">
                {{ $footer }}
            </x-slot>
        </x-jet-dialog-modal>
    </form>

    @isset($modals)
        {{ $modals }}
    @endisset
</div>
