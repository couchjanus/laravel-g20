<?php

namespace Couchjanus\Widget;

class Widget
{
    /**
     *  @var array config/widget.php 
     **/
	protected $widget;

    /**
     * Widget constructor.
     */
	public function __construct(){
		$this->widget = config('widget');
	}

    /**
     * @param string $obj
     * @param array $data
     * @return \Illuminate\View\View
     */
	public function show($obj, $data =[]){
	
		if(isset($this->widget[$obj])){
			$obj = new $this->widget[$obj]($data);
			return $obj->run();
		}
	}
}
