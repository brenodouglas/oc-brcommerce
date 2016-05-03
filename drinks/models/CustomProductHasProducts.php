<?php namespace Brenodouglasaraujosouza\Drinks\Models;

use Model;
use BrenoDouglasAraujoSouza\BrCommerce\Models\Product;

/**
 * CustomProductHasProducts Model
 */
class CustomProductHasProducts extends Model
{

    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'brenodouglasaraujosouza_drinks_custom_product_has_products';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    public $timestamps = false;

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    public $rules = [];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [
        'product' => [Product::class],
        'custom_products' => [CustomProduct::class]
    ];
    
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];
}