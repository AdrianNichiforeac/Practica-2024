<li class="dd-item" data-id="{{$page->id}}">
    <div class="dd-handle">
        {{$page->name}}
        <a class="dd-nodrag" href="javascript:void(0)" onclick="DeleteConfirm('{{route('pages.destroy', $page->id)}}')"><button type="button" class="btn btn-outline-secondary btn-action"><i class="fa fa-trash"></i></button></a>
        <a class="dd-nodrag" href="{{route('pages.edit', $page->id)}}"><button type="button" class="btn btn-outline-primary btn-action"><i class="fa fa-edit"></i></button></a>
        @if($page->second_menu)
            <a class="dd-nodrag" href="{{route('pages.setSecondMenu', [$page->id, 0])}}"><button type="button" class="btn btn-outline-primary btn-action"><i class="fa fa-plus"></i></button></a>
        @else
            <a class="dd-nodrag" href="{{route('pages.setSecondMenu', [$page->id, 1])}}"><button type="button" class="btn btn-outline-danger btn-action"><i class="fa fa-minus"></i></button></a>
        @endif

        @if($page->first_menu)
            <a class="dd-nodrag" href="{{route('pages.setFirstMenu', [$page->id, 0])}}"><button type="button" class="btn btn-outline-primary btn-action"><i class="fa fa-plus"></i></button></a>
        @else
            <a class="dd-nodrag" href="{{route('pages.setFirstMenu', [$page->id, 1])}}"><button type="button" class="btn btn-outline-danger btn-action"><i class="fa fa-minus"></i></button></a>
        @endif
    </div>
    @if (count($page->SubPages))
        <ol class="dd-list">
            @foreach($page->SubPages as $SubPage)
                @include('admin.pages.pages_list', ['page' => $SubPage])
            @endforeach
        </ol>
    @endif
</li>