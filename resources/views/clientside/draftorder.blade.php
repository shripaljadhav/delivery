<x-master-layout>
    <div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                            <div class="col-md-6 float-left">
                                {{ Form::open(['method' => 'GET']) }}
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            {{ Form::label('country_id', __('message.select_name', ['select' => __('message.country')]), ['class' => 'form-control-label']) }}
                                            {{ Form::select('country_id', $selectedCountry,request()->input('country_id'), [
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

                                        <div class="form-group col-md-4 mt-3">
                                            <button type="submit" class="btn btn-sm btn-warning text-white mt-3 pt-2 pb-2">{{ __('message.apply_filter') }}</button>
                                            <a href="{{ route('draft-order') }}" class="btn btn-sm btn-success text-dark ml-2 mt-3 pt-2 pb-2">{{__('message.reset')}}</a>
                                        </div>
                                    </div>
                                {{ Form::close() }}
                            </div>

                        <div class="table-responsive mt-4">
                            <table id="basic-table" class="table mb-0  text-center" role="grid">
                                <thead>
                                    <tr>
                                        <th scope='col'>{{ __('message.order_id') }}</th>
                                        <th scope='col'>{{ __('message.delivery_man') }}</th>
                                        <th scope='col'>{{ __('message.pickup_date') }}</th>
                                        <th scope='col'>{{ __('message.pickup_address') }}</th>
                                        <th scope='col'>{{ __('message.created_at') }}</th>
                                        <th scope='col'>{{ __('message.status') }}</th>
                                        <th scope='col'>{{ __('message.action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if( count($orders) > 0)
                                        @foreach ( $orders  as $value)
                                            @php
                                                $status = 'primary';
                                                    $order_status = $value->status;
                                                switch ($order_status) {
                                                    case 'draft':
                                                    $status = 'light';
                                                    $status_name = __('message.draft');
                                                    break;

                                                }
                                            @endphp
                                            <tr>
                                                <td><a class="mr-2" href="{{ route('order.show',$value->id) }}">{{$value->id ?? '-'}}</a></td>
                                                <td><a href="{{ route('deliveryman-view.show', $value->delivery_man_id)}}">{{ optional($value->delivery_man)->name ?? '-'}}</a></td>
                                                <td>{{dateAgoFormate($value->pickup_datetime) ?? '-' }}</td>
                                                <td>
                                                    <?php
                                                        $pickup_address = $value->pickup_point['address'];
                                                        echo (strlen($pickup_address)) ? '<span data-toggle="tooltip" data-html="true" data-placement="top" title="'.$pickup_address.'">'.substr($pickup_address, 0, 35).'...'.'</span>' : '-' ;
                                                    ?>
                                                </td>
                                                <td>{{dateAgoFormate($value->created_at) ?? '-' }}</td>
                                                <td><span class="badge bg-{{$status}}">{{ __('message.'.$order_status) }}</span></td>
                                                <td>
                                                    @if($value->status == 'draft')
                                                        <a class="mr-2" href="{{ route('order.edit',$value->id) }}" title="{{ __('message.update_form_title',['form' => __('message.users') ]) }}"><i class="fas fa-edit text-primary"></i></a>
                                                    @else
                                                        <a class="mr-2" href="{{ route('order.show',$value->id) }}"><i class="fas fa-eye text-secondary"></i></a>
                                                        <a class="mr-2" href="{{ route('order-invoice',$value->id) }}"><i class="fa fa-download"></i></a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="9">{{ __('message.no_record_found') }}</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('bottom_script')
        <script>
             $("#basic-table").DataTable({
                "dom":  '<"row align-items-center"<"col-md-2"><"col-md-6" B><"col-md-4"f>><"table-responsive my-3" rt><"d-flex" <"flex-grow-1" l><"p-2" i><"mt-4" p>><"clear">',
                "order": [[0, "desc"]]
            });
        </script>
    @endsection
</x-master-layout>
