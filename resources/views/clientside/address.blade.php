<x-master-layout :assets="$assets ?? []">
    <div>
        <?php $id = $id ?? null;?>
        {{ Form::open(['route' => ['useraddress.store',], 'method' => 'post', 'id' => 'address_form']) }}
            {!! Form::hidden('user_id',$userdata->id) !!}
            {!! Form::hidden('country_id',$userdata->country_id) !!}
            {!! Form::hidden('city_id',$userdata->city_id) !!}
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h5 class="font-weight-bold">{{ $pageTitle  }}</h5>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="new-user-info">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        {{ Form::label('address',__('message.address').' <span class="text-danger">*</span>',['class'=>'form-control-label'],false) }}
                                        {{ Form::text('address', old('address'),['class' =>'form-control', 'id' => 'location' ,'required'])  }}
                                    </div>
                                    {{ Form::hidden('latitude', null, ['id' => 'pickup_lat']) }}
                                    {{ Form::hidden('longitude', null, ['id' => 'pickup_lng']) }}

                                    <div class="form-group col-md-6">
                                        {{ Form::label('address_type',__('message.address_type'). ' <span class="text-danger">*</span>',['class'=>'form-control-label'],false) }}
                                        {{ Form::select('address_type',[ 'home' => __('message.home'), 'work' => __('message.work'),'commercial' => __('message.commercial') ], old('address_type'), [ 'class' =>'form-control select2js']) }}
                                    </div>
                                    <div class="form-group col-md-6">
                                        {{ Form::label('contact_number',__('message.contact_number').' <span class="text-danger">*</span>',['class'=>'form-control-label'], false ) }}
                                        {{ Form::text('contact_number',  old('contact_number'),[ 'placeholder' => __('message.contact_number'), 'class' => 'form-control', 'id' => 'phone' ,'required' ]) }}
                                    </div>
                                </div>
                                <hr>
                                {{ Form::submit( __('message.save'), ['class'=>'btn btn-md btn-primary float-right']) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        {{ Form::close() }}
    </div>
    @section('bottom_script')
        <script>
            $(document).ready(function(){
                function pickupAutocomplete() {
                    var input = document.getElementById('location');
                    var autocomplete = new google.maps.places.Autocomplete(input);

                    autocomplete.addListener('place_changed', function () {
                    var place = autocomplete.getPlace();
                    document.getElementById('pickup_lat').value = place.geometry.location.lat();
                    document.getElementById('pickup_lng').value = place.geometry.location.lng();
                });
                }

                pickupAutocomplete();

                formValidation("#address_form", {
                    address: { required: true },
                    contact_number: { required: true },
                }, {
                    address: { required: "{{__('message.please_enter_address')}}" },
                    contact_number: { required: "{{__('message.please_enter_contact_number')}}" },
                });
            });
        </script>
    @endsection
</x-master-layout>
