<?php

return [

    'connection' => [
        'host' => 'Connection Host',
        'port' => 'Connection Port',
        'database' => 'Connection Database',
        'username' => 'Connection Username',
        'password' => 'Connection Password',
    ],

    'title' => 'Install',

    'system-requirements' => [
        'title' => 'System Requirements',
        'missing' => 'There were some server requirements that have not been met for the application. The following list will show the missing requirements in red.',
    ],

    'database-connection' => [
        'could-not-connect' => 'There is an error with the connection credentials entered.',
    ],

    'installation-review' => [
        'title' => 'Installation Review',
        'summary' => 'The Webbie application is nearly installed. In order to complete the installation process you must press the finish button from below. This will write the connection details to the private ".env" file and create an administrator account for NetworkManagerMC using the credentials you\'ve entered.',
        'alert' => 'Once the system is finished installing, you will gain the full power and convenience of NetworkManagerMC\'s Webbie.',
    ],

];
