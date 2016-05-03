<?php namespace Brenodouglasaraujosouza\Drinks\Models;

use BrenoDouglasAraujoSouza\BrCommerce\Models\Product;
use Model;

/**
 * CustomProducts Model
 */
class CustomProducts extends Model
{

    use \October\Rain\Database\Traits\Validation;

    public $rules = [
    ];

    public $pages = [
        1 => 'Home'
    ];
    /**
     * @var string The database table used by the model.
     */
    public $table = 'brenodouglasaraujosouza_drinks_custom_products';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [
    ];
    public $belongsTo = [];
    public $belongsToMany = [
         'products' => [
            Product::class,
            'table' => 'brenodouglasaraujosouza_drinks_custom_product_has_products'
        ],
    ];

    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

    public function getPageAttribute()
    {
        return $this->pages[$this->attributes['page']];
    }
}