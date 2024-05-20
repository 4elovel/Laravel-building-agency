<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ApartmentApplicationForm extends Component
{
    public $complexes;

    public function __construct($complexes)
    {
        $this->complexes = $complexes;
    }

    public function render()
    {
        return view('components.apartment-application-form');
    }
}
