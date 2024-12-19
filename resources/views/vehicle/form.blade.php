<x-master-layout :assets="$assets ?? []">
    <div>
        <?php $id = $id ?? null;?>
        @if(isset($id))
            {!! Form::model($data, ['route' => ['vehicle.update', $id], 'method' => 'patch','enctype' => 'multipart/form-data', 'id' => 'vehicle_form']) !!}
        @else
            {!! Form::open(['route' => ['vehicle.store'], 'method' => 'post','enctype' => 'multipart/form-data', 'id' => 'vehicle_form']) !!}
        @endif
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">{{ $pageTitle }}</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="new-user-info">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    {{ Form::label('title',__('message.name').' <span class="text-danger">*</span>',['class'=>'form-control-label'], false ) }}
                                    {{ Form::text('title', old('title'),['placeholder' => __('message.name'),'class' =>'form-control'])  }}
                                </div>

                                <div class="form-group col-md-4">
                                    {{ Form::label('capacity',__('message.vehicle_capacity').' <span class="text-danger">*</span>',['class'=>'form-control-label'], false ) }}
                                    {{ Form::text('capacity', old('capacity'),['placeholder' => __('message.vehicle_capacity'),'class' =>'form-control'])  }}
                                </div>

                                <div class="form-group col-md-4">
                                    {{ Form::label('size',__('message.vehicle_size').' <span class="text-danger">*</span>',['class'=>'form-control-label'], false ) }}
                                    {{ Form::text('size', old('size'),['placeholder' => __('message.vehicle_size'),'class' =>'form-control'])  }}
                                </div>

                                <div class="form-group col-md-4">
                                    {{ Form::label('description',__('message.description').' <span class="text-danger">*</span>',['class'=>'form-control-label'], false ) }}
                                    {{ Form::text('description', old('description'),['placeholder' => __('message.description'),'class' =>'form-control'])  }}
                                </div>

                                <div class="form-group col-md-4">
                                    {{ Form::label('type',__('message.type').' <span class="text-danger">*</span>',['class'=>'form-control-label'],false) }}
                                    {{ Form::select('type',[ 'city_wise' => __('message.city_wise'), 'all' => __('message.all') ], old('type'), [ 'class' =>'form-control select2js','required']) }}
                                </div>

                                <div class="form-group col-md-4" id="cityField">
                                    {{ Form::label('city_ids', __('message.city').' <span class="text-danger">*</span>', [ 'class' => 'form-control-label' ],false) }}
                                    {{ Form::select('city_ids[]', $selected_cities ?? [],  $data->city_ids ?? old('city_ids'), [
                                        'class' => 'select2js form-group city_ids',
                                        'data-placeholder' => __('message.city'),
                                        'multiple' => true,
                                        'data-ajax--url' => route('ajax-list', [ 'type' => 'city-list' ]),
                                    ]) }}
                                </div>

                                <div class="form-group col-md-4">
                                    {{ Form::label('status',__('message.status').' <span class="text-danger">*</span>',['class'=>'form-control-label'],false) }}
                                    {{ Form::select('status',['1' => __('message.enable'), '0' => __('message.disable') ], old('status'), [ 'class' =>'form-control select2js']) }}
                                </div>

                                <div class="form-group col-md-4">
                                    {{ Form::label('price', __('message.base_price').' <span class="text-danger">*</span>',['class' => 'form-control-label'],false ) }}
                                    {{ Form::number('price', old('price'),[ 'step' =>'any','min' =>'0', 'placeholder' => __('message.base_price'), 'class' => 'form-control']) }}
                                </div>
                                <div class="form-group col-md-4">
                                    {{ Form::label('min_km', __('message.min_km'),['class' => 'form-control-label']) }}
                                    {{ Form::number('min_km', old('min_km'),[ 'step' =>'any','min' =>'0', 'placeholder' => __('message.min_km'), 'class' => 'form-control']) }}
                                </div>
                                <div class="form-group col-md-4">
                                    {{ Form::label('per_km_charge', __('message.per_km_charge'),['class' => 'form-control-label']) }}
                                    {{ Form::number('per_km_charge', old('per_km_charge'),[ 'step' =>'any','min' =>'0', 'placeholder' => __('message.per_km_charge'), 'class' => 'form-control']) }}
                                </div>

                                <div class="form-group col-md-4">
                                    <label class="form-control-label" for="image">{{ __('message.image') }}</label>
                                    <div class="custom-file">
								        {{ Form::file('vehicle_image', [ 'class'=> 'custom-file-input', 'id' => 'vehicle_image', 'data--target' => 'vehicle_image_preview', 'lang' => 'en', 'accept'=> 'image/*' ]) }}
                                        <label class="custom-file-label">{{  __('message.choose_file',['file' =>  __('message.image') ]) }}</label>
                                    </div>
                                    <span class="selected_file"></span>
                                </div>
                                <div class="col-md-2 mb-2">
                                    @if(isset($id) && getMediaFileExit($data, 'vehicle_image'))
                                        <img id="vehicle_image_preview" src="{{ getSingleMedia($data, 'vehicle_image'?? 'images/default.png') }}" alt="image" class="attachment-image mt-1 vehicle_image_preview">
                                    @else
                                    <img id="vehicle_image_preview" src="{{ asset('images/default.png') }}" alt="image" class="attachment-image mt-1 vehicle_image_preview">
                                    @endif
                                </div>
                            </div>
                            <hr>
                            {{ Form::submit( isset($id) ? __('message.update') : __('message.save'), ['class'=>'btn btn-md btn-primary float-right']) }}
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
                function toggleCityField() {
                    var typeValue = $('select[name="type"]').val();
                    if (typeValue =='all') {
                        $('#cityField').hide();
                        $('select[name="city_ids[]"]').empty();
                    } else {
                        $('#cityField').show();
                    }
                }
                toggleCityField();

                $('select[name="type"]').change(function () {
                    toggleCityField();
                });
                var isImageUploaded = {{ isset($id) && getMediaFileExit($data, 'vehicle_image') ? 'true' : 'false' }};
                formValidation("#vehicle_form", {
                    title: { required: true },
                    capacity: { required: true },
                    size: { required: true },
                    description: { required: true },
                    type: { required: true },
                    'city_ids[]': { required: true },
                    status: { required: true },
                    price: { required: true },
                    vehicle_image: { required: !isImageUploaded },
                }, {
                    title: { required: "{{__('message.please_enter_title')}}" },
                    capacity: { required: "{{__('message.please_enter_capacity')}}" },
                    size: { required: "{{__('message.please_enter_size')}}" },
                    description: { required: "{{__('message.please_enter_description')}}" },
                    type: { required: "{{__('message.please_select_type')}}" },
                    'city_ids[]': { required: "{{__('message.please_select_city')}}" },
                    status: { required: "{{__('message.please_select_status')}}" },
                    price: { required: "{{__('message.please_enter_price')}}" },
                    vehicle_image: { required: "{{__('message.please_image_select')}}" },
                });
            });
        </script>
    @endsection
</x-master-layout>
