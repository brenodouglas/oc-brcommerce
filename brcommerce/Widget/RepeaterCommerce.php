<?php
namespace BrenoDouglasAraujoSouza\BrCommerce\Widget;


use Backend\FormWidgets\Repeater;

class RepeaterCommerce extends Repeater
{

    public function prepareVars()
    {
        $this->processExistingItems();
        $this->vars['indexName'] = self::INDEX_PREFIX.$this->formField->getName(false).'[]';
        $this->vars['prompt'] = $this->prompt;
        $this->vars['formWidgets'] = $this->formWidgets;
    }
}