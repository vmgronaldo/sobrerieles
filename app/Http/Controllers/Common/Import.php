<?php

namespace App\Http\Controllers\Common;

use App\Abstracts\Http\Controller;

class Import extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @param  $group
     * @param  $type
     * @return Response
     */
    public function create( $type)
    {
        $path = $type;
        $namespace = '';
        return view('common.import.create', compact( 'type', 'path', 'namespace'));
    }
}
