<?php

namespace App\View\Components\Backend;

use Illuminate\View\Component;

class Breadcrumb extends Component {
    public $titleGenerate;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($titleGenerate = "true"){
        $this->titleGenerate = $titleGenerate;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render() {
        $titelItems = $this->option();
        return view( 'components.backend.breadcrumb',compact('titelItems'));
    }
    /**
     * @return array
     */

    private function option(){
        $routeName = request()->route()->getName();
        $nameArray = explode('.',$routeName);
        $arrayCount = count($nameArray);
        $newArray = [];
        for ($i=0; $i < $arrayCount; $i++) { 
            if ($i==0 && $nameArray[$i] == 'backend') {
                continue;
            }
            $name = [
                'name' => $nameArray[$i] != 'index' ? ucwords($nameArray[$i]) : ucwords($nameArray[$i - 1].'s'),
                'action' => $arrayCount - 1 == $i ? $routeName : "#" ,
                'url' => $arrayCount - 1 == $i ? url()->current() : "#" ,
            ];
            array_push($newArray, $name);
        }
        return $newArray;
    }
}
