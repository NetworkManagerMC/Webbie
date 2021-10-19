<div class="card shadow-lg border-0 rounded-lg">
    <div class="card-header">
        <h3 class="text-center font-weight-light my-4">Install ({{ $this->progress }})</h3>
    </div>

    <div class="card-body">
        @include("livewire.install.steps.{$currentStep}")

        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
            <button @echoIf(! $this->hasPreviousStep, 'disabled') wire:click="previousStep" type="button" class="btn btn-primary">Previous</button>
            <button @echoIf(! $this->hasNextStep, 'disabled') wire:click="nextStep" type="button" class="btn btn-primary">Next</button>
        </div>
    </div>
</div>
