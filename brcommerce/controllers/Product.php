<?php namespace BrenoDouglasAraujoSouza\BrCommerce\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Product extends Controller
{
    public $implement = ['Backend\Behaviors\ListController','Backend\Behaviors\FormController','Backend\Behaviors\ReorderController'];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';

    public $requiredPermissions = [
        'brcommerce.catalog.products' 
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('BrenoDouglasAraujoSouza.BrCommerce', 'catalog', 'product');
    }

    public function create()
    {
        $this->bodyClass = 'compact-container';
        $this->addJs('/plugins/brenodouglasaraujosouza/brcommerce/assets/js/post-form.js');

        return $this->asExtension('FormController')->create();
    }

    public function update($recordId = null)
    {
        $this->bodyClass = 'compact-container';
        $this->addJs('/plugins/brenodouglas/wine/assets/js/post-form.js');

        return $this->asExtension('FormController')->update($recordId);
    }
}