<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormInput extends Component
{
    public $type;
    public $name;
    public $label;
    public $options;
    public $value;
    public $attributes;
    public $required;

    public function __construct(
        $name,
        $type = 'text',
        $label = '',
        $options = [],
        $value = '',
        $attributes = [],
        $required = false
    ) {
        $this->type = $type;
        $this->name = $name;
        $this->label = $label;
        $this->options = $options;
        $this->value = $value;
        $this->attributes = $attributes;
        $this->required = $required;
    }

    public function render()
    {
        return view('components.form-input');
    }
}
