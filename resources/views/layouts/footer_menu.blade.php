<div class="col-md-5">
    <div class="featured-links">
        <ul>
            @foreach ($footerMenu as $item)
                <li class="{{ $item['class'] }} @if($item['child']) menu-item-has-children-footer @endif"><a href="{{ $item['link'] }}"><i class="fa fa-caret-right"></i>{{ $item['label'] }}</a>
                    @if($item['child'])
                        <ul class="child-menu">
                            @foreach( $item['child'] as $child )
                                <li class="{{ $child['class'] }}"><a href="{{ $child['link'] }}">{{ $child['label'] }}</a></li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
        <ul>
            @foreach ($footerMenu_2 as $item)
                <li class="{{ $item['class'] }} @if($item['child']) menu-item-has-children-footer @endif"><a href="{{ $item['link'] }}"><i class="fa fa-caret-right"></i>{{ $item['label'] }}</a>
                    @if($item['child'])
                        <ul class="child-menu">
                            @foreach( $item['child'] as $child )
                                <li class="{{ $child['class'] }}"><a href="{{ $child['link'] }}">{{ $child['label'] }}</a></li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</div>