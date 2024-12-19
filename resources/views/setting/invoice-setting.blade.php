{{ Form::open(['method' => 'POST', 'route' => [ 'frontend.website.information.update', 'order_invoice'], 'enctype' => 'multipart/form-data']) }}
{!! Form::hidden('invoice_setting', 'invoice_setting') !!}
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">{{$pageTitle}}</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="new-user-info">
                            <div class="row">
                                @foreach($invoice as $key => $value)
                                    @if( in_array( $key, ['company_name','company_contact_number','company_address'] ))
                                        <div class="col-md-6 form-group">
                                            {{ Form::label($key, __('message.'.$key), ['class'=>'form-control-label'], false ) }}
                                            {{ Form::text($key, $value ?? null,[ 'placeholder' =>  __('message.'.$key), 'class' => 'form-control', 'required' => true ]) }}
                                        </div>
                                    @else
                                        <div class="form-group col-md-4">
                                            <label class="form-control-label" for="{{ $key }}">{{ __('message.'.$key) }} </label>
                                            <div class="custom-file mb-1">
                                                <input type="file" name="{{ $key }}" class="custom-file-input" accept="image/*" data--target="{{$key}}_image_preview">
                                                <label class="custom-file-label">{{  __('message.choose_file',['file' =>  __('message.image') ]) }}</label>
                                            </div>
                                        </div>
                                        <div class="col-md-2 mb-2">
                                            <img id="{{$key}}_image_preview" src="{{ getSingleMedia($value, $key) }}" alt="{{$key}}" class="attachment-image mt-1 {{$key}}_image_preview">
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <hr>
                            {{ Form::submit( __('message.save'), ['class'=>'btn btn-md btn-primary float-right']) }}
                            <a href="{{ route('previousinvoice') }}" target="_blank" class="btn btn-md btn-success float-right mr-2">
                                <i class="fa-regular fa-eye"></i>
                            </a>
                        </div>
                    </div>
            </div>
        </div>
    </div>
