<li class="gui-folder">
    <a>
        <div class="gui-icon"><i class="fa fa-users"></i></div>
        <span class="title">Partners</span>
    </a>
    <ul style="">
        <li><a href="{{route('partners')}}"><span class="title">View Partners</span></a></li>

        @if(auth()->user()->adminHasRole('SuperAdmin))
        <li><a href="{{route('partners.create')}}"><span class="title">Add a Partner</span></a></li>
        @endif
    </ul>
</li>
