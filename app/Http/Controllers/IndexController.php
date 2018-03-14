<?php

namespace App\Http\Controllers;

use Saritasa\Laravel\Controllers\BaseController;

/**
 * Index controller.
 * Contains the method for rendering the view for SPA.
 */
class IndexController extends BaseController
{
    /**
     * Returns the base view for SPA.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('spa');
    }
}
