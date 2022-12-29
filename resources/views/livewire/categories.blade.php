<div>
    @foreach($categories as $category)
        <li><a class="dropdown-item" href="{{route('selectCategory', [$category->slug])}}">{{$category->name}}</a></li>
    @endforeach
</div>
