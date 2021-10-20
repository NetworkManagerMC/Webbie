<?php

namespace App\Concerns\Livewire;

trait IsWizard
{
    /**
     * The current step we're on.
     *
     * @var string
     */
    public string $currentStep;

    /**
     * Mount the component instance.
     *
     * @return void
     */
    public function mountIsWizard(): void
    {
        $this->currentStep = $this->initialStep();

        $this->determineStepIndex();
    }

    /**
     * Set the initial step.
     *
     * @return string
     */
    abstract public function initialStep(): string;

    /**
     * The steps for the wizard.
     *
     * @return array
     */
    abstract public function steps(): array;

    /**
     * The title for the wizard.
     *
     * @return array
     */
    abstract public function getWizardTitle(): string;

    /**
     * The steps path for the wizard.
     *
     * @return array
     */
    abstract public function getWizardStepsPath(): string;

    /**
     * The progress through the wizard process.
     *
     * @return string
     */
    public function getProgress(): string
    {
        $step = $this->stepIndex + 1;

        return "{$step}/".count($this->steps());
    }

    /**
     * Determine the step index.
     *
     * @return void
     */
    public function determineStepIndex(): void
    {
        $this->stepIndex = array_search($this->currentStep, $this->steps());
    }

    /**
     * "Travel" to the next step.
     *
     * @return void
     */
    public function nextStep(): void
    {
        if (! $this->hasNextStep()) return;

        $prospective = $this->steps()[$this->stepIndex + 1];

        $this->preStepChange($this->currentStep, $prospective);

        $this->currentStep = $prospective;

        $this->afterStepChange();
    }

    /**
     * "Travel" to the previous step.
     *
     * @return void
     */
    public function previousStep(): void
    {
        if (! $this->hasPreviousStep()) return;

        $prospective = $this->steps()[$this->stepIndex - 1];

        $this->preStepChange($this->currentStep, $prospective);

        $this->currentStep = $prospective;

        $this->afterStepChange();
    }

    /**
     * Fired after the step changes, either forward or backwards.
     *
     * @return void
     */
    public function afterStepChange(): void
    {
        $this->determineStepIndex();
    }

    /**
     * Fired before a step changes, either forward or backwards.
     *
     * @param string $current
     * @param string $prospective
     * @return void
     */
    public function preStepChange(string $current, string $prospective): void
    {
        //
    }

    /**
     * Determine if there is a next step.
     *
     * @return bool
     */
    public function hasNextStep(): bool
    {
        return ($this->stepIndex + 1) < count($this->steps());
    }

    /**
     * Determine if there is a previous step.
     *
     * @return bool
     */
    public function hasPreviousStep(): bool
    {
        return ($this->stepIndex - 1) >= 0;
    }

    /**
     * Determine if the wizard is on the final step.
     *
     * @return bool
     */
    public function isFinalStep(): bool
    {
        return ($this->stepIndex + 1) === count($this->steps());
    }

    /**
     * Complete the wizard.
     *
     * @return void
     * @throws NotImplementedException
     */
    abstract public function completeSteps(): void;

    public function render()
    {
        return <<<'blade'
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">
                        {{ $this->getWizardTitle() }} ({{ $this->getProgress() }})
                    </h3>
                </div>

                <div class="card-body">
                    @include("{$this->getWizardStepsPath()}.{$currentStep}")

                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                        <button @echoIf(! $this->hasPreviousStep(), 'disabled') wire:click="previousStep" type="button" class="btn btn-primary">Previous</button>
                        @if ($this->isFinalStep())
                            <button wire:click="completeSteps" type="button" class="btn btn-primary">Finish</button>
                        @else
                            <button @echoIf(! $this->hasNextStep(), 'disabled') wire:click="nextStep" type="button" class="btn btn-primary">Next</button>
                        @endif
                    </div>
                </div>
            </div>
        blade;
    }
}
