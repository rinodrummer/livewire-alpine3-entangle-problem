{{-- Consumption --}}

@props([
'modes' => \App\Http\Livewire\Form\SharedForm::FORM_MODES,
'disabled' => false,
'componentID',
'item',
'mode',
])

@php
    $invoice = $item->invoice ?? null;
@endphp

<div {{ $attributes }}>
    <x-input.consumption-type
        :componentID="$componentID"
        wire:model.defer="subjectItem.type"
    />

    <div class="row">
        <div class="col">
            <div class="form-group mb-2">
                <label for="consumption-f1">F1</label>
                <input
                    type="number"
                    step="0.0001"
                    id="consumption-f1"
                    wire:model.defer="subjectItem.f1"
                    class="form-control"
                    x-bind:class="getReadonlyClasses()"
                    x-bind:readonly="isShowMode()"
                    placeholder="F1"
                >
            </div>
        </div>

        <div class="col">
            <div class="form-group mb-2">
                <label for="consumption-f2">F2</label>
                <input
                    type="number"
                    step="0.0001"
                    id="consumption-f2"
                    wire:model.defer="subjectItem.f2"
                    class="form-control"
                    x-bind:class="getReadonlyClasses()"
                    x-bind:readonly="isShowMode()"
                    placeholder="F2"
                >
            </div>
        </div>

        <div class="col">
            <div class="form-group mb-2">
                <label for="consumption-f3">F3</label>
                <input
                    type="number"
                    step="0.0001"
                    id="consumption-f3"
                    wire:model.defer="subjectItem.f3"
                    class="form-control"
                    x-bind:class="getReadonlyClasses()"
                    x-bind:readonly="isShowMode()"
                    placeholder="F3"
                >
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="form-group mb-2">
                <label for="consumption-invoiced_power" class="required">Potenza fatturata</label>
                <input
                    type="number"
                    step="0.0001"
                    id="consumption-invoiced_power"
                    wire:model.defer="subjectItem.invoiced_power"
                    class="form-control"
                    x-bind:class="getReadonlyClasses()"
                    x-bind:readonly="isShowMode()"
                    placeholder="Potenza fatturata"
                    required
                >
            </div>
        </div>

        <div class="col">
            <div class="form-group mb-2">
                <label for="consumption-detected_power" class="required">Potenza rilevata</label>
                <input
                    type="number"
                    step="0.0001"
                    id="consumption-detected_power"
                    wire:model.defer="subjectItem.detected_power"
                    class="form-control"
                    x-bind:class="getReadonlyClasses()"
                    x-bind:readonly="isShowMode()"
                    placeholder="Potenza rilevata"
                    required
                >
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="form-group mb-2">
                <label for="consumption-reactive_power_lte_75" class="required">Energia reattiva (&le; 75)</label>
                <input
                    type="number"
                    id="consumption-reactive_power_lte_75"
                    wire:model.defer="subjectItem.reactive_power_lte_75"
                    class="form-control"
                    x-bind:class="getReadonlyClasses()"
                    x-bind:readonly="isShowMode()"
                    placeholder="Energia reattiva (≤ 75)"
                    required
                >
            </div>
        </div>

        <div class="col">
            <div class="form-group mb-2">
                <label for="consumption-reactive_power_gt_75" class="required">Energia reattiva (&gt; 75)</label>
                <input
                    type="number"
                    id="consumption-reactive_power_gt_75"
                    wire:model.defer="subjectItem.reactive_power_gt_75"
                    class="form-control"
                    x-bind:class="getReadonlyClasses()"
                    x-bind:readonly="isShowMode()"
                    placeholder="Energia reattiva (> 75)"
                    required
                >
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="form-group mb-2">
                <label for="consumption-period_start" class="required">Data di inizio</label>
                <input
                    type="date"
                    id="consumption-period_start"
                    wire:model.defer="subjectItem.period_start"
                    class="form-control"
                    x-bind:class="getReadonlyClasses()"
                    x-bind:readonly="isShowMode()"
                    placeholder="Data di inizio"
                    required
                >
            </div>
        </div>

        <div class="col">
            <div class="form-group mb-2">
                <label for="consumption-period_end" class="required">Data di fine</label>
                <input
                    type="date"
                    id="consumption-period_end"
                    wire:model.defer="subjectItem.period_end"
                    class="form-control"
                    x-bind:class="getReadonlyClasses()"
                    x-bind:readonly="isShowMode()"
                    placeholder="Data di fine"
                    required
                >
            </div>
        </div>
    </div>

    <x-input.data-source
        :componentID="$componentID"
        wire:model="subjectItem.data_source"
    />

    <div class="form-group mb-2">
        <label for="consumption-notes">Note</label>
        <textarea
            id="consumption-notes"
            wire:model.defer="subjectItem.notes"
            class="form-control"
            x-ref="textarea"
            {{-- x-on:input="$refs.textarea.value = $refs.textarea.value.trimStart()" --}}
            x-bind:class="getReadonlyClasses()"
            x-bind:readonly="isShowMode()"
            placeholder="Note"
        ></textarea>
    </div>

    <x-input.relationship
        class="mb-2"
        relationEntity="invoice"
        x-bind:class="getReadonlyClasses()"
        :name="(isset($invoice)) ? $invoice->invoice_number : null"
        :singleSelection="true"
        :disabled="$disabled"
        required
    >
        Fattura
    </x-input.relationship>

    @if ($mode === $modes['show'])
        <div class="show-form-details">
            <x-common-form-details :item="$item" />
        </div>
    @endif
</div>
