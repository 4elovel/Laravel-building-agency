<?php

namespace App\Exceptions;

use Exception;

class FailedApartmentRequestCreate extends Exception
{
    protected $redirectRoute;

    public function __construct($message, $redirectRoute)
    {
        parent::__construct($message);
        $this->redirectRoute = $redirectRoute;
    }

    public function render(): \Illuminate\Http\RedirectResponse
    {
        return redirect()->route($this->redirectRoute)->with('error', $this->getMessage());
    }
}
