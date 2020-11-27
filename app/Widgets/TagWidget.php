<?php

namespace App\Widgets;

use Couchjanus\Widget\Contract\ContractWidget;

class TagWidget implements ContractWidget
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
        return view('widgets.tag', [
            'data' => $this->data,
        ]);
    }
}
