<div class="col-lg-12">
    {{-- <div class="card"> --}}
        <div class="card-header">
            <h4>{{__('message.order_settings')}}</h4>
        </div>
            <div class="card-body mt-3 pt-0 pb-0">
                {{ Form::model($setting_value ?? null, ['method' => 'POST', 'route' => ['order-setting-save']]) }}
                    {!! Form::hidden('id',isset($setting_value[0]) ? $setting_value[0]['id'] : NULL ) !!}
                    <div class="row">
                        <div class="col-lg-12">
                            @foreach($setting as $key => $value)
                                        <div class="row">
                                            @foreach($value as $sub_keys => $sub_value)
                                                @php
                                                    $data = null;
                                                    foreach($setting_value as $v){
                                                        if($v->key == $sub_keys){
                                                        }
                                                    }
                                                    $class = 'col-md-4';
                                                    $text = 'number';
                                                    $checkbox = 'checkbox';
                                                    $prefix = 'text';
                                                @endphp
                                                <div class="card card-block">
                                                    <div class="row">
                                                        <div class="col-md-12  ml-1 ,mr-2">
                                                            {{ Form::label('auto_assign', __('message.auto_assign_setting') . ' <span class="text-danger">*</span>', ['class' => 'form-control-label ml-2 mt-2'], false) }}
                                                            
                                                            <div class="form-group row">
                                                                <div class="col-md-6">
                                                                    <div class="custom-control custom-switch custom-switch-color custom-control-inline ml-2">
                                                                        {!! Form::hidden('auto_assign', 0) !!}
                                                                        @if($key == 'ORDER')
                                                                            {!! Form::checkbox('auto_assign', 1, isset($v) ? $v->auto_assign : null, ['class' => 'custom-control-input bg-success float-right', 'id' => 'switch_one']) !!}
                                                                        @endif
                                                                        {!! Form::label('switch_one', __('message.auto_order_assign_to_delivery_man'), ['class' => 'custom-control-label']) !!}
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-5" style="margin-top: -26px;">
                                                                    {{ Form::label('distance', __('message.delivery_man_distance_for_auto_assign_order') . ' (' . __('message.' . $v->distance_unit) . ') <span class="text-danger">*</span>', ['class' => 'form-control-label'], false) }}
                                                                    @if($key == 'ORDER')
                                                                        <input type="{{ $text }}" name="distance" value="{{ isset($v) ? $v->distance : null }}" id="{{ $sub_keys }}" class="form-control form-control-lg" placeholder="{{ str_replace('_', ' ', $sub_keys) }}" min="0" onKeyPress="if(this.value.length==5) return false;">
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card col-md-12">
                                                    {{ Form::label('distance_unit', __('message.distance_unit') . ' <span class="text-danger">*</span>', ['class' => 'form-control-label ml-2 mt-3'], false) }}
                                                    <div class="form-group col-md-12 mt-2">
                                                        <div class="custom-control custom-radio custom-control-inline col-2">
                                                            {{ Form::radio('distance_unit', 'km', old('distance_unit', isset($v) ? $v->distance_unit : null) == 'km', ['class' => 'custom-control-input', 'id' => 'km_one']) }}
                                                            {{ Form::label('km_one', __('message.km'), ['class' => 'custom-control-label', 'for' => 'km_one']) }}
                                                        </div>

                                                        <div class="custom-control custom-radio custom-control-inline col-2">
                                                            {{ Form::radio('distance_unit', 'mile', old('distance_unit', isset($v) ? $v->distance_unit : null) == 'mile', ['class' => 'custom-control-input', 'id' => 'mile_one']) }}
                                                            {{ Form::label('mile_one', __('message.mile'), ['class' => 'custom-control-label', 'for' => 'mile_one']) }}
                                                        </div>
                                                    </div>
                                                </div>       
                                                <div class="card col-md-12">
                                                    <div class="form-group col-md-12 mt-3">
                                                        <div class="custom-control custom-switch custom-switch-color custom-control-inline" style="margin-left: -13px;">
                                                            {!! Form::hidden('otp_verify_on_pickup_delivery', 0) !!}
                                                            @if($key == 'ORDER')
                                                            {!! Form::checkbox('otp_verify_on_pickup_delivery', 1, isset($v) ? $v->otp_verify_on_pickup_delivery : null, ['class' => 'custom-control-input bg-success', 'id' => 'switch_two']) !!}
                                                            @endif
                                                            {!! Form::label('switch_two', __('message.otp_verification_for_pickup_and_drop_parcel'), ['class' => 'custom-control-label']) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card col-md-12">
                                                    <div class="form-group col-md-12 mt-3">
                                                        <div class="custom-control custom-switch custom-switch-color custom-control-inline" style="margin-left: -13px;">
                                                            {!! Form::hidden('is_vehicle_in_order', 0) !!}
                                                            @if($key == 'ORDER')
                                                                {!! Form::checkbox('is_vehicle_in_order', 1, $v->is_vehicle_in_order == 1 ? 'checked' : null, ['class' => 'custom-control-input bg-success', 'id' => 'switch_button']) !!}
                                                            @endif
                                                            {!! Form::label('switch_button', __('message.enable_or_disable_vehicle'), ['class' => 'custom-control-label']) !!}
                                                        </div>
                                                    </div>
                                                </div>  
                                                <div class="card col-md-12">
                                                    <div class="form-group col-md-12 mt-3">
                                                        <div class="custom-control custom-switch custom-switch-color custom-control-inline" style="margin-left: -13px;">
                                                            {!! Form::hidden('is_bidding_in_order', 0) !!}
                                                            @if($key == 'ORDER')
                                                                {!! Form::checkbox('is_bidding_in_order', 1, $v->is_bidding_in_order == 1 ? 'checked' : null, ['class' => 'custom-control-input bg-success', 'id' => 'switch_buttons']) !!}
                                                            @endif
                                                            {!! Form::label('switch_buttons', __('message.enable_or_disable_bidding_orders'), ['class' => 'custom-control-label']) !!}
                                                        </div>
                                                    </div>
                                                </div>  
                                                <div class="card col-md-12">  
                                                    @if($key == 'ORDER')
                                                        {!! Form::label('order_prefix', __('message.order_prefix'), ['class' => 'control-label mt-2']) !!}
                                                        <input type="{{ $prefix }}" name="prefix" value="{{ isset($v) ? $v->prefix : null }}" id="{{$sub_keys }}" class="form-control form-control col-md-6" placeholder="{{ __('message.order_prefix') }}" style="text-transform: uppercase;">
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                            @endforeach
                            {{ Form::submit(__('message.save'), ['class' => 'btn btn-md btn-primary mb-3 mr-3 float-md-right']) }}
                        </div>
                    </div>
                {{ Form::close() }}
            </div>
</div>

