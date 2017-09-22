<?php

namespace Adi\Controllers;

class PagesController
{
    /**
     * Load index view.
     *
     */
    public function home()
    {
        return view('index');
    }

    /**
     * Load about view.
     *
     */
    public function about()
    {
        return view('about');
    }
}
