<x-master-layout :assets="$assets ?? []">
    <div>
        <?php $id = $id ?? null;?>
        @if(isset($id))
            {!! Form::model($data, ['route' => ['coupon.update', $id], 'method' => 'patch', 'id' => 'coupon_form']) !!}
        @else
            {!! Form::open(['route' => ['coupon.store'], 'method' => 'post', 'id' => 'coupon_form']) !!}
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
                                    {{ Form::label('start_date',__('message.start_date').' <span class="text-danger">*</span>',['class'=>'form-control-label'],false) }}
                                    {{ Form::date('start_date', old('start_date'), ['placeholder' => __('message.start_date'), 'class' => 'form-control min-datepicker']) }}
                                </div>
                                <div class="form-group col-md-4">
                                    {{ Form::label('end_date',__('message.end_date').' <span class="text-danger">*</span>',['class'=>'form-control-label'],false) }}
                                    {{ Form::date('end_date', old('end_date'), ['placeholder' => __('message.end_date'), 'class' => 'form-control min-datepicker']) }}
                                </div>
                                <div class="form-group col-md-4">
                                    {{ Form::label('value_type',__('message.value_type'),['class'=>'form-control-label']) }}
                                    {{ Form::select('value_type',[ 'fixed' => __('message.fixed'), 'percentage' => __('message.percentage') ], old('value_type '), [ 'class' =>'form-control select2js']) }}
                                </div>

                                <div class="form-group col-md-4">
                                    {{ Form::label('discount_amount', __('message.discount_amount').' <span class="text-danger">*</span>',['class' => 'form-control-label'],false ) }}
                                    {{ Form::number('discount_amount', old('discount_amount'),[ 'step' =>'any','min' =>'0', 'placeholder' => __('message.discount_amount'), 'class' => 'form-control']) }}
                                </div>

                                <div class="form-group col-md-4">
                                    {{ Form::label('city_type',__('message.city_type'),['class'=>'form-control-label']) }}
                                    {{ Form::select('city_type',[ 'city_wise' => __('message.city_wise'), 'all' => __('message.all') ], old('type'), [ 'class' =>'form-control select2js','required']) }}
                                </div>

                                <div class="form-group col-md-4" id="cityField">
                                    {{ Form::label('city_id', __('message.city').' <span class="text-danger">*</span>', [ 'class' => 'form-control-label' ],false) }}
                                    {{ Form::select('city_id[]', $selected_cities ?? [],  $data->city_id ?? old('city_id'), [
                                        'class' => 'select2js form-group city_id',
                                        'data-placeholder' => __('message.city'),
                                        'multiple' => true,
                                        'data-ajax--url' => route('ajax-list', [ 'type' => 'city-list' ]),
                                    ]) }}
                                </div>
                                <div class="form-group col-md-4">
                                    {{ Form::label('status',__('message.status'),['class'=>'form-control-label']) }}
                                    {{ Form::select('status',[ '1' => __('message.enable'), '0' => __('message.disable') ], old('status'), [ 'class' =>'form-control select2js','required']) }}
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
                var typeValue = $('select[name="city_type"]').val();
                if (typeValue === 'all') {
                    $('#cityField').hide();
                    $('select[name="city_id[]"]').empty();
                } else {
                    $('#cityField').show();
                }
            }
   
                toggleCityField();

            $('select[name="city_type"]').change(function() {
                toggleCityField();
            });

            $.validator.addMethod("greaterThanEqual", function(value, element, param) {
                var startDate = $(param).val();
                return this.optional(element) || new Date(value) >= new Date(startDate);
            }, "{{ __('message.end_date_must_be_greater_than_start_date') }}");

            formValidation("#coupon_form", {
                start_date: { required: true },
                end_date: {
                    required: true,
                    greaterThanEqual: "#start_date" 
                },
                discount_amount: { required: true },
                'city_id[]': { required: true }
            }, {
                start_date: { required: "{{__('message.please_select_start_date')}}" },
                end_date: {
                    required: "{{__('message.please_select_end_date')}}",
                    greaterThanEqual: "{{__('message.end_date_must_be_after_start_date')}}" // Use the custom error message
                },
                discount_amount: { required: "{{__('message.please_enter_discount_amount')}}" },
                'city_id[]': { required: "{{__('message.please_select_city')}}" }
            });
        });
    </script>
    @endsection
</x-master-layout>
