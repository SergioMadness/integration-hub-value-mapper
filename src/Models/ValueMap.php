<?php namespace professionalweb\IntegrationHub\ValueMapper\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Mapping
 * @package professionalweb\IntegrationHub\ValueMapper\Models
 *
 * @property string $first_id
 * @property string $second_id
 *
 * @property Value  $firstKey
 * @property Value  $secondKey
 */
class ValueMap extends Model
{
    protected $table = 'value_mapping';

    protected $primaryKey = null;

    protected $keyType = null;

    public $incrementing = false;

    /**
     * Get first key
     *
     * @return HasOne
     */
    public function firstKey(): HasOne
    {
        return $this->hasOne(Value::class, 'first_id');
    }

    /**
     * Get second key
     *
     * @return HasOne
     */
    public function secondKey(): HasOne
    {
        return $this->hasOne(Value::class, 'second_id');
    }
}