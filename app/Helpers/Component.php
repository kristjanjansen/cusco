<?php

namespace App\Helpers;

use View;

class Component {

    protected $component;
    protected $is;
    protected $with;

    public function __construct($component, $with = null)
    {
        
        $this->component = $component;
        $this->is = collect();
        $this->with = collect($with);
    
    }

    public function is($is) {

        $this->is->push($is);
        return $this;
    
    }

    public function with($key, $value)
    {

        $this->with->push([$key => $value]);
        return $this;
    
    }

    public function generateIsClasses() {

        $component = $this->component;
        
        return $this->is->map(function($item) use ($component) {
            return $component.'--'.$item;
        })
        ->implode(' ');

    }

    public function render() {

        $name = "components.$this->component.$this->component";

        $with = $this->with->flatten(1)->all();

        if (view()->exists($name)) {

            return View::make($name, $with)
                ->with('is', $this->generateIsClasses())
                ->render();

        } else {

            return '<component is="'
                . $this->component
                . '" isclasses="'
                . $this->generateIsClasses()
                . '" vars="'
                . rawurlencode(json_encode($with))
                . '" />';
        }
    
    }

    public function __toString() {

        return $this->render();
    
    }

}