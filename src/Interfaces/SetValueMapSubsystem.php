<?php

declare(strict_types=1);

namespace professionalweb\IntegrationHub\ValueMapper\Interfaces;

use professionalweb\IntegrationHub\IntegrationHubCommon\Interfaces\Services\Subsystem;

/**
 * Interface for value mapper subsystem
 * @package professionalweb\IntegrationHub\ValueMapper\Interfaces
 */
interface SetValueMapSubsystem extends Subsystem
{
    public const SUBSYSTEM_ID_SET = 'value-mapper';
}