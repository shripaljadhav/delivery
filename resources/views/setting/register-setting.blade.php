{{ Form::model($setting_value, ['method' => 'POST', 'route' => ['settingUpdate']]) }}
    {{ Form::hidden('id', null, ['class' => 'form-control']) }}
    {{ Form::hidden('page', $page, ['class' => 'form-control']) }}
    {!! Form::hidden('register_settings','register_settings') !!}
    <div class="row">
        @foreach($setting as $key => $value)
            <div class="col-md-12 col-sm-12 card shadow mb-10">
                <div class="card-header">
                    <h4>{{ $pageTitle }}</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach($value as $sub_key => $sub_value)
                            @php
                                $data = null;
                                foreach($setting_value as $v) {
                         
                                    if ($v->key == $sub_key) {
                                        $data = $v;
                                    }
                                }
                            @endphp
                            <div class="col-sm-12">
                                <div class="form-group">
                                    {{ Form::hidden('type[]', $sub_key , ['class' => 'form-control']) }}
                                    {{ Form::hidden('key[]', $sub_key) }}
                                    @if($key == 'register_setting')
                                        <div class="custom-switch custom-switch-color custom-control-inline">
                                            {!! Form::hidden('value['.$loop->index.']', 0) !!}
                                            {!! Form::checkbox('value['.$loop->index.']', 1, isset($data) && $data->value == 1, ['class' => 'custom-control-input bg-success float-right', 'id' => $sub_key]) !!}
                                            {!! Form::label($sub_key, __('message.' . $sub_key), ['class' => 'custom-control-label']) !!}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
{{ Form::submit(__('message.save'), ['class'=>"btn btn-md btn-primary float-md-right"]) }}
{{ Form::close() }}
