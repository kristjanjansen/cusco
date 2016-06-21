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
        
        if(! $this->is->isEmpty()) {

            return $this->is->map(function($item) use ($component) {
                return $component.'--'.$item;
            })
            ->implode(' ');

        }

        return '';

    }

    public function render() {

        $name = "components.$this->component.$this->component";

        $with = $this->with->flatten(1)->all();

        if (view()->exists($name)) {

            return View::make($name, $with)
                ->with('isclasses', $this->generateIsClasses())
                ->render();

        } else {

            $props = collect($with)->map(function($value, $key) {
               
                $value = is_array($value) ? rawurlencode(json_encode($value)) : $value;

                return $key.'="'.$value.'"';

            })->implode(' ');

            return '<component is="'
                . $this->component
                . '" isclasses="'
                . $this->generateIsClasses()
                . '" ' 
                . $props
                . ' />';

        }
    
    }

    public function __toString() {

        return $this->render();
    
    }

}