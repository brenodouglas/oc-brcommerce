<?php namespace Brenodouglasaraujosouza\Drinks;

use Backend;
use System\Classes\PluginBase;

/**
 * drinks Plugin Information File
 */
class Plugin extends PluginBase
{

    public $require = ['BrenoDouglasAraujoSouza.BrCommerce'];

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'drinks',
            'description' => 'No description provided yet...',
            'author'      => 'brenodouglasaraujosouza',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }


    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return [
            'brenodouglasaraujosouza.drinks.custom_product' => [
                'tab' => 'drinks',
                'label' => 'Produtos da home'
            ],
            'brenodouglasaraujosouza.drinks.custom_category' => [
                'tab' => 'drinks',
                'label' => 'Categorias customizadas'
            ],
            'brenodouglasaraujosouza.drinks.sobre' => [
                'tab' => 'drinks',
                'label' => 'Categorias customizadas'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return [
            'drinks' => [
                'label'       => 'Drinks&Drinks',
                'url'         => Backend::url('brenodouglasaraujosouza/drinks/customcategory'),
                'icon'        => 'icon-leaf',
                'permissions' => ['brenodouglasaraujosouza.drinks.*'],
                'order'       => 500,
                'sideMenu' => [
                   'customproducts' => [
                        'label'       => 'Produtos Destaque',
                        'icon'        => 'icon-plus',
                        'url'         => Backend::url('brenodouglasaraujosouza/drinks/customproducts'),
                        'permissions' => ['brenodouglasaraujosouza.drinks.custom_product']
                    ],
                    'customcategory' => [
                        'label'       => 'Categorias Drinks&Drinks',
                        'icon'        => 'icon-plus',
                        'url'         => Backend::url('brenodouglasaraujosouza/drinks/customcategory'),
                        'permissions' => ['brenodouglasaraujosouza.drinks.custom_category']
                    ]
                ]
            ],
        ];
    }

    public function registerSettings()
    {
        return [
            'sobre' => [
                'label'       => 'Informações Empresa',
                'description' => 'Gerenciar informações institucionais',
                'category'    => 'Institucional',
                'icon'        => 'icon-globe',
                'class'       => 'Brenodouglasaraujosouza\Drinks\Models\Sobre',
                'order'       => 100,
                'keywords'    => 'about',
                'permissions' => ['brenodouglasaraujosouza.drinks.sobre']
            ]
        ];
    }

}
