<?php namespace professionalweb\IntegrationHub\ValueMapper\Interfaces\Repositories;

use professionalweb\IntegrationHub\ValueMapper\Models\ValueMap;
use professionalweb\IntegrationHub\IntegrationHubCommon\Interfaces\Repositories\Repository;

/**
 * Interface for value map repository
 * @package professionalweb\IntegrationHub\ValueMapper\Interfaces\Repositories
 *
 * @method model($id): ?Value
 */
interface ValueMapRepository extends Repository
{
    /**
     * Create map
     *
     * @param $key1
     * @param $key2
     *
     * @return ValueMap
     */
    public function createMap($key1, $key2): ValueMap;
}