
<x-master-layout :assets="$assets ?? []">
    <div>
        <?php $id = $id ?? null;?>
        @if(isset($id))
            {!! Form::model($data, ['route' => ['pushnotification.update', $id], 'method' => 'patch', 'enctype' => 'multipart/form-data', 'id'=> 'pushnotificaton_form' ]) !!}
        @else
            {!! Form::open(['route' => ['pushnotification.store'], 'method' => 'post', 'enctype' => 'multipart/form-data' ,'id'=> 'pushnotificaton_form']) !!}
        @endif
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">{{ $pageTitle }}</h4>
                        </div>
                        <div class="card-action">
                            <a href="{{ route('pushnotification.index') }}" class="btn btn-sm btn-primary" role="button">{{ __('message.back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="new-user-info">
                            <div class="row">

                                <div class="form-group col-md-4">
                                    {{ Form::label('client', __('message.user') ,['class' => 'form-control-label' ]) }}
                                    {{ Form::select('client[]', $client , old('client') , [ 'id' => 'client_list', 'class' => 'select2js form-control', 'multiple' => 'multiple', 'data-placeholder' => __('message.select_name',[ 'select' => __('message.client') ]) ] ) }}
                                </div>

                                <div class="form-group col-md-2">
                                    <div class="custom-control custom-checkbox mt-4 pt-3">
                                        <input type="checkbox" class="custom-control-input selectAll" id="all_client" data-usertype="client">
                                        <label class="custom-control-label" for="all_client">{{ __('message.select_all') }}</label>
                                    </div>
                                </div>

                                <div class="form-group col-md-4">
                                    {{ Form::label('delivery_man', __('message.delivery_man'),['class' => 'form-control-label' ]) }}
                                    {{ Form::select('delivery_man[]', $delivery_man , old('delivery_man') , [ 'id' => 'delivery_man_list', 'class' => 'select2js form-control', 'multiple' => 'multiple', 'data-placeholder' => __('message.select_name',[ 'select' => __('message.delivery_man') ]) ] ) }}
                                </div>

                                <div class="form-group col-md-2">
                                    <div class="custom-control custom-checkbox mt-4 pt-3">
                                        <input type="checkbox" class="custom-control-input selectAll" id="all_delivery_man" data-usertype="delivery_man">
                                        <label class="custom-control-label" for="all_delivery_man">{{ __('message.select_all') }}</label>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    {{ Form::label('title', __('message.title').' <span class="text-danger">*</span>',['class' => 'form-control-label'], false ) }}
                                    {{ Form::text('title', old('title'),[ 'placeholder' => __('message.title'),'class' =>'form-control','required']) }}
                                </div>

                                <div class="form-group col-md-12">
                                    {{ Form::label('message',__('message.message').' <span class="text-danger">*</span>',['class' => 'form-control-label'], false ) }}
                                    {{ Form::textarea('message', null, [ 'class' => 'form-control textarea', 'rows' => 3, 'required', 'placeholder' => __('message.message') ]) }}
                                </div>

                                <div class="form-group col-md-4">
                                    <label class="form-control-label" for="image">{{ __('message.image') }}</label>
                                    <div class="custom-file">
                                        {{ Form::file('notification_image', [ 'class'=> 'custom-file-input', 'id' => 'notification_image', 'data--target' => 'notification_image_preview', 'lang' => 'en', 'accept'=> 'image/*' ]) }}
                                        <label class="custom-file-label">{{ __('message.choose_file',['file' => __('message.image') ]) }}</label>
                                    </div>
                                    <span class="selected_file"></span>
                                </div>
                                <div class="col-md-2 mb-2">
                                    <img id="notification_image_preview" src="{{ asset('images/default.png') }}" alt="image" class="attachment-image mt-1 notification_image_preview">
                                </div>
                            </div>
                            <hr>
                            {{ Form::submit( __('message.send'), [ 'class' => 'btn btn-md btn-primary float-right']) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    @section('bottom_script')
    <script>
        $(document).ready(function() {
            $('.select2js').select2();

            function updateClientCounter() {
                let count = $('#client_list').select2('data').length;
                $('#client_list').next('span.select2').find('ul').html("<li class='ml-2'>" + count + " User Selected</li>");
            }

            function updateDeliveryManCounter() {
                let count = $('#delivery_man_list').select2('data').length;
                $('#delivery_man_list').next('span.select2').find('ul').html("<li class='ml-2'>" + count + " delivery manSelected</li>");
            }

            $('#all_client').on('change', function() {
                if ($(this).is(':checked')) {
                    $('#client_list').find('option').prop('selected', true);
                } else {
                    $('#client_list').find('option').prop('selected', false);
                }
                $('#client_list').trigger('change');
                updateClientCounter();
            });

            $('#all_delivery_man').on('change', function() {
                if ($(this).is(':checked')) {
                    $('#delivery_man_list').find('option').prop('selected', true);
                } else {
                    $('#delivery_man_list').find('option').prop('selected', false);
                }
                $('#delivery_man_list').trigger('change');
                updateDeliveryManCounter();
            });

            $('#client_list').on('change', function() {
                updateClientCounter();
            });

            $('#delivery_man_list').on('change', function() {
                updateDeliveryManCounter();
            });

            updateClientCounter();
            updateDeliveryManCounter();

            formValidation("#pushnotificaton_form", {
                    title: { required: true },
                    message: { required: true },
                }, {
                    title: { required: "{{__('message.please_enter_name')}}" },
                    message: { required: "{{__('message.please_enter_message')}}" },
                });
        });
    </script>
    @endsection
</x-master-layout>


