<?php

namespace App\View\Components\Backend;

use Illuminate\View\Component;

class From extends Component
{
    public $fromAction;
    public $fromMethod;
    public $fromClass;
    public $formId;
    public $bladeMethod;
    public $media;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($fromAction, $fromMethod = 'get', $fromClass = null ,$formId = null, $media = false)
    {
        $this->fromAction = $fromAction;
        $this->fromMethod = $this->method($fromMethod);
        $this->bladeMethod = $this->bladeMethod($fromMethod);
        $this->fromClass = $fromClass;
        $this->formId = $formId;
        $this->media = $media;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.backend.from');
    }

    private function method($method){

        if ($method == 'POST' || $method == 'PUT' || $method  == 'PATCH' || $mehtod = "DELETE") {
            return 'POST';
        }else{
           return 'GET';
        }

    }

    private function bladeMethod($method){

        if ($method == 'PUT' || $method  == 'PATCH') {
            return 'PUT';
        }elseif($method == 'DELETE'){
            return "DELETE";
        }else{
           return null;
        }

    }

    
}
