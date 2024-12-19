<x-master-layout :assets="$assets ?? []">
    <div>
        <?php $id = $id ?? null;?>
            {!! Form::open(['route' => ['wallet.store'], 'method' => 'post']) !!}
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
                                <div class="form-group col-md-12">
                                    {{ Form::label('type',__('message.type').' <span class="text-danger">*</span>',['class'=>'form-control-label'],false) }}
                                    {{ Form::select('type',[ 'credit' => __('message.credit'), 'debit' => __('message.debit') ], old('type'), [ 'class' => 'form-control select2js','required']) }}
                                </div>
                                <div class="col-md-12 form-group">
                                    {{ Form::label('amount',__('message.amount').' <span class="text-danger">*</span>', ['class' => 'form-control-label'],false) }}
                                    {{ Form::number('total_amount', null, [ 'placeholder' => __('message.amount') ,'class' => 'form-control' ,'required']) }}
                                 </div>

                            </div>

                            {{ Form::submit( __('message.save'), ['class'=>'btn btn-md btn-primary float-right']) }}

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
        $(document).ready(function () {
            $(".select2js").select2({
                width: "100%",
                tags: true
            });
        });
    })(jQuery);
</script>
@endsection
</x-master-layout>
