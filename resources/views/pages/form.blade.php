<x-master-layout :assets="$assets ?? []">
    <div>
        <?php $id = $id ?? null;?>
        @if(isset($id))
            {!! Form::model($pages, ['route' => ['pages.update', $id], 'method' => 'patch','id'=>'page_form']) !!}

        @else
            {!! Form::open(['route' => ['pages.store'], 'method' => 'post','id' => 'page_form']) !!}
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
                                <div class="form-group col-md-4">
                                    {{ Form::label('title', __('message.title') .' <span class="text-danger">*</span>', ['class' => 'form-control-label'],false) }}
                                    {{ Form::text('title', old('title'), ['placeholder' => __('message.title'), 'class' => 'form-control']) }}
                                </div>
                                <div class="form-group col-md-12">
                                    {{ Form::label('description',__('message.description'), ['class' => 'form-control-label']) }}
                                    {{ Form::textarea('description', old('description'), ['class'=> 'form-control tinymce-description' , 'placeholder'=> __('message.description') ]) }}
                                </div>
                                @if ($errors->has('description'))
                                 <span class="text-danger">{{ $errors->first('description') }}</span>
                                @endif
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
        (function($) {
            $(document).ready(function(){
                tinymceEditor('.tinymce-description',' ',function (ed) {

                }, 450)
                formValidation("#page_form", {
                    title: { required: true },
                    description: { required: true },
                }, {
                    title: { required: "{{__('message.please_enter_title')}}" },
                    description: { required: "{{__('message.please_select_country')}}" },
                });
            });

        })(jQuery);
      </script>
    @endsection
</x-master-layout>
