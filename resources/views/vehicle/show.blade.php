<x-master-layout :assets="$assets ?? []">
    <div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="font-weight-bold text-uppercase">{{$data->title}}</h4>
                        </div>
                        <a  href="{{route('vehicle.index')}}" class="btn btn-primary btn-sm"> <i class="fa fa-angle-double-left"></i> {{__('message.back')}}</a>
                    </div>
                    <div class="card-body">
                        <div class="new-user-info">
                            <div class="row">
                                <div class="form-group col-md-3">
                                    {{ Form::label('vehicle',__('message.vehicle'),['class'=>'form-control-label text-secondary'], false ) }}
                                   <h6> {{$data->id }}</h6>
                                </div>

                                <div class="form-group col-md-3">
                                    {{ Form::label('vehicle_name',__('message.vehicle_name'),['class'=>'form-control-label text-secondary'], false ) }}
                                   <h6> {{$data->title }}</h6>
                                </div>

                                <div class="form-group col-md-3">
                                        {{ Form::label('city', __('message.city') , ['class' => 'form-control-label text-secondary']) }}
                                        <h4>{{$data->type}}</h4>
                                </div>
                                <div class="form-group col-md-3">
                                        {{ Form::label('vehicle_size', __('message.vehicle_size') , ['class' => 'form-control-label text-secondary']) }}
                                        <h4>{{$data->size}}</h4>
                                </div>
                            </div>

                            <hr>
                            <div class="row">
                                <div class="form-group col-md-3">
                                    {{ Form::label('vehicle_capacity',__('message.vehicle_capacity'),['class'=>'form-control-label text-secondary'], false ) }}
                                    <h4>{{$data->capacity}}</h4>
                                </div>

                                <div class="form-group col-md-3">
                                    {{ Form::label('description',__('message.description'),['class'=>'form-control-label text-secondary'], false ) }}
                                    <h4>{{$data->description}}</h4>
                                </div>

                                <div class="form-group col-md-3">
                                    {{ Form::label('vehicle_price', __('message.vehicle_price') , ['class' => 'form-control-label text-secondary']) }}
                                    <h4>{{getPriceFormat($data->price)}}</h4>
                                </div>

                                <div class="form-group col-md-3">
                                    {{ Form::label('min_km', __('message.min_km') , ['class' => 'form-control-label text-secondary']) }}
                                    <h4>{{($data->min_km)}}</h4>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="form-group col-md-3">
                                    {{ Form::label('per_km_charge', __('message.per_km_charge') , ['class' => 'form-control-label text-secondary']) }}
                                    <h4>{{getPriceFormat($data->per_km_charge)}}</h4>
                                </div>

                                <div class="form-group col-md-3">
                                    {{ Form::label('created_at',__('message.created_at'),['class'=>'form-control-label text-secondary'], false ) }}
                                    <h6>{{dateAgoFormate($data->created_at)}}</h6>
                                </div>

                                <div class="form-group col-md-3">
                                    {{ Form::label('updated_at',__('message.updated_at'),['class'=>'form-control-label text-secondary'], false ) }}
                                    <h6>{{dateAgoFormate($data->updated_at)}}</h6>
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
