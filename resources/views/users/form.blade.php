<x-master-layout :assets="$assets ?? []">
    <div>
        <?php $id = $id ?? null;?>
        @if(isset($id))
            {!! Form::model($data, ['route' => ['users.update', $id], 'method' => 'patch', 'id' => 'user_form']) !!}
        @else
            {!! Form::open(['route' => ['users.store'], 'method' => 'post','id' => 'user_form']) !!}
        @endif
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">{{ $pageTitle }}</h4>
                        </div>
                        <div class="card-action">
                            <a href="{{ route('users.index') }} " class="btn btn-sm btn-primary" role="button">{{ __('message.back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="new-user-info">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    {{ Form::label('name', __('message.name').' <span class="text-danger">*</span>',[ 'class' => 'form-control-label' ], false ) }}
                                    {{ Form::text('name', old('name'),[ 'placeholder' => __('message.name'),'class' =>'form-control','required']) }}
                                </div>
                                @php
                                    $readonly = isset($id) ? 'readonly' : '';
                                @endphp
                                <div class="form-group col-md-6">
                                    {{ Form::label('email',__('message.email').' <span class="text-danger">*</span>',['class'=>'form-control-label'], false ) }}
                                    {{ Form::email('email',isset($id) ? optional($data)->email : old('email'), [ 'placeholder' => __('message.email'), 'class' => 'form-control','required', $readonly ]) }}
                                </div>
                                <div class="form-group col-md-6">
                                    {{ Form::label('username', __('message.username').' <span class="text-danger">*</span>',['class' => 'form-control-label'], false ) }}
                                    {{ Form::text('username',isset($id) ? optional($data)->username : old('username'),[ 'placeholder' => __('message.username'),'class' =>'form-control','required',$readonly]) }}
                                </div>
                                @if(!isset($id))
                                <div class="form-group col-md-6">
                                    {{ Form::label('password', __('message.password').' <span class="text-danger">*</span>', ['class' => 'form-control-label'], false) }}
                                    <div class="input-group">
                                        {{ Form::password('password', ['class' => 'form-control', 'placeholder' => __('message.password'), 'id' => 'password']) }}
                                        <div class="input-group-append">
                                            <span class="input-group-text hide-show-password" style="cursor: pointer;">
                                                <i class="fas fa-eye-slash"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <div class="form-group col-md-6">
                                    {{ Form::label('contact_number',__('message.contact_number').' <span class="text-danger">*</span>',['class'=>'form-control-label'], false ) }}
                                    {{ Form::text('contact_number',isset($id) ? optional($data)->contact_number :  old('contact_number'),[ 'placeholder' => __('message.contact_number'), 'class' => 'form-control', 'id' => 'phone' ,'required',$readonly ]) }}
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
        $(document).ready(function() {
            $('.hide-show-password').on('click', function() {
                var passwordInput = $('#password');
                var eyeIcon = $('.hide-show-password i');

                var passwordFieldType = passwordInput.attr('type');
                if (passwordFieldType === 'password') {
                    passwordInput.attr('type', 'text');
                    eyeIcon.removeClass('fa-eye-slash').addClass('fa-eye');
                } else {
                    passwordInput.attr('type', 'password');
                    eyeIcon.removeClass('fa-eye').addClass('fa-eye-slash');
                }
            });
            formValidation("#user_form", {
                    name: { required: true },
                    email: { required: true },
                    username: { required: true },
                    password: { required: true },
                }, {
                    name: { required: "{{__('message.please_enter_name')}}"},
                    email: { required: "{{__('message.please_enter_email')}}" },
                    username: { required: "{{__('message.please_enter_username')}}" },
                    password: { required: "{{__('message.please_enter_password')}}" },
                    contact_number: { required: "{{__('message.please_enter_contact_number')}}" },
                });
        });
    </script>
    @endsection
</x-master-layout>
