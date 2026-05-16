<?php

declare(strict_types=1);

namespace professionalweb\IntegrationHub\ValueMapper\Services;

use professionalweb\IntegrationHub\ValueMapper\Models\PairExistsOptions;
use professionalweb\IntegrationHub\IntegrationHubCommon\Interfaces\EventData;
use professionalweb\IntegrationHub\ValueMapper\Interfaces\ValueMapperService;
use professionalweb\IntegrationHub\IntegrationHubCommon\Interfaces\Services\Subsystem;
use professionalweb\IntegrationHub\IntegrationHubCommon\Interfaces\Models\ProcessOptions;
use professionalweb\IntegrationHub\IntegrationHubCommon\Interfaces\Models\SubsystemOptions;
use professionalweb\IntegrationHub\ValueMapper\Interfaces\PairExistsSubsystem as IPairExistsSubsystem;

/**
 * Subsystem to check key-value pair exist
 * @package professionalweb\IntegrationHub\ValueMapper\Services
 */
class PairExistsSubsystem implements IPairExistsSubsystem
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
        return new PairExistsOptions();
    }

    /**
     * Process event data
     */
    public function process(EventData $eventData): EventData
    {
        $data = $eventData->getData();
        $data['exists'] = $this->getValueMapperService()->exists($this->getProcessOptions()->getOptions()['namespace'] ?? 'default', $eventData->get('key'), $eventData->get('value'));
        $eventData->setData($data);

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