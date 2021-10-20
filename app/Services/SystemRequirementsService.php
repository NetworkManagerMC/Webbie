<?php

namespace App\Services;

/**
 * This class has been written by @rashidlaasri.
 *
 * @url https://github.com/rashidlaasri/LaravelInstaller/blob/master/src/Helpers/RequirementsChecker.php
 */
class SystemRequirementsService
{
    /**
     * Minimum PHP Version Supported.
     *
     * @var _minPhpVersion
     */
    private $_minPhpVersion = '8.0.0';

    /**
     * Check for the server requirements.
     *
     * @return array
     */
    public function check()
    {
        $requirements = [
            'php' => [
                'openssl',
                'pdo',
                'mbstring',
                'tokenizer',
                'JSON',
                'cURL',
            ],
            'apache' => [
                'mod_rewrite',
            ],
        ];

        $results = [];

        foreach ($requirements as $type => $requirement) {
            switch ($type) {
                // check php requirements
                case 'php':
                    foreach ($requirements[$type] as $requirement) {
                        $results['requirements'][$type][$requirement] = true;

                        if (! extension_loaded($requirement)) {
                            $results['requirements'][$type][$requirement] = false;

                            $results['errors'] = true;
                        }
                    }
                    break;
                // check apache requirements
                case 'apache':
                    foreach ($requirements[$type] as $requirement) {
                        // if function doesn't exist we can't check apache modules
                        if (function_exists('apache_get_modules')) {
                            $results['requirements'][$type][$requirement] = true;

                            if (! in_array($requirement, apache_get_modules())) {
                                $results['requirements'][$type][$requirement] = false;

                                $results['errors'] = true;
                            }
                        }
                    }
                    break;
            }
        }

        return $results;
    }

    /**
     * Check PHP version requirement.
     *
     * @return array
     */
    public function checkPHPversion()
    {
        $minVersionPhp = $this->getMinPhpVersion();
        $currentPhpVersion = $this->getPhpVersionInfo();

        $supported = false;

        if (version_compare($currentPhpVersion['version'], $minVersionPhp) >= 0) {
            $supported = true;
        }

        $phpStatus = [
            'full' => $currentPhpVersion['full'],
            'current' => $currentPhpVersion['version'],
            'minimum' => $minVersionPhp,
            'supported' => $supported,
        ];

        return $phpStatus;
    }

    /**
     * Get current Php version information.
     *
     * @return array
     */
    private static function getPhpVersionInfo()
    {
        $currentVersionFull = PHP_VERSION;
        preg_match("#^\d+(\.\d+)*#", $currentVersionFull, $filtered);
        $currentVersion = $filtered[0];

        return [
            'full' => $currentVersionFull,
            'version' => $currentVersion,
        ];
    }

    /**
     * Get minimum PHP version ID.
     *
     * @return string _minPhpVersion
     */
    protected function getMinPhpVersion()
    {
        return $this->_minPhpVersion;
    }
}
