<?php

namespace App\Helpers;

use View;

class Component {

    protected $component;
    protected $is;
    protected $with;

    public function __construct($component, $with = [])
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

    public function __toString() {

        return $this->render();
    
    }

    public function render() {

        $component = $this->component;

        $name = "components.$component.$component";

        $is = $this->is->map(function($item) use ($component) {
            return $component.'--'.$item;
        })
        ->implode(' ');
       
        if (view()->exists($name)) {

            return View::make($name, $this->with->flatten(1)->all())
                ->with('is', $is)
                ->render();

        }

        return '';
    
    }
    
}