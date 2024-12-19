<x-master-layout :assets="$assets ?? []">
    <div class="container-fluid">
        <?php $id = $id ?? null;?>
        @if(isset($id))
            {!! Form::model(['route' => ['ordermail.update', $id], 'method' => 'patch']) !!}
        @else
            {!! Form::open(['route' => ['ordermail.store'], 'method' => 'post']) !!}
        @endif
        {!! Form::hidden('type',$ordersType) !!}

        <div class="row">
            <div class="col-lg-12">
                    <div class="card card-block card-stretch">
                        <div class="card-body p-0">
                            <div class="d-flex justify-content-between align-items-center p-3">
                                <h5 class="font-weight-bold">{{ $pageTitle ?? __('message.list') }}</h5>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    {{ Form::label('subject', __('message.subject'), ['class' => 'form-control-label']) }}
                                    {{ Form::text('subject', old('subject', isset($data->subject) ? $data->subject : null), ['placeholder' => __('message.subject'), 'class' => 'form-control', 'required']) }}
                                </div>
                                <div class="form-group col-md-12">
                                    {{ Form::label('mail_description',__('message.description'), ['class' => 'form-control-label']) }}
                                    {{ Form::textarea('mail_description', old('mail_description', isset($data->mail_description) ? $data->mail_description : null), ['class'=> 'form-control tinymce-mail_description' , 'placeholder'=> __('message.privacy_policy') ]) }}
                                </div>
                            </div>
                            {{ Form::submit( __('message.save'), ['class'=>'btn btn-md btn-primary float-right']) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('bottom_script')
        <script>
            (function($) {
                $(document).ready(function(){
                    tinymceEditor('.tinymce-mail_description',' ',function (ed) {
                    }, 450)
                });
            })(jQuery);
        </script>
    @endsection
</x-master-layout>