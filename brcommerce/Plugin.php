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

    public function register()
    {
        set_exception_handler([$this, 'handleException']);
    }

    public function handleException($e)
    {
        if (! $e instanceof Exception) {
            $e = new \Symfony\Component\Debug\Exception\FatalThrowableError($e);
        }

        $handler = $this->app->make('Illuminate\Contracts\Debug\ExceptionHandler');
        $handler->report($e);

        if ($this->app->runningInConsole()) {
            $handler->renderForConsole(new ConsoleOutput, $e);
        } else {
            $handler->render($this->app['request'], $e)->send();
        }
    }
}
