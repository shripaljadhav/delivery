<x-master-layout :assets="$assets ?? []">
    <div>
        <?php $id = $id ?? null;?>
        @if(isset($id))
            {!! Form::model($data, ['route' => ['city.update', $id], 'method' => 'patch', 'id' => 'city_form']) !!}
        @else
            {!! Form::open(['route' => ['city.store'], 'method' => 'post' , 'id' => 'city_form']) !!}
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
                                    {{ Form::label('name', __('message.name').' <span class="text-danger">*</span>',['class' => 'form-control-label'], false ) }}
                                    {{ Form::text('name', old('name'),[ 'placeholder' => __('message.name'),'class' =>'form-control']) }}
                                </div>

                                <div class="form-group col-md-4">
                                    {{ Form::label('country_id', __('message.country').' <span class="text-danger">*</span>', [ 'class' => 'form-control-label' ],false) }}
                                    {{ Form::select('country_id', isset($data) ? [optional($data->country)->id => optional($data->country)->name ] : [], old('country_id'), [
                                        'class' => 'select2js form-group country_id',
                                        'data-placeholder' => __('message.country'),
                                        'data-ajax--url' => route('ajax-list', [ 'type' => 'country-list' ]),
                                    ]) }}
                                </div>

                                <div class="form-group col-md-4">
                                    {{ Form::label('fixed_charges', __('message.fixed_charges').' <span class="text-danger">*</span>',['class' => 'form-control-label'], false ) }}
                                    {{ Form::number('fixed_charges', old('fixed_charges'),[ 'step' =>'any','min' =>'0', 'placeholder' => __('message.fixed_charges'), 'class' => 'form-control']) }}
                                </div>

                                <div class="form-group col-md-4">
                                    {{ Form::label('cancel_charges', __('message.cancel_charges').' <span class="text-danger">*</span>',['class' => 'form-control-label'], false ) }}
                                    {{ Form::number('cancel_charges', old('cancel_charges'),[ 'step' =>'any', 'min' =>'0', 'placeholder' => __('message.cancel_charges'), 'class' => 'form-control']) }}
                                </div>

                                <div class="form-group col-md-4">
                                    {{ Form::label('min_distance', __('message.min_distance').' <span class="text-danger">*</span>',['class' => 'form-control-label'], false ) }}
                                    {{ Form::number('min_distance', old('min_distance'),[ 'step' =>'any', 'min' =>'0', 'placeholder' => __('message.min_distance'), 'class' => 'form-control']) }}
                                </div>

                                <div class="form-group col-md-4">
                                    {{ Form::label('min_weight', __('message.min_weight').' <span class="text-danger">*</span>',['class' => 'form-control-label'], false ) }}
                                    {{ Form::number('min_weight', old('min_weight'),[ 'step' =>'any', 'min' =>'0', 'placeholder' => __('message.min_weight'), 'class' => 'form-control']) }}
                                </div>

                                <div class="form-group col-md-4">
                                    {{ Form::label('per_distance_charges', __('message.per_distance_charges').' <span class="text-danger">*</span>',['class' => 'form-control-label'], false ) }}
                                    {{ Form::number('per_distance_charges', old('per_distance_charges'),[ 'step' =>'any', 'min' =>'0', 'placeholder' => __('message.per_distance_charges'), 'class' => 'form-control']) }}
                                </div>

                                <div class="form-group col-md-4">
                                    {{ Form::label('per_weight_charges', __('message.per_weight_charges').' <span class="text-danger">*</span>',['class' => 'form-control-label'], false ) }}
                                    {{ Form::number('per_weight_charges', old('per_weight_charges'),[ 'step' =>'any', 'min' =>'0', 'placeholder' => __('message.per_weight_charges'), 'class' => 'form-control']) }}
                                </div>

                                <div class="form-group col-md-4">
                                    {{ Form::label('commission_type',__('message.commission_type'),['class'=>'form-control-label']) }}
                                    {{ Form::select('commission_type',[ 'fixed' => __('message.fixed'), 'percentage' => __('message.percentage') ], old('commission_type'), [ 'class' =>'form-control select2js']) }}
                                </div>

                                <div class="form-group col-md-4">
                                    {{ Form::label('admin_commission', __('message.admin_commission').' <span class="text-danger">*</span>',['class' => 'form-control-label'], false ) }}
                                    {{ Form::number('admin_commission', old('admin_commission'),[ 'step' =>'any', 'min' =>'0', 'placeholder' => __('message.admin_commission'), 'class' => 'form-control']) }}
                                </div>

                                <div class="form-group col-md-4">
                                    {{ Form::label('status',__('message.status'),['class'=>'form-control-label']) }}
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
            $(document).ready(function(){
                formValidation("#city_form", {
                    name: { required: true },
                    country_id: { required: true },
                    fixed_charges: { required: true },
                    cancel_charges: { required: true },
                    min_distance: { required: true },
                    min_weight: { required: true },
                    per_distance_charges: { required: true },
                    per_weight_charges: { required: true },
                    admin_commission: { required: true },
                }, {
                    name: { required: "{{__('message.please_enter_name')}}." },
                    country_id: { required: "{{__('message.please_select_country')}}" },
                    fixed_charges: { required: "{{__('message.please_enter_fixed_charges')}}" },
                    cancel_charges: { required: "{{__('message.please_enter_cancel_charges')}}" },
                    min_distance: { required: "{{__('message.please_enter_min_distance')}}" },
                    min_weight: { required: "{{__('message.please_enter_min_weight')}}" },
                    per_distance_charges: { required: "{{__('message.please_enter_per_distance_charges')}}" },
                    per_weight_charges: { required: "{{__('message.please_enter_per_weight_charges')}}" },
                    admin_commission: { required: "{{__('message.please_enter_admin_commission')}}" },
                });
            });
        </script>
    @endsection
</x-master-layout>
