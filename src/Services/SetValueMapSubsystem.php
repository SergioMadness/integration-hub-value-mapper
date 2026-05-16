<?php

declare(strict_types=1);

namespace professionalweb\IntegrationHub\ValueMapper\Services;

use professionalweb\IntegrationHub\ValueMapper\Models\SetValueMapOptions;
use professionalweb\IntegrationHub\IntegrationHubCommon\Interfaces\EventData;
use professionalweb\IntegrationHub\ValueMapper\Interfaces\ValueMapperService;
use professionalweb\IntegrationHub\IntegrationHubCommon\Interfaces\Services\Subsystem;
use professionalweb\IntegrationHub\IntegrationHubCommon\Interfaces\Models\ProcessOptions;
use professionalweb\IntegrationHub\IntegrationHubCommon\Interfaces\Models\SubsystemOptions;
use professionalweb\IntegrationHub\ValueMapper\Interfaces\SetValueMapSubsystem as ISetValueMapSubsystem;

/**
 * Value mapper subsystem
 * @package professionalweb\IntegrationHub\ValueMapper\Services
 */
class SetValueMapSubsystem implements ISetValueMapSubsystem
{
    private ProcessOptions $processOptions;

    private ValueMapperService $valueMapperService;

    public function __construct(ValueMapperService $valueMapperService)
    {
        $this->setValueMapperService($valueMapperService);
    }

    /**
     * Get available options
     */
    public function getAvailableOptions(): SubsystemOptions
    {
        return new SetValueMapOptions();
    }

    /**
     * Process event data
     */
    public function process(EventData $eventData): EventData
    {
        $this->getValueMapperService()->put($this->getProcessOptions()->getOptions()['namespace'] ?? 'default', $eventData->get('key'), $eventData->get('value'));

        return $eventData;
    }

    public function getValueMapperService(): ValueMapperService
    {
        return $this->valueMapperService;
    }

    /**
     * @return $this
     */
    public function setValueMapperService(ValueMapperService $valueMapperService): self
    {
        $this->valueMapperService = $valueMapperService;

        return $this;
    }

    public function getProcessOptions(): ProcessOptions
    {
        return $this->processOptions;
    }

    /**
     * Set options with values
     */
    public function setProcessOptions(ProcessOptions $options): Subsystem
    {
        $this->processOptions = $options;

        return $this;
    }
}