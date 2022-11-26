<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Response;

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function getHomePage()
    {
        return response()->json(null, Response::HTTP_OK);
    }
}
