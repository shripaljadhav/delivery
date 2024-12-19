<x-master-layout :assets="$assets ?? []">
    <div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="font-weight-bold text-uppercase">{{optional($data)->name}}</h4>
                        </div>
                        <a  href="{{route('city.index')}}" class="btn btn-primary btn-sm"> <i class="fa fa-angle-double-left"></i> {{__('message.back')}}</a>
                    </div>
                    <div class="card-body">
                        <div class="new-user-info">

                            <div class="row">
                                <div class="form-group col-md-3">
                                    {{ Form::label('city_id',__('message.city_id'),['class'=>'form-control-label text-secondary'], false ) }}
                                   <h6> {{optional($data)->id }}</h6>
                                </div>

                                <div class="form-group col-md-3">
                                    {{ Form::label('country_name',__('message.country_name'),['class'=>'form-control-label text-secondary'], false ) }}
                                   <h6> {{optional($data->country)->name }}</h6>
                                </div>

                                <div class="form-group col-md-3">
                                    @php
                                       $country =  optional($data->country)->distance_type;
                                        $distance = optional($data)->min_distance;
                                    @endphp
                                        {{ Form::label('min_distance', __('message.min_distance') . ' (' . $country . ')', ['class' => 'form-control-label text-secondary']) }}
                                        <h4>{{optional($data)->min_distance}}</h4>
                                </div>
                                <div class="form-group col-md-3">
                                    @php
                                       $country =  optional($data->country)->weight_type;
                                        $weight = optional($data)->min_weight;
                                    @endphp
                                        {{ Form::label('min_weight', __('message.min_weight') . ' (' . $country . ')', ['class' => 'form-control-label text-secondary']) }}
                                        <h4>{{optional($data)->min_weight}}</h4>
                                </div>
                            </div>

                            <hr>
                            <div class="row">
                                <div class="form-group col-md-3">
                                    {{ Form::label('fixed_charges',__('message.fixed_charges'),['class'=>'form-control-label text-secondary'], false ) }}
                                    <h4>{{getPriceFormat($data->fixed_charges)}}</h4>
                                </div>

                                <div class="form-group col-md-3">
                                    {{ Form::label('cancel_charges',__('message.cancel_charges'),['class'=>'form-control-label text-secondary'], false ) }}
                                    <h4>{{getPriceFormat($data->cancel_charges)}}</h4>
                                </div>

                                <div class="form-group col-md-3">
                                    {{ Form::label('per_distance_charges',__('message.per_distance_charges'),['class'=>'form-control-label text-secondary'], false ) }}
                                    <h4>{{getPriceFormat($data->per_distance_charges)}}</h4>
                                </div>

                                <div class="form-group col-md-3">
                                    {{ Form::label('per_weight_charges',__('message.per_weight_charges'),['class'=>'form-control-label text-secondary'], false ) }}
                                    <h4>{{getPriceFormat($data->per_weight_charges)}}</h4>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="form-group col-md-3">
                                    {{ Form::label('admin_commission',__('message.admin_commission'),['class'=>'form-control-label text-secondary'], false ) }}
                                    @php
                                        $commission_type = $data->commission_type;
                                            $admin_commission = $data->admin_commission;

                                            if ($commission_type == 'percentage') {
                                                $admin_commission .= ' % ';
                                            }
                                    @endphp
                                    <h4>{{$admin_commission}}</h4>
                                </div>

                                <div class="form-group col-md-3">
                                    {{ Form::label('created_at',__('message.created_at'),['class'=>'form-control-label text-secondary'], false ) }}
                                    <h6>{{ dateAgoFormate($data->created_at) }}</h6>
                                </div>

                                <div class="form-group col-md-3">
                                    {{ Form::label('updated_at',__('message.updated_at'),['class'=>'form-control-label text-secondary'], false ) }}
                                    <h6>{{ dateAgoFormate($data->updated_at) }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    @section('bottom_script')
    @endsection
</x-master-layout>