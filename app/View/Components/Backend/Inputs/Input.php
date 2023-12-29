<?php

namespace App\View\Components\Backend\Inputs;

use Illuminate\View\Component;

class Input extends Component
{
    public $inputType;
    public $inputName;
    public $inputValue;
    public $inputId;
    public $inputClass;
    public $inputLabel;
    public $inputPlaceholder;
    public $selectType; //only for select option use 
    public $inputRequired;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($inputType='text', $inputName, $inputValue=null, $selectType=null, $inputId=null, $inputClass=null, $inputLabel=null, $inputPlaceholder=null, $inputRequired=null)
    {
        $this->inputType = $inputType;
        $this->selectType = $selectType; //only for select option use 
        $this->inputName = $inputName;
        $this->inputValue = $inputValue;
        $this->inputLabel = $inputLabel ?? $this->inputLabel($inputName);
        $this->inputClass = $inputClass;
        $this->inputId = $inputId;
        $this->inputRequired = $inputRequired;
        $this->inputPlaceholder = $inputPlaceholder ?? "Enter Valid Value This Place For ".$this->inputLabel;
    }

    /**
     * Get the view / contents that represent the component. 
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.backend.inputs.input');
    }

    private function inputLabel($name){
        $name = str_replace('_', ' ', $name);
        return ucfirst($name);
    }
}
