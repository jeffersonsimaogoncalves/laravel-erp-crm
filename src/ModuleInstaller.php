<?php

declare(strict_types=1);

namespace JustSteveKing\Laravel\ERP\CRM;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use JustSteveKing\Laravel\ERPContracts\Module\InstallerContract;

class ModuleInstaller implements InstallerContract
{
    public function install(): void
    {
        Artisan::call(
            command: 'vendor:publish',
            parameters: [
                'provider' => 'JustSteveKing\Laravel\ERP\CRM\CRMServiceProvider',
                'tag' => 'laravel-erp-crm-migrations',
            ],
        );

        Artisan::call(
            command: 'vendor:publish',
            parameters: [
                'provider' => 'JustSteveKing\Laravel\ERP\CRM\CRMServiceProvider',
                'tag' => 'laravel-erp-crm-config',
            ],
        );
        Log::info(
            message: 'Installing module juststeveking/laravel-erp-crm',
        );
    }
}
