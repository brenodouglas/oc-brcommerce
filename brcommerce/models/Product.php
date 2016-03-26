<?php namespace BrenoDouglasAraujoSouza\BrCommerce\Models;

use Model;

/**
 * Model
 */
class Product extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /*
     * Validation
     */
    public $rules = [
    ];

    /**
     * @var array List of attribute names which are json encoded and decoded from the database.
     */
    protected $jsonable = ['options'];

    /**
     * @var array List of datetime attributes to convert to an instance of Carbon/DateTime objects.
     */
    protected $dates = ['publish_date'];

    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = true;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'brenodouglasaraujosouza_brcommerce_product';

    public $belongsTo = [
        'manufacture' => [Manufacture::class]
    ];

    public $belongsToMany = [
        'categories' => [
            Category::class,
            'table' => 'brenodouglasaraujosouza_brcommerce_product_has_category'
        ],
    ];
}