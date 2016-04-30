<?php

namespace GistApi\Http\Controllers\v1;

use Illuminate\Http\Request;

use GistApi\Repositories\Category;

use GistApi\Http\Controllers\v1\ApiController;

class CategoryController extends ApiController
{

    public function index()
    {
        return Category::with('packages')
                        ->select( 
                            \DB::raw("SELECT categories.name as name, slug, categories.id, count(packages.id) as total")
                            )
                        ->groupBy('categories.name')
                        ->get();
    }

}
