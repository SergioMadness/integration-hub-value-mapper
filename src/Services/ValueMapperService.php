<?php

declare(strict_types=1);

namespace professionalweb\IntegrationHub\ValueMapper\Services;

use professionalweb\IntegrationHub\ValueMapper\Models\ValueMap;
use professionalweb\IntegrationHub\ValueMapper\Traits\UseValueMapRepository;
use professionalweb\IntegrationHub\ValueMapper\Interfaces\Repositories\ValueMapRepository;
use professionalweb\IntegrationHub\ValueMapper\Interfaces\ValueMapperService as IValueMapperService;

/**
 * Service to map values
 * @package professionalweb\IntegrationHub\ValueMapper\Services
 */
class ValueMapperService implements IValueMapperService
{
    use UseValueMapRepository;

    public function __construct(ValueMapRepository $valueMapRepository)
    {
        $this->setValueMapRepository($valueMapRepository);
    }

    /**
     * Set mapping
     *
     * @param        $key1
     * @param        $key2
     */
    public function put(string $namespace, $key1, $key2): void
    {
        if (!$this->exists($namespace, $key1, $key2)) {
            $this->getValueMapRepository()->createMap($namespace, $key1, $key2);
        }
    }

    /**
     * Check pair exists
     *
     * @param        $item1
     * @param        $item2
     */
    public function exists(string $namespace, $item1, $item2): bool
    {
        return $this->getValueMapRepository()->exists($namespace, $item1, $item2);
    }

    /**
     * Get item
     *
     * @param        $key
     */
    public function get(string $namespace, $key): array
    {
        /** @var ValueMap $model */
        $model = $this->getValueMapRepository()->getMap($namespace, $key);
        if ($model !== null) {
            return [
                'key' => $model->firstKey->value,
                'value' => $model->secondKey->value,
            ];
        }

        return [];
    }
}