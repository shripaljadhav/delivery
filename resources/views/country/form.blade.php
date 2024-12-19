<x-master-layout :assets="$assets ?? []">
    <div>
        <?php $id = $id ?? null;?>
        @if(isset($id))
            {!! Form::model($data, ['route' => ['country.update', $id], 'method' => 'patch', 'id' => 'country_form']) !!}
        @else
            {!! Form::open(['route' => ['country.store'], 'method' => 'post', 'id' => 'country_form']) !!}
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
                                <div class="form-group col-md-6">
                                    {{ Form::label('name', __('message.country').' <span class="text-danger">*</span>',['class' => 'form-control-label'],false) }}
                                    {{ Form::select('name', array_combine(array_column($country, 'countryNameEn'), array_map(function($country) {
                                        return $country['flag'] . ' ' . $country['countryNameEn'];}, $country)),     old('name'), ['class' => 'form-control select2js', 'required']) }}
                                </div>

                                <div class="form-group col-md-6">
                                    {{ Form::label('distance_type',__('message.distance_type'),['class'=>'form-control-label']) }}
                                    {{ Form::select('distance_type',[ 'km' => __('message.km'), 'miles' => __('message.miles') ], old('distance_type'), [ 'class' =>'form-control select2js','required']) }}
                                </div>

                                <div class="form-group col-md-6">
                                    {{ Form::label('weight_type',__('message.weight_type'),['class'=>'form-control-label']) }}
                                    {{ Form::select('weight_type',[ 'kg' => __('message.kg'), 'pound' => __('message.pound') ], old('weight_type'), [ 'class' =>'form-control select2js','required']) }}
                                </div>

                                <div class="form-group col-md-6">
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
    {{-- <script>
        $(document).ready(function(){
            formValidation("#country_form", {
                name: { required: true },
                distance_type: { required: true },
                weight_type: { required: true },
                status: { required: true },
            }, {
                name: { required: "Country already exits." },
                distance_type: { required: "Please enter Distance Type." },
                weight_type: { required: "Please Enter  Weight Type." },
                status: { required: "Please Select status." },

            });
        });
    </script> --}}
@endsection
</x-master-layout>
