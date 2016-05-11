<?php namespace BrenoDouglasAraujoSouza\BrCommerce\Models;

use Model;
use October\Rain\Database\QueryBuilder;
use System\Models\File;
use BrenoDouglasAraujoSouza\BrCommerce\Utils\Filter;

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
    protected $jsonable = ['options', 'tags'];

    /**
     * @var array List of datetime attributes to convert to an instance of Carbon/DateTime objects.
     */
    protected $dates = ['publish_date'];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'brenodouglasaraujosouza_brcommerce_product';

    public $belongsTo = [
        'manufacture' => [Manufacture::class]
    ];

    public $attachMany = [
        'images' => [
            File::class
        ],
    ];

    public $belongsToMany = [
        'categories' => [
            Category::class,
            'table' => 'brenodouglasaraujosouza_brcommerce_product_has_category'
        ],
    ];

    public function getCategoryNameAttribute()
    {
        $categories = [];
        foreach ($this->categories as $category) {
            $categories[] = $category->name;
        }

        return implode(", ", $categories);
    }

    public function scopeFilter(QueryBuilder $query, Filter $filter)
    {
        $query->join('brcommerce_options_product', '' );
    }


    public function filterFields($fields, $context = null)
    {
        if(isset($fields->categories)) {
            $categories = $fields->categories->value;

            if (count($categories) == 0 || $categories == 0)
                return;

            $options = $this->options;

            foreach ($categories as $category) {
                foreach ($this->categories as $categoryEntity) {
                    if ($categoryEntity->id == $category){

                        $optionsMerged = array_filter($categoryEntity->options, function($option) use($options) {
                            $count = 0;

                            foreach($options as $opt) {
                                if($option['name'] != $opt['name'])
                                    $count++;
                            }

                            return $count > 0 ? false : true;
                        });

                        $options = array_merge($options, $optionsMerged);
                    }
                }
            }

            foreach ($options as &$option) {
                if(!isset($option['value']))
                    $option['value'] = '';
            }

            $this->options = $options;
            $fields->options->value = $options;
        }

        return $fields;
    }
}