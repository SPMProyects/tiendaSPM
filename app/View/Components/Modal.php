<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Modal extends Component
{

    public $id, $title, $text, $buttonText, $buttonLink, $image;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $title, $text, $buttonText, $buttonLink, $image )
    {   
        $this->id = $id;
        $this->title = $title;
        $this->text = $text;
        $this->buttonText = $buttonText;
        $this->buttonLink = $buttonLink;
        $this->image = $image;
        /*

        $title, $text, $button_text, $button_link, 
        
        
        
        
        
        */
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.modal');
    }
}
