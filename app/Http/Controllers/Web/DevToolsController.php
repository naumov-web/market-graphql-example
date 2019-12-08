<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\BaseController;
use Illuminate\View\View;

/**
 * Class DevToolsController
 * @package App\Http\Controllers\Web
 */
class DevToolsController extends BaseController
{

    /**
     * Render page with docs
     *
     * @return View
     */
    public function docs(): View
    {
        return view('dev-tools.docs');
    }

}
