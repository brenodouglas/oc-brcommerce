<?php namespace Brenodouglasaraujosouza\Drinks\Models;

use Model;
use BrenoDouglasAraujoSouza\BrCommerce\Models\Product;

/**
 * CustomCategoryHasProducts Model
 */
class CustomCategoryHasProducts extends Model
{

     use \October\Rain\Database\Traits\Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'brenodouglasaraujosouza_drinks_custom_category_has_products';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    public $timestamps = false;

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [
        'product' => [Product::class, 'order' => 'id desc'],
        'custom_category' => [CustomCategory::class, 'order' => 'id desc']
    ];
    
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];
    public $rules = [];
    
}