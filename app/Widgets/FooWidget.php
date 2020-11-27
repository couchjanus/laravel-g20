<?php

namespace App\Widgets;

use Couchjanus\Widget\Contract\ContractWidget;

class FooWidget implements ContractWidget
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
        return view('widgets.foo', [
            'data' => $this->data,
        ]);
    }
}
