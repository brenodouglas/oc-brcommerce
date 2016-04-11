<?php namespace Brenodouglasaraujosouza\Brcommerce\Models;

use Model;
use System\Models\File;

/**
 * Banner Model
 */
class Banner extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'brenodouglasaraujosouza_brcommerce_banners';

    public $dates = ['expiration_date', 'initial_date'];

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
    public $hasMany = [];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [
        'image' => [File::class]
    ];
    public $attachMany = [];

}