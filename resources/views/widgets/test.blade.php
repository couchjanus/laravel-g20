<div>
	<h2>Widget test</h2>
	<ul>
        @foreach($data as $item)
            <li>
                {{ dump($item) }}
            </li>
        @endforeach
    </ul>
</div>
