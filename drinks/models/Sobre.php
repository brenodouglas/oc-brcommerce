<?php namespace Brenodouglasaraujosouza\Drinks\Models;

use Model;

/**
 * sobre Model
 */
class Sobre extends Model
{

use \October\Rain\Database\Traits\Validation;
    /**
     * @var string The database table used by the model.
     */
    public $table = 'brenodouglasaraujosouza_drinks_sobres';

    public $implement = ['System.Behaviors.SettingsModel'];

    // A unique code
    public $settingsCode = 'sobre_drinks';

    // Reference to field configuration
    public $settingsFields = 'fields.yaml';
    
    public $rules = [
    ];

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
    public $attachOne = [];
    public $attachMany = [];

}