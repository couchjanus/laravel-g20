<?php

namespace App\Widgets;

use Couchjanus\Widget\Contract\ContractWidget;

/**
 * Class TestWidget
 * A class to demonstrate how the extension works
 * @package App\Widgets
 */
class TestWidget implements ContractWidget{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected $data = ['hello'=>"Hello widget"];
    
    public function run(){
        return view('widgets.test', [
            'data' => $this->data
        ]);
    }
}
