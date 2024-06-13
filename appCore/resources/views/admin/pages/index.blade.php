@extends('layouts.admin')
@section('content')
    <div class="main-container">
        <!-- Page header start -->
        <div class="page-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Info</li>
                <li class="breadcrumb-item">Pagini</li>
            </ol>
        </div>
        <!-- Page header end -->

        <div class="content-wrapper">

            @include('admin.components.alerts')

            {{--Add admins start --}}
            <div class="row gutters">
                <div class="col-xs-12 col-lg-8">
                    <div class="text-left mb-4">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNewPartner"> <i class="fa fa-plus"></i> Adaugă</button>
                    </div>

                    <div class="modal fade" id="addNewPartner" tabindex="-1" role="dialog" aria-labelledby="addNewPartnerLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addNewPartnerLabel">Adăugare Pagină</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="row gutters" method="post" enctype="multipart/form-data" action="{{route('pages.store')}}" id="add_form">
                                        @csrf
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="name_new">Nume:</label>
                                                <input type="text" class="form-control" name="name"  value="">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer custom">
                                    <div class="left-side">
                                        <button type="button" class="btn btn-link danger btn-block" data-dismiss="modal">Renunță</button>
                                    </div>
                                    <div class="divider"></div>
                                    <div class="right-side">
                                        <button type="button" onclick="$('#add_form').submit();" class="btn btn-link success btn-block">Salvează</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="dd" id="nestable">
                                <ol class="dd-list">
                                    @foreach($pages as $page)
                                        @include('admin.pages.pages_list', ['page' => $page])
                                    @endforeach
                                </ol>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <link rel="stylesheet" href="{{asset('/admin_assets/css/nestable.css')}}">
    <script src="{{asset('/admin_assets/js/jquery.nestable.js')}}"></script>
    <script>

        function SavePagesOrder(JSON){
            $.ajax({
                url: "{{route('pages.orderPages')}}",
                type:"PUT",
                data:{
                    '_token': '{{csrf_token()}}',
                    'JSON' : JSON,
                },
                success:function(response){
                    console.log(response);
                },
                error:function(response){
                    console.log(response);
                },
            });
        }

        $(document).ready(function()
        {

            var updateOutput = function(e)
            {
                var list   = e.length ? e : $(e.target),
                    output = list.data('output');
                if (window.JSON) {
                    SavePagesOrder(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
                } else {
                    output.val('JSON browser support required for this demo.');
                }
            };

            // activate Nestable for list 1
            $('#nestable').nestable({
                group: 1
            })
                .on('change', updateOutput);

            $('#nestable-menu').on('click', function(e)
            {
                var target = $(e.target),
                    action = target.data('action');
                if (action === 'expand-all') {
                    $('.dd').nestable('expandAll');
                }
                if (action === 'collapse-all') {
                    $('.dd').nestable('collapseAll');
                }
            });


        });

    </script>
@endsection

