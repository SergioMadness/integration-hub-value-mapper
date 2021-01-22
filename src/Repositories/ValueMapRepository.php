<?php namespace professionalweb\IntegrationHub\ValueMapper\Repositories;

use Illuminate\Database\Eloquent\Builder;
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
        $first = Value::query()->firstOrCreate([
            'id' => md5($key1),
        ], [
            'value' => $key1,
        ]);
        $second = Value::query()->firstOrCreate([
            'id' => md5($key2),
        ], [
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

    /**
     * Get map
     *
     * @param string $namespace
     * @param        $key
     *
     * @return ValueMap
     */
    public function getMap(string $namespace, $key): ?ValueMap
    {
        return ValueMap::query()
            ->where('namespace', $namespace)
            ->where(function (Builder $query) use ($key) {
                $query
                    ->where('first_id', md5($key))
                    ->orWhere('second_id', md5($key));
            })
            ->first();
    }

    /**
     * Check pair exists
     *
     * @param string $namespace
     * @param        $item1
     * @param        $item2
     *
     * @return bool
     */
    public function exists(string $namespace, $item1, $item2): bool
    {
        return ValueMap::query()
            ->where('namespace', $namespace)
            ->where(function (Builder $query) use ($item1, $item2) {
                $query->where(function (Builder $query) use ($item1, $item2) {
                    $query
                        ->where('first_id', md5($item1))
                        ->where('second_id', md5($item2));
                })->orWhere(function (Builder $query) use ($item1, $item2) {
                    $query->where(function (Builder $query) use ($item1, $item2) {
                        $query
                            ->where('first_id', md5($item2))
                            ->where('second_id', md5($item1));
                    });
                });
            })->exists();
    }
}