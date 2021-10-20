<?php

namespace App\Http\Livewire\Install;

use App\Concerns\Livewire\IsWizard;
use App\Constants\InstallWizardSteps;
use Livewire\Component;
use Nette\NotImplementedException;

class Wizard extends Component
{
    use IsWizard;

    public string $connectionHost     = '';
    public string $connectionPort     = '3306';
    public string $connectionDatabase = '';
    public string $connectionUsername = '';
    public string $connectionPassword = '';

    public string $username = '';
    public string $password = '';

    /**
     * Set the initial step.
     *
     * @return string
     */
    public function initialStep(): string
    {
        return InstallWizardSteps::SYSTEM_REQUIREMENTS;
    }

    /**
     * The steps for the installation process.
     *
     * @return array
     */
    public function steps(): array
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
     * The title for the wizard.
     *
     * @return array
     */
    public function getWizardTitle(): string
    {
        return 'Install';
    }

    /**
     * The steps path for the wizard.
     *
     * @return array
     */
    public function getWizardStepsPath(): string
    {
        return 'livewire.install.steps';
    }

    /**
     * Complete the installation process.
     *
     * @return void
     * @throws NotImplementedException
     */
    public function completeSteps(): void
    {
        throw new NotImplementedException;

        $this->reset();
    }
}
