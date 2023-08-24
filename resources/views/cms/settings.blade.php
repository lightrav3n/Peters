@extends('layouts.cms')
@section('content')
    <!--//Page Toolbar//-->
    <div class="toolbar py-3 px-3 px-lg-6">
        <div class="position-relative container-fluid px-0">
            <div class="row align-items-center position-relative">
                <div class="col-md-8 mb-4 mb-md-0">
                    <h3 class="mb-2">Site Settings</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{route('cms.index')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Site Settings</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="content pt-3 px-3 px-lg-6 d-flex flex-column-fluid">
        <div class="container-fluid px-0">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-3 mb-lg-5 card-body">
                        <form method="post" action="{{route('cms.settings.update')}}">
                            @csrf
                            <div class="card-body">
                                <div class="col-12 my-3 option_wrapper">
                                    @foreach($settings as $setting)
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Option</span>
                                            <input type="text" class="form-control" name="option[{{$setting->option_name}}]"
                                                   value="{{$setting->option_name}}">
                                            <span class="input-group-text">Value</span>
                                            <input type="text" class="form-control" placeholder="" name="option_value[{{$setting->option_name}}]"
                                                   value="{{$setting->option_value}}">
                                            <span class="input-group-text">Display</span>
                                            <input type="text" class="form-control" placeholder="" name="option_display[{{$setting->option_name}}]"
                                                   value="{{$setting->option_display}}">
                                        </div>
                                    @endforeach
                                        <div class="input-group mb-3 addOption">
                                            <span class="input-group-text">Option</span>
                                            <input type="text" class="form-control" placeholder="Write the option name and click Add new +" onkeyup="optionValue = this.value">
                                            <button type="button" class="add_form_field">Add new &nbsp;
                                                <span style="font-size:16px; font-weight:bold;">+ </span>
                                            </button>
                                        </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Save Settings</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 col-lg-4 mb-3 mb-lg-5">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <form class="row col-12 align-items-center" method="post" action="{{route('cms.language.create')}}">
                                @csrf
                                <div class="col-md-10">
                                    <input type="text" class="form-control mb-2" id="title" name="name" placeholder="Enter language short code ex: de">
                                    <input type="text" class="form-control" id="display_name" name="display_name" placeholder="Enter language name ex: German">
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary">Add new</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-body p-0">
                            <!--Files list-->
                            <ul class="list-group list-group-flush sortable" data-sortable-id="0" aria-dropeffect="move">
                                @foreach($languages as $language)
                                    <li class="list-group-item d-flex align-items-center px-4">
                                        <a class="flex-grow-1 text-reset d-block overflow-hidden" href="#!">
                                            <h6 class="mb-0 text-truncate">{{$language->display_name}}</h6>
                                        </a>
                                        <div class="flex-shrink-0 dropstart ps-3">
                                            <a href="#!" id="{{$language->id}}" class="btn btn-danger btn-sm deleteCategory">Delete</a>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        const wrapper = $(".option_wrapper");
        const add_button = $(".add_form_field");
        let x = 1;
        let optionValue = '';
        $(add_button).click(function(e) {
            e.preventDefault();
            $(wrapper).append('<div class="input-group mb-3">' +
                '<span class="input-group-text">Option</span>' +
                '<input id="option" type="text" class="form-control" name="option['+optionValue+']" value="'+optionValue+'">' +
                '<span class="input-group-text">Value</span>' +
                '<input type="text" class="form-control" placeholder="" name="option_value['+optionValue+']">' +
                '<span class="input-group-text">Display</span>' +
                '<input type="text" class="form-control" placeholder="" name="option_display['+optionValue+']">' +
                '<a href="#" class="delete btn btn-danger" style="display: flex;align-items: center;">-</a>' +
            '</div>'); //add input box
            $(this).parent('div').hide();
            x++;
        });

        $(wrapper).on("click", ".delete", function(e) {
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
            $(".addOption").show();
        });
    </script>
@endsection
