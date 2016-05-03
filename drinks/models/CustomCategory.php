<?php namespace Brenodouglasaraujosouza\Drinks\Models;

use BrenoDouglasAraujoSouza\BrCommerce\Models\Product;
use Model;
use System\Models\File;

/**
 * CustomCategory Model
 */
class CustomCategory extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'brenodouglasaraujosouza_drinks_custom_categories';

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

    public $belongsTo = [
        'parent' => [self::class]
    ];

    public $belongsToMany = [
        'products' => [
            Product::class,
            'table' => 'brenodouglasaraujosouza_drinks_custom_category_has_products'
        ],
    ];

    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [
        'image' => [File::class]
    ];
    public $attachMany = [];

}