<?php namespace BrenoDouglasAraujoSouza\BrCommerce\Models;

use Model;
use October\Rain\Database\QueryBuilder;

/**
 * Model
 */
class Category extends Model
{
    use \October\Rain\Database\Traits\Validation;

    static $icons = [
        '' => 'Nenhum',
        'i-vinhos' => 'Vinhos',
        'i-cerveja' => 'Cerveja',
        'i-destilados' => 'Destilados',
        'i-espumantes' => 'Espumantes',
        'i-acessorios' => 'Acessórios'
    ];

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
    public $table = 'brenodouglasaraujosouza_brcommerce_category';

    public $belongsTo = [
        'parent' => [self::class]
    ];

    public function getIconOptions()
    {
        return self::$icons;
    }

}