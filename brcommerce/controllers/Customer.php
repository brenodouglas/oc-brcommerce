<?php namespace Brenodouglasaraujosouza\Brcommerce\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Customer Back-end Controller
 */
class Customer extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Brenodouglasaraujosouza.Brcommerce', 'brcommerce', 'customer');
    }
}