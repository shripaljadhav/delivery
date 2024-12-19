<x-master-layout>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-block card-stretch">
                    <div class="card-body p-0">
                        <div class="d-flex justify-content-between align-items-center p-3">
                            <h5 class="font-weight-bold">{{ $pageTitle ?? __('message.list') }}</h5>
                            
                            <a href="{{ route('useraddress.create') }}" class="float-right btn btn-sm btn-primary"><i class="fa fa-plus-circle"></i> {{ __('message.add_form_title', ['form' => __('message.address')]) }}</a>
                        </div>

                            {{-- {{ Form::open(['method' => 'GET']) }}
                                <div class="col-md-5 float-left">
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            {{ Form::label('country_id', __('message.select_name', ['select' => __('message.country')]), ['class' => 'form-control-label']) }}
                                            {{ Form::select('country_id', $selectedCountry, request()->input('country_id'), [
                                                'class' => 'select2js form-group country',
                                                'data-placeholder' => __('message.select_name', ['select' => __('message.country')]),
                                                'data-ajax--url' => route('ajax-list', ['type' => 'country-list']),
                                                ]) }}
                                        </div>
                                        <div class="form-group col-md-3">
                                            {{ Form::label('city_id', __('message.select_name', ['select' => __('message.city')]), ['class' => 'form-control-label']) }}
                                            {{ Form::select('city_id', $selectedCity, request()->input('city_id'), [
                                                'class' => 'select2js form-group city',
                                                'data-placeholder' => __('message.select_name', ['select' => __('message.city')]),
                                                'data-ajax--url' => route('ajax-list', ['type' => 'city-list']),
                                            ]) }}
                                        </div>
                                        
                                        <div class="form-group col-md-5 mt-3">
                                            <button type="submit" class="btn btn-sm btn-warning text-white mt-3 pt-2 pb-2">{{ __('message.apply_filter') }}</button>
                                            <a href="{{ route('useraddress.index') }}" class="btn btn-sm btn-success text-dark ml-2 mt-3 pt-2 pb-2">{{__('message.reset')}}</a>
                                        </div>
                                    </div>
                                </div>
                            {{ Form::close() }} --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @foreach($userAddresses as $item)
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div>
                                        <strong>{{ $item->address }}</strong><br>
                                        <strong>{{ $item->contact_number }}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @section('bottom_script')
    @endsection
</x-master-layout>
