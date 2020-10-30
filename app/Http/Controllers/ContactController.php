<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function url(Request $request)
    {
        // Without Query String...
        dump($request->url());

        // With Query String...
        dump($request->fullUrl());

        $method = $request->method();
        if ($request->isMethod('GET')) {
            echo "<h2>It's Get Method</h2>";
        }

        dump($request->all());

        // Получить доступ к конкретному полю:
        $username = $request->input('username');
        dump($username);

        $username = $request->query('username');
        dump($username);
        
        dump($request->query());

        $username = $request->username;
        dump($username);
        
        // Получить текущий URL без строки запроса
        dump(url()->current());
    
        // Получить текущий URL, включая строку запроса
        dump(url()->full());
    
        // Получить полный URL-адрес предыдущего запроса
        dump(url()->previous());

        // Получить только параметры с использованием сегмента
        // http://www.example.com/one/two?key=value
        dump($request->segment(2));

        $input = $request->only(['username', 'password']);
        $input = $request->only('username', 'password');
        $input = $request->except(['first_name']);
        $input = $request->except('first_name');
        $input = $request->intersect(['username', 'password']);

        if ($request->has('name')) {
            //
        }
        if ($request->has(['name', 'email'])) {
            //
        }
                

    }
    
    public function all(Request $request)
    {
        dump($request->all());

        // Получить доступ к конкретному полю:
        $username = $request->input('username');
        dump($username);

        // Можно передать значение по умолчанию вторым аргументом метода input. Это значение будет возвращено, когда запрашиваемый ввод отсутствует в запросе:
        $username = $request->input('username', 'Janus');
        dump($username);
    }

    public function store(Request $request)
    {
        $username = $request->input('username');
        //
    }
    /**
     * Update the specified username.
     *
     * @param  Request  $request
     * @param  string  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }


}
