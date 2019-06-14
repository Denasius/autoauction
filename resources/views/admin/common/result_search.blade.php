<div class="results">
    @if($pages)
        <div class="items">
            <p>Страницы</p>
            @foreach($pages as $item)
                <a href="{{route('pages.edit', $item['id'])}}" class="item">{{$item['title']}}</a>
            @endforeach
        </div>
    @endif
    @if($categories)
        <div class="items">
            <p>Категории</p>
            @foreach($categories as $item)
                <a href="{{route('categories.edit', $item['id'])}}" class="item">{{$item['title']}}</a>
            @endforeach
        </div>
    @endif
    @if($lots)
        <div class="items">
            <p>Лоты</p>
            @foreach($lots as $item)
                <a href="{{route('lots.edit', $item['id'])}}" class="item">{{$item['title']}}</a>
            @endforeach
        </div>
    @endif
    @if($tags)
        <div class="items">
            <p>Теги</p>
            @foreach($tags as $item)
                <a href="{{route('tags.edit', $item['id'])}}" class="item">{{$item['title']}}</a>
            @endforeach
        </div>
    @endif
    @if($attributes)
        <div class="items">
            <p>Атрибуты</p>
            @foreach($attributes as $item)
                <a href="{{route('attributes.edit', $item['id'])}}" class="item">{{$item['title']}}</a>
            @endforeach
        </div>
    @endif
</div>