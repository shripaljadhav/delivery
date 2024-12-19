<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{ $pageTitle }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        {{ Form::open(['method' => 'GET', 'route' => 'store-order-list','id' => 'filter-property-form' ]) }}
            <div class="modal-body">
                <div class="row p-2" id="clear-filter-list-data">
                    <div class="form-group col-md-6">
                        {{ Form::label('country_id', __('message.select_name',[ 'select' => __('message.country') ]), [ 'class' => 'form-control-label' ]) }}
                        {{ Form::select('country_id',$country,$selectedCountryId ,[
                            'class' => 'select2Clear form-group category',
                            'data-placeholder' => __('message.select_name',[ 'select' => __('message.country') ]),
                            'data-ajax--url' => route('ajax-list', [ 'type' => 'country-list' ]),
                            ]) }}
                    </div>
                    <div class="form-group col-md-6">
                       {{ Form::label('city_id', __('message.select_name', ['select' => __('message.city')]), ['class' => 'form-control-label']) }}
                       {{ Form::select('city_id',$cities,$selectedCityId,[
                           'class' => 'select2Clear form-group city',
                           'data-placeholder' => __('message.select_name', ['select' => __('message.city')]),
                           'data-ajax--url' => route('ajax-list', ['type' => 'city-list']),
                       ]) }}
                   </div>
                    <div class="form-group col-md-4">
                        {{ Form::label('status',__('message.status').' <span class="text-danger">*</span>',['class'=>'form-control-label'],false) }}
                        {{ Form::select('status',[ '' => __('message.all'),'draft' => __('message.draft'), 'completed' => __('message.delivered'),
                        'courier_departed' => __('message.departed'),'cancelled' => __('message.cancelled'),
                        'courier_assigned' => __('message.assigned'),'active' => __('message.accepted'),
                        'courier_arrived' => __('message.arrived'),'courier_picked_up' => __('message.picked_up'),
                        'create' => __('message.created') ] ,$params['status'] ?? old($params['status']), [ 'class' => 'form-control select2Clear']) }}
                    </div>
                    <div class="form-group col-md-4">
                        {{ Form::label('from_date',__('message.from_date').' <span class="text-danger">*</span>',['class'=>'form-control-label'],false) }}
                        {{ Form::date('from_date',$params['from_date'] ?? old('from_date'),[ 'placeholder' => __('message.date'),'class' =>'form-control min-datepicker select2Clear']) }}
                    </div>
                    <div class="form-group col-md-4">
                        {{ Form::label('to_date',__('message.to').' <span class="text-danger">*</span>',['class'=>'form-control-label'],false) }}
                        {{ Form::date('to_date', $params['from_date'] ?? old('to_date'),[ 'placeholder' => __('message.date'), 'class' =>'form-control min-datepicker select2Clear']) }}
                    </div>


                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-md btn-danger float-right mr-1 clearListPropertynumber text-dark">{{ __('message.reset_filter') }}</button>
                {{ Form::submit( __('message.apply_filter'), [ 'id' => 'apply-order-filter', 'class' => 'btn btn-md btn-primary float-right' ]) }}
            </div>
        {{ Form::close() }}
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.clearListPropertynumber').click(function() {

            $('#clear-filter-list-data').find('select.select2Clear').val(null).trigger('change');
        });

        $('#apply-order-filter').click(function() {
            $('#filter-property-form').submit(function() {
                $(this).find(':input').filter(function() {
                    return $.trim(this.value) === '';
                }).prop('disabled', true);

                return true;
            });
        });
        if($('.select2Clear').length > 0){
            $(document).find('.select2Clear').select2({
                width: '100%',
                allowClear: true
            });
        }
    });
</script>
