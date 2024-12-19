{{ Form::model($setting_value, ['method' => 'POST', 'route' => ['settingUpdate']]) }}
    {{ Form::hidden('id', null, ['class' => 'form-control']) }}
    {{ Form::hidden('page', $page, ['class' => 'form-control']) }}
    {!! Form::hidden('mail_template_setting', 'mail_template_setting') !!}

    <div class="card shadow mb-10">
        <div class="card-body">
            <div class="row">
                @foreach($setting as $key => $value)
                    @foreach($value as $sub_key => $sub_value)
                        @php
                            $data = null;
                            foreach($setting_value as $v) {
                                if ($v->key == $sub_key) {
                                    $data = $v;
                                }
                            }
                            $type = 'number';
                        @endphp
                            <div class="col-sm-4">
                                <div class="form-group">
                                    {{ Form::hidden('type[]',$key , ['class' => 'form-control']) }}
                                    {{ Form::hidden('key[]', $sub_key) }}
                                    @if($key == 'order_mail')
                                        <div class="custom-switch custom-switch-color custom-control-inline">
                                            {!! Form::hidden('value['.$loop->index.']', 0) !!}
                                            {!! Form::checkbox('value['.$loop->index.']', 1, isset($data) && $data->value == 1, ['class' => 'custom-control-input bg-success float-right', 'id' => $sub_key]) !!}
                                            {!! Form::label($sub_key, __('message.' . $sub_key), ['class' => 'custom-control-label']) !!}
                                        </div>
                                    @endif
                                </div>
                            </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
{{ Form::submit(__('message.save'), ['class'=>"btn btn-md btn-primary float-md-right"]) }}
{{ Form::close() }}
