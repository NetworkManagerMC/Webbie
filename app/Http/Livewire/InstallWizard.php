<?php

namespace App\Http\Livewire;

use App\Constants\InstallWizardSteps;
use Livewire\Component;
use Nette\NotImplementedException;

class InstallWizard extends Component
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
        $steps = static::steps();

        $step = array_search($this->currentStep, $steps) + 1;

        return "{$step}/".count($steps);
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
        return view('livewire.install-wizard');
    }
}
