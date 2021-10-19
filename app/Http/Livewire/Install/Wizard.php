<?php

namespace App\Http\Livewire\Install;

use App\Constants\InstallWizardSteps;
use Livewire\Component;
use Nette\NotImplementedException;

class Wizard extends Component
{
    /**
     * The current step we're on.
     *
     * @var string
     */
    public string $currentStep = InstallWizardSteps::SYSTEM_REQUIREMENTS;

    /**
     * The steps for the installation process.
     *
     * @return array
     */
    public static function steps(): array
    {
        // Defining these explicitly to ensure their step-order is maintained.
        return [
            InstallWizardSteps::SYSTEM_REQUIREMENTS,
            InstallWizardSteps::DATABASE_CONNECTION,
            InstallWizardSteps::CREATE_USER_ACCOUNT,
            InstallWizardSteps::INSTALLATION_REVIEW,
        ];
    }

    /**
     * The progress through the installation process.
     *
     * @return string
     */
    public function getProgressProperty(): string
    {
        $step = $this->stepIndex + 1;

        return "{$step}/".count(static::steps());
    }

    /**
     * Get the step index.
     *
     * @return int
     */
    public function getStepIndexProperty(): int
    {
        return array_search($this->currentStep, static::steps());
    }

    /**
     * "Travel" to the next step.
     *
     * @return void
     */
    public function nextStep(): void
    {
        if (! $this->hasNextStep) return;

        $this->currentStep = static::steps()[$this->stepIndex + 1];
    }

    /**
     * "Travel" to the previous step.
     *
     * @return void
     */
    public function previousStep(): void
    {
        if (! $this->hasPreviousStep) return;

        $this->currentStep = static::steps()[$this->stepIndex - 1];
    }

    /**
     * Determine if there is a next step.
     *
     * @return bool
     */
    public function getHasNextStepProperty(): bool
    {
        return ($this->stepIndex + 1) < count(static::steps());
    }

    /**
     * Determine if there is a previous step.
     *
     * @return bool
     */
    public function getHasPreviousStepProperty(): bool
    {
        return ($this->stepIndex - 1) >= 0;
    }

    /**
     * Determine if the wizard is on the final step.
     *
     * @return bool
     */
    public function getIsFinalStepProperty(): bool
    {
        return ($this->stepIndex + 1) === count(static::steps());
    }

    /**
     * Complete the installation process.
     *
     * @return void
     * @throws NotImplementedException
     */
    public function complete(): void
    {
        throw new NotImplementedException;
    }

    public function render()
    {
        return view('livewire.install.wizard');
    }
}
