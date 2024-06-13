@if ($paginator->lastPage() > 1)
    <ul class="pagination text-center m-b30 m-t50 m-lg-t10">
        <li class="page-item {{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
            <a class="page-link prev" href="{{ $paginator->url(1) }}">
                <i class="fas fa-chevron-left"></i>
            </a>
        </li>
        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            <li class="page-item ">
                <a class="page-link {{ ($paginator->currentPage() == $i) ? ' active' : '' }}" href="{{ $paginator->url($i) }}">{{ $i }}</a>
            </li>
        @endfor
        <li class=" page-item {{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
            <a class="page-link next" href="{{$paginator->url($paginator->currentPage()+1)}}" ><i class="fas fa-chevron-right"></i></a>
        </li>
    </ul>
@endif
