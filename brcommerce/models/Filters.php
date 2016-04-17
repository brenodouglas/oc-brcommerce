<?php namespace BrenoDouglasAraujoSouza\BrCommerce\Models;

use Model;
use October\Rain\Database\QueryBuilder;

/**
 * Model
 */
class Filters extends Model
{
    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'brcommerce_options_filter';

    public $belongs = [
        'category' => [
            Category::class
        ],
    ];
}