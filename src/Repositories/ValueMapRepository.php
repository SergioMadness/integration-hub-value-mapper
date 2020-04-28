<?php namespace professionalweb\IntegrationHub\ValueMapper\Repositories;

use professionalweb\IntegrationHub\ValueMapper\Models\Value;
use professionalweb\IntegrationHub\ValueMapper\Models\ValueMap;
use professionalweb\IntegrationHub\IntegrationHubCommon\Interfaces\Models\Model;
use professionalweb\IntegrationHub\IntegrationHubDB\Repositories\BaseRepository;
use professionalweb\IntegrationHub\ValueMapper\Interfaces\Repositories\ValueMapRepository as IValueMapRepository;

/**
 * Repository for value map
 * @package professionalweb\IntegrationHub\ValueMapper\Repositories
 */
class ValueMapRepository extends BaseRepository implements IValueMapRepository
{
    public function __construct()
    {
        $this->setModelClass(ValueMap::class);
    }

    /**
     * Create map
     *
     * @param string $namespace
     * @param        $key1
     * @param        $key2
     *
     * @return ValueMap
     */
    public function createMap(string $namespace, $key1, $key2): ValueMap
    {
        $first = Value::query()->create([
            'value' => $key1,
        ]);
        $second = Value::query()->create([
            'value' => $key2,
        ]);

        return ValueMap::query()->updateOrCreate([
            'first_id'  => $first->id,
            'second_id' => $second->id,
            'namespace' => $namespace,
        ]);
    }

    /**
     * @param int|string $id
     *
     * @return null|Value
     */
    public function model($id): ?Model
    {
        /** @var ValueMap $map */
        $map = ValueMap::query()->where('first_id', md5($id))->first();
        if ($map !== null) {
            return $map->secondKey;
        }

        return null;
    }
}