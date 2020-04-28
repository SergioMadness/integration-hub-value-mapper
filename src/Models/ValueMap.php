<?php namespace professionalweb\IntegrationHub\ValueMapper\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public $timestamps = false;

    public $fillable = [
        'first_id',
        'second_id',
        'namespace',
    ];

    /**
     * Get first key
     *
     * @return BelongsTo
     */
    public function firstKey(): BelongsTo
    {
        return $this->belongsTo(Value::class, 'first_id');
    }

    /**
     * Get second key
     *
     * @return BelongsTo
     */
    public function secondKey(): BelongsTo
    {
        return $this->belongsTo(Value::class, 'second_id');
    }

    /**
     * Get value
     *
     * @param $key
     *
     * @return Value
     */
    public function getValue($key): Value
    {
        return md5($key) === $this->second_id ? $this->firstKey : $this->secondKey;
    }
}