<li>
    <a href="{{url($page->link_name ?? '')}}">
        {!! $page->name!!}
    </a>
    @if(count($page->SubPages))
    <ul class="sub-menu">
        @foreach($page->SubPages as $SubPage)
            @include('frontend.components.page_list', ['page' => $SubPage])
        @endforeach
    </ul>
    @endif
</li>
