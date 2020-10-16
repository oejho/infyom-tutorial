<?php

namespace App\Models\Location;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

/**
 * Class Continent
 * @package App\Models\Location
 * @version October 16, 2020, 3:18 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $countries
 * @property string $name
 */
class Continent extends Model
{
    use SoftDeletes;

    public $table = 'continent';

    const CREATED_AT = 'create_ts';
    const UPDATED_AT = 'update_ts';
    const DELETED_AT = 'delete_ts';

    protected $dates = ['delete_ts'];

    public $connection = "location";
    protected $primaryKey = 'code';

     /**
         * The model's default values for attributes.
         *
         * @var array
         */
        protected $attributes = [
            'status' => 0,
            'version' => 1,
            'updated_by' => null,
            'deleted_by' => null,
            'update_ts' => null,
            'delete_ts' => null,
            'created_ip' => null,
            'updated_ip' => null,
            'deleted_ip' => null,
        ];

    public $fillable = [
        'code',
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'code' => 'string',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'code' => 'required|string|max:50',
        'name' => 'required|string|max:50'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function countries()
    {
        return $this->hasMany(\App\Models\Location\Country::class, 'continent_code');
    }
}
