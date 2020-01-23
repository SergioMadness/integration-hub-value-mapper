<?php namespace professionalweb\IntegrationHub\ValueMapper\Listeners;

use professionalweb\IntegrationHub\ValueMapper\Interfaces\GetValueMapSubsystem;
use professionalweb\IntegrationHub\ValueMapper\Interfaces\SetValueMapSubsystem;
use professionalweb\IntegrationHub\IntegrationHubCommon\Interfaces\Events\EventToProcess;

class NewEventListener
{
    public function handle(EventToProcess $eventToProcess)
    {
        if ($eventToProcess->getProcessOptions()->getSubsystemId() === SetValueMapSubsystem::SUBSYSTEM_ID) {
            return app(SetValueMapSubsystem::class);
        }

        if ($eventToProcess->getProcessOptions()->getSubsystemId() === GetValueMapSubsystem::SUBSYSTEM_ID) {
            return app(GetValueMapSubsystem::class);
        }
    }
}