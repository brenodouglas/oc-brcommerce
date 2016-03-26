<?php namespace BrenoDouglasAraujoSouza\BrCommerce;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
    }

    public function registerFormWidgets()
    {
        return [
            'Owl\FormWidgets\Tagbox\Widget' => [
                'label' => 'Tagbox',
                'code'  => 'owl-tagbox'
            ],
            'Owl\FormWidgets\Money\Widget' => [
                'label' => 'Money',
                'code' => 'owl-money'
            ],
            'Owl\FormWidgets\HasMany\Widget' => [
                'label' => 'Hasmany',
                'code'  => 'owl-hasmany'
            ]
        ];
    }

    public function registerSettings()
    {
    }
}
