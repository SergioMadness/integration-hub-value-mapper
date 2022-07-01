<?php namespace professionalweb\IntegrationHub\ValueMapper\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Value
 * @package professionalweb\IntegrationHub\ValueMapper\Models
 *
 * @property string $id
 * @property string $value
 */
class Value extends Model
{
    protected $table = 'value_mapping_value';

    protected $keyType = 'string';

    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = ['value'];

    public static function boot(): void
    {
        parent::boot();

        static::creating(static function (Value $model) {
            if (empty($model->id)) {
                $model->id = md5($model->value);
            }
        });
    }
}