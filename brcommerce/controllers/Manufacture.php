<?php namespace BrenoDouglasAraujoSouza\BrCommerce\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Manufacture extends Controller
{
    public $implement = ['Backend\Behaviors\ListController','Backend\Behaviors\FormController','Backend\Behaviors\ReorderController'];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';

    public $requiredPermissions = [
        'brcommerce.catalog.manufacture' 
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('BrenoDouglasAraujoSouza.BrCommerce', 'catalog', 'manufacture');
    }
}