<?php

namespace App\Widgets;

use Couchjanus\Widget\Contract\ContractWidget;
use App\Models\Category;

class CategoryWidget implements ContractWidget
{
    /**
     * The data array.
     *
     * @var array
     */
    protected $data = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $this->data = Category::all();
        return view('widgets.category', [
            'data' => $this->data,
        ]);
    }
}
