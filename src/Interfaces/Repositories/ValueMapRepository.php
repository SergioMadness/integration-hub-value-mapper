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
     * @param string $namespace
     * @param        $key1
     * @param        $key2
     *
     * @return ValueMap
     */
    public function createMap(string $namespace, $key1, $key2): ValueMap;

    /**
     * Get map
     *
     * @param string $namespace
     * @param        $key
     *
     * @return ValueMap
     */
    public function getMap(string $namespace, $key): ?ValueMap;

    /**
     * Check pair exists
     *
     * @param string $namespace
     * @param        $item1
     * @param        $item2
     *
     * @return bool
     */
    public function exists(string $namespace, $item1, $item2): bool;
}