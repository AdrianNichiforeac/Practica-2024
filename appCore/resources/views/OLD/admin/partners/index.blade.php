<x-admin-master>
    @section('content')
        <section>
            <div class="section-header">
                <ol class="breadcrumb">
                    <li class="active">Parteneri</li>
                </ol>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-12">
                        @if(session('partner-created-message'))
                            <div class="alert alert-success">{{session('partner-created-message')}}</div>
                        @elseif(session('partner-updated-message'))
                            <div class="alert alert-success">{{session('partner-updated-message')}}</div>
                        @elseif(session('partner-deleted-message'))
                            <div class="alert alert-success">{{session('partner-deleted-message')}}</div>
                        @endif

                                <a href="/admin/partners/create" class="btn ink-reaction btn-raised btn-primary"> <i class="fa fa-plus"></i> Adaugă partener</a>
                                <div class="row">
                                @foreach($partners as $partner)

                                    <div class="col-md-3 col-sm-6">
                                        <div class="card">
                                            <div class="card-body no-padding">
                                                <div class="alert alert-callout alert-success no-margin" style="background-image: url('{{asset('storage/'.$partner->logo)}}'); background-size: auto; background-repeat: no-repeat; background-position: center;">
                                                    <a href="{{$partner->link}}"><strong class="text-xl">{{$partner->name}}</strong></a><br>
                                                </div>
                                            </div><!--end .card-body -->
                                            <div class="card-footer">
                                                <div class="btn-group btn-group-justified" role="group" aria-label="Justified button group">
                                                    <a href="{{route('partners.edit', $partner->id)}}" class="btn btn-success" role="button"><i class="md md-edit"></i> Editează</a>
                                                    <a onclick="$('#delete_{{$partner->id}}').submit()" class="btn btn-danger" role="button"><i class="fa fa-trash"></i> Șterge</a>
                                                    <form action="{{route('partners.destroy', $partner->id)}}" method="post" id="delete_{{$partner->id}}" style="display: none">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger" role="button" type="submit" title="Delete"><i class="fa fa-trash"></i> Șterge</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div><!--end .card -->
                                    </div>
                                @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </section>
    @endsection
</x-admin-master>
