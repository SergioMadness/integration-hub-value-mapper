<?php

declare(strict_types=1);

namespace professionalweb\IntegrationHub\ValueMapper\Models;

use professionalweb\IntegrationHub\IntegrationHubCommon\Interfaces\Models\SubsystemOptions;

/**
 * Subsystem options
 * @package professionalweb\IntegrationHub\ValueMapper\Models
 */
class PairExistsOptions implements SubsystemOptions
{
    /**
     * Get available fields for mapping
     */
    public function getAvailableFields(): array
    {
        return [
            'namespace' => 'Namespace',
            'key' => 'Key',
            'value' => 'Value',
        ];
    }

    /**
     * Get service settings
     */
    public function getOptions(): array
    {
        return [
            'namespace' => [
                'name' => 'Namespace',
                'type' => 'string',
            ],
        ];
    }

    /**
     * Get array fields, that subsystem generates
     */
    public function getAvailableOutFields(): array
    {
        return [];
    }
}
