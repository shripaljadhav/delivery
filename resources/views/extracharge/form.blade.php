<x-master-layout :assets="$assets ?? []">
    <div>
        <?php $id = $id ?? null;?>
        @if(isset($id))
            {!! Form::model($data, ['route' => ['extracharge.update', $id], 'method' => 'patch', 'id' => 'extracharge_form']) !!}
        @else
            {!! Form::open(['route' => ['extracharge.store'], 'method' => 'post' , 'id' => 'extracharge_form']) !!}
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
                                    {{ Form::label('country_id', __('message.country').' <span class="text-danger">*</span>', [ 'class' => 'form-control-label' ],false) }}
                                    {{ Form::select('country_id', isset($data) ? [$data->country->id =>  $data->country->name ] : [], old('country_id'), [
                                        'class' => 'select2js form-group country_id',
                                        'data-placeholder' => __('message.country'),
                                        'data-ajax--url' => route('ajax-list', [ 'type' => 'country-list' ]),
                                    ]) }}
                                </div>

                                <div class="form-group col-md-4">
                                    {{ Form::label('city_id', __('message.city').' <span class="text-danger">*</span>', [ 'class' => 'form-control-label' ],false) }}
                                    {{ Form::select('city_id', isset($data) ? [$data->city->id =>  $data->city->name ] : [], old('city_id'), [
                                        'class' => 'select2js form-group city_id',
                                        'data-placeholder' => __('message.city'),
                                    ]) }}
                                </div>

                                <div class="form-group col-md-4">
                                    {{ Form::label('title',__('message.name').' <span class="text-danger">*</span>',['class'=>'form-control-label'], false ) }}
                                    {{ Form::text('title', old('title'),['placeholder' => __('message.name'),'class' =>'form-control'])  }}
                                </div>

                                <div class="form-group col-md-4">
                                    {{ Form::label('charges', __('message.charges').' <span class="text-danger">*</span>',['class' => 'form-control-label'], false ) }}
                                    {{ Form::number('charges', old('charges'),[ 'step' =>'any', 'min' =>'0', 'placeholder' => __('message.charges'), 'class' => 'form-control']) }}
                                </div>

                                <div class="form-group col-md-4">
                                    {{ Form::label('charges_type',__('message.charges_type').' <span class="text-danger">*</span>',['class'=>'form-control-label'],false) }}
                                    {{ Form::select('charges_type',[ 'fixed' => __('message.fixed'), 'percentage' => __('message.percentage') ], old('charges_type'), [ 'class' =>'form-control select2js']) }}
                                </div>

                                <div class="form-group col-md-4">
                                    {{ Form::label('status',__('message.status').' <span class="text-danger">*</span>',['class'=>'form-control-label'],false) }}
                                    {{ Form::select('status',[ '1' => __('message.enable'), '0' => __('message.disable') ], old('status'), [ 'class' =>'form-control select2js']) }}
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
            (function($) {
                "use strict";
                $(document).ready(function () {

                    $(document).on('change' , '#country_id' , function (){
                        var country_id = $(this).val();
                        $('#city_id').empty();
                        cityList(country_id);
                    });
                });

                function cityList(country_id) {
                    var section_class_route = "{{ route('ajax-list', ['type' => 'extra_charge_city', 'country_id' => '']) }}" + country_id;
                    section_class_route = section_class_route.replace('amp;','');

                    $.ajax({
                        url: section_class_route,
                        success: function(result){
                            $('#city_id').select2({
                                width: '100%',
                                placeholder: "{{ __('message.select_name',['select' => __('message.city')]) }}",
                                data: result.results
                            });
                            if(state != null){
                                $("#city_id").val(state).trigger('change');
                            }
                        }
                    });
                }
                formValidation("#extracharge_form", {
                    country_id: { required: true },
                    city_id: { required: true },
                    title: { required: true },
                    charges: { required: true },
                    charges_type: { required: true },
                    status: { required: true },
                }, {
                    country_id: { required: "{{__('message.please_select_country')}}"},
                    city_id: { required: "{{__('message.please_select_city')}}"},
                    title: { required: "{{__('message.please_enter_name')}}" },
                    charges: { required: "{{__('message.please_enter_charges')}}" },
                    charges_type: { required: "{{__('message.please_enter_charges_type')}}" },
                    status: { required: "{{__('message.please_select_status')}}" },
                });
            })(jQuery);
        </script>
    @endsection
</x-master-layout>
