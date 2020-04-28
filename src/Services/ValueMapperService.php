<?php namespace professionalweb\IntegrationHub\ValueMapper\Services;

use professionalweb\IntegrationHub\ValueMapper\Models\Value;
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
     * @param $key1
     * @param $key2
     */
    public function put($key1, $key2): void
    {
        $this->getValueMapRepository()->createMap($key1, $key2);
    }

    /**
     * Get item
     *
     * @param string $namespace
     * @param        $key
     *
     * @return mixed
     */
    public function get(string $namespace, $key)
    {
        /** @var Value $model */
        $model = $this->getValueMapRepository()->getMap($namespace, $key);
        if ($model !== null) {
            return $model->value;
        }

        return null;
    }
}