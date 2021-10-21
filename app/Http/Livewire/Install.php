<?php

namespace App\Http\Livewire;

use App\Concerns\Livewire\IsWizard;
use App\Constants\InstallWizardSteps;
use App\Services\SystemRequirementsService;
use Illuminate\Database\Capsule\Manager;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Nette\NotImplementedException;
use PDOException;
use Throwable;

class Install extends Component
{
    use IsWizard;

    /**
     * The system requirements check results.
     *
     * @var array
     */
    public array $systemRequirements;

    /**
     * Filled during the database connection step.
     *
     * @vars string
     */
    public string $connectionHost     = '';
    public string $connectionPort     = '3306';
    public string $connectionDatabase = '';
    public string $connectionUsername = '';
    public string $connectionPassword = '';

    /**
     * Filled during the create user account step.
     *
     * @vars string
     */
    public string $username = '';
    public string $password = '';

    /**
     * Mount the component.
     *
     * @return void
     */
    public function mount(): void
    {
        $this->determineSystemRequirements();
    }

    /**
     * Determine the system requirements check results.
     *
     * @return void
     */
    public function determineSystemRequirements(): void
    {
        $checker = new SystemRequirementsService;

        $this->systemRequirements = [
            'php' => $checker->checkPHPversion(),
            'modules' => $checker->check(),
        ];
    }

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
        return __('install.title');
    }

    /**
     * The steps path for the wizard.
     *
     * @return array
     */
    public function getWizardStepsPath(): string
    {
        return 'livewire.install';
    }

    /**
     * Fired before a step changes, either forward or backwards.
     *
     * @param string $current
     * @param string $prospective
     * @param string $direction
     * @return void
     */
    public function preStepChange(string $current, string $prospective, string $direction): void
    {
        if ($direction !== static::$FORWARD) return;

        if ($current === InstallWizardSteps::DATABASE_CONNECTION) {
            $this->validateDatabaseConnectionStep();

            return;
        }

        if ($current === InstallWizardSteps::CREATE_USER_ACCOUNT) {
            $this->validateCreateUserAccountStep();

            return;
        }
    }

    /**
     * Validate the database connection step.
     *
     * @return void
     * @throws Throwable
     * @throws ValidationException
     */
    public function validateDatabaseConnectionStep(): void
    {
        $rules = [
            'connectionHost' => ['required', 'string'],
            'connectionPort' => ['required', 'numeric'],
            'connectionDatabase' => ['required', 'string'],
            'connectionUsername' => ['required', 'string'],
            'connectionPassword' => ['required', 'string'],
        ];

        $this->validate($rules);

        app(Manager::class)->addConnection([
            'driver' => 'mysql',
            'host' => $this->connectionHost,
            'port' => $this->connectionPort,
            'database' => $this->connectionDatabase,
            'username' => $this->connectionUsername,
            'password' => $this->connectionPassword,
        ], 'prospective');

        try {
            DB::connection('prospective')->getPdo();
        } catch (PDOException $exception) {
            $validator = Validator::make([], $rules, ['required' => __('install.database-connection.could-not-connect')]);

            foreach (array_keys($rules) as $key) {
                $validator->addFailure($key, 'required');
            }

            $validator->validate();
        }
    }

    /**
     * Validate the create user account step.
     *
     * @return void
     * @throws Throwable
     * @throws ValidationException
     */
    public function validateCreateUserAccountStep(): void
    {
        $this->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);
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

        $this->redirectRoute('index');
    }
}
