<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use Illuminate\Support\Facades\Route;

class TestController extends Controller
{
    public function index(){
        // return View::make('test.index', ['name'=>"Facade View"]);
        // return view("test.index", ['name'=>"Helper view"]);
        // Для получения URL для действия контроллера используйте метод action():
        // $url = action('App\Http\Controllers\TestController@index');
        // return view("test.index", ['name'=>$url]);
        // Получить имя действия, которое выполняется в данном запросе, можно методом currentRouteAction() фасада Route:
        $action = Route::currentRouteAction();
        return view("test.index", ['name'=>$action]);
    }

    // Получить заголовки из запроса

    // public function index(Request $request)
    // {
    
    //     $headers = $request->header('connection');
    //     dd($headers);

    // }

}
