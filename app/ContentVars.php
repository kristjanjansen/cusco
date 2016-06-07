<?php

namespace App;


class ContentVars
{
    
    protected $content;
   
    public function __construct(Content $content)
    {
        
         $this->content = $content;

    }

    public function __get($property)
    {

        if (method_exists($this, $property)) {
            return call_user_func([$this, $property]);
        }

    }
}
