<nav {{$attributes}}>
    <ul class="space-x-4 flex text-slate-500">
     <li>
    <a href="/">
        Home
    </a>
    </li>
    @foreach ($links as $label => $link)
    <li>→</li>
    <li>
        <a href="{{$link}}">
            {{$label}}
        </a>
    </li>
    @endforeach
    </ul>
</nav>