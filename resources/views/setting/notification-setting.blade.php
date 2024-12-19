
<div>
    {{ Form::model($notification_setting_data ?? null, ['method' => 'POST', 'route' => ['order-setting-save']]) }}
    {!! Form::hidden('id',isset($notification_setting_data[0]) ? $notification_setting_data[0]['id'] : null ) !!}

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                    <div class="card-header">
                        <h4>{{__('message.notification_settings')}}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <table class="table border-less">
                                <tr class="table-active">
                                    <th class="text-left"><b>{{__('message.type')}}</b></th>
                                    <th class="text-right w-50">{{__('message.one_signal')}}</th>
                                    <th class="text-right">{{__('message.firebase')}}</th>
                                </tr>

                                <tr class="border-bottom-0">
                                    <td class="text-left">{{__('message.active')}}</td>
                                    <td class="text-right">
                                        <div class="custom-checkbox m-2 float-right">
                                            {{ Form::hidden('notification_settings[active][IS_ONESIGNAL_NOTIFICATION]', 0) }}
                                            {{ Form::checkbox('notification_settings[active][IS_ONESIGNAL_NOTIFICATION]', 1, isset($notification_setting_data['active']['IS_ONESIGNAL_NOTIFICATION']) ? $notification_setting_data['active']['IS_ONESIGNAL_NOTIFICATION'] : null, ['class' => 'custom-control-input', 'id' => 'active'], false) }}
                                            {{ Form::label('active', null .' <span class="text-danger"></span>',['class' => 'custom-control-label', 'for' => 'active'],false) }}
                                        </div>
                                    </td>

                                    <td style="text-align: right;">
                                        <div class="custom-checkbox m-2 float-right">
                                            {{ Form::hidden('notification_settings[active][IS_FIREBASE_NOTIFICATION]', 0) }}
                                            {{ Form::checkbox('notification_settings[active][IS_FIREBASE_NOTIFICATION]', 1, isset($notification_setting_data['active']['IS_FIREBASE_NOTIFICATION']) ? $notification_setting_data['active']['IS_FIREBASE_NOTIFICATION'] : null, ['class' => 'custom-control-input', 'id' => 'active1'], false) }}
                                            {{ Form::label('active1', null .' <span class="text-danger"></span>', ['class' => 'custom-control-label', 'for' => 'active1'], false) }}
                                        </div>
                                    </td>
                                </tr>

                                <tr class="border-bottom-0">
                                    <td class="text-left">{{__('message.cancel')}}</td>
                                    <td class="text-right">
                                        <div class="custom-checkbox m-2 float-right">
                                            {{ Form::hidden('notification_settings[cancel][IS_ONESIGNAL_NOTIFICATION]', 0) }}
                                            {{ Form::checkbox('notification_settings[cancel][IS_ONESIGNAL_NOTIFICATION]', 1, isset($notification_setting_data['cancel']['IS_ONESIGNAL_NOTIFICATION']) ? $notification_setting_data['cancel']['IS_ONESIGNAL_NOTIFICATION'] : null, ['class' => 'custom-control-input', 'id' => 'cancel']) }}
                                            {{ Form::label('cancel', null .' <span class="text-danger"></span>', ['class' => 'custom-control-label', 'for' => 'cancel'],false) }}
                                        </div>
                                    </td>

                                    <td style="text-align: right;">
                                        <div class="custom-checkbox m-2 float-right">
                                            {{ Form::hidden('notification_settings[cancel][IS_FIREBASE_NOTIFICATION]', 0) }}
                                            {{ Form::checkbox('notification_settings[cancel][IS_FIREBASE_NOTIFICATION]', 1, isset($notification_setting_data['cancel']['IS_FIREBASE_NOTIFICATION']) ? $notification_setting_data['cancel']['IS_FIREBASE_NOTIFICATION'] : null, ['class' => 'custom-control-input', 'id' => 'cancel1']) }}
                                            {{ Form::label('cancel1', null .' <span class="text-danger"></span>', ['class' => 'custom-control-label', 'for' => 'cancel1'],false) }}
                                        </div>
                                    </td>
                                </tr>

                                <tr class="border-bottom-0">
                                    <td class="text-left">{{__('message.completed')}}</td>
                                    <td class="text-right">
                                        <div class="custom-checkbox m-2 float-right">
                                            {{ Form::hidden('notification_settings[completed][IS_ONESIGNAL_NOTIFICATION]', 0) }}
                                            {{ Form::checkbox('notification_settings[completed][IS_ONESIGNAL_NOTIFICATION]', 1, isset($notification_setting_data['completed']['IS_ONESIGNAL_NOTIFICATION']) ? $notification_setting_data['completed']['IS_ONESIGNAL_NOTIFICATION'] : null, ['class' => 'custom-control-input', 'id' => 'completed'], false) }}
                                            {{ Form::label('completed', null  .' <span class="text-danger"></span>',['class' => 'custom-control-label', 'for' => 'completed'],false) }}
                                        </div>
                                    </td>

                                    <td style="text-align: right;">
                                        <div class="custom-checkbox m-2 float-right">
                                            {{ Form::hidden('notification_settings[completed][IS_FIREBASE_NOTIFICATION]', 0) }}
                                            {{ Form::checkbox('notification_settings[completed][IS_FIREBASE_NOTIFICATION]', 1, isset($notification_setting_data['completed']['IS_FIREBASE_NOTIFICATION']) ? $notification_setting_data['completed']['IS_FIREBASE_NOTIFICATION'] : null, ['class' => 'custom-control-input', 'id' => 'completed1'], false) }}
                                            {{ Form::label('completed1', null .' <span class="text-danger"></span>', ['class' => 'custom-control-label', 'for' => 'completed1'], false) }}
                                        </div>
                                    </td>
                                </tr>

                                <tr class="border-bottom-0">
                                    <td class="text-left">{{__('message.courier_arrived')}}</td>
                                    <td class="text-right">
                                        <div class="custom-checkbox m-2 float-right">
                                            {{ Form::hidden('notification_settings[courier_arrived][IS_ONESIGNAL_NOTIFICATION]', 0) }}
                                            {{ Form::checkbox('notification_settings[courier_arrived][IS_ONESIGNAL_NOTIFICATION]', 1, isset($notification_setting_data['courier_arrived']['IS_ONESIGNAL_NOTIFICATION']) ? $notification_setting_data['courier_arrived']['IS_ONESIGNAL_NOTIFICATION'] : null, ['class' => 'custom-control-input', 'id' => 'courier_arrived'], false) }}
                                            {{ Form::label('courier_arrived', null  .' <span class="text-danger"></span>',['class' => 'custom-control-label', 'for' => 'courier_arrived'],false) }}
                                        </div>
                                    </td>

                                    <td class="text-right">
                                        <div class="custom-checkbox m-2 float-right">
                                            {{ Form::hidden('notification_settings[courier_arrived][IS_FIREBASE_NOTIFICATION]', 0) }}
                                            {{ Form::checkbox('notification_settings[courier_arrived][IS_FIREBASE_NOTIFICATION]', 1, isset($notification_setting_data['courier_arrived']['IS_FIREBASE_NOTIFICATION']) ? $notification_setting_data['courier_arrived']['IS_FIREBASE_NOTIFICATION'] : null, ['class' => 'custom-control-input', 'id' => 'courier_arrived1'], false) }}
                                            {{ Form::label('courier_arrived1', null .' <span class="text-danger"></span>', ['class' => 'custom-control-label', 'for' => 'courier_arrived1'], false) }}
                                        </div>
                                    </td>
                                </tr>

                                <tr class="border-bottom-0">
                                    <td class="text-left">{{__('message.courier_assigned')}}</td>
                                    <td class="text-right">
                                        <div class="custom-checkbox m-2 float-right">
                                            {{ Form::hidden('notification_settings[courier_assigned][IS_ONESIGNAL_NOTIFICATION]', 0) }}
                                            {{ Form::checkbox('notification_settings[courier_assigned][IS_ONESIGNAL_NOTIFICATION]', 1, isset($notification_setting_data['courier_assigned']['IS_ONESIGNAL_NOTIFICATION']) ? $notification_setting_data['courier_assigned']['IS_ONESIGNAL_NOTIFICATION'] : null, ['class' => 'custom-control-input', 'id' => 'courier_assigned'], false) }}
                                            {{ Form::label('courier_assigned', null  .' <span class="text-danger"></span>',['class' => 'custom-control-label', 'for' => 'courier_assigned'],false) }}
                                        </div>
                                    </td>

                                    <td class="text-right">
                                        <div class="custom-checkbox m-2 float-right">
                                            {{ Form::hidden('notification_settings[courier_assigned][IS_FIREBASE_NOTIFICATION]', 0) }}
                                            {{ Form::checkbox('notification_settings[courier_assigned][IS_FIREBASE_NOTIFICATION]', 1, isset($notification_setting_data['courier_assigned']['IS_FIREBASE_NOTIFICATION']) ? $notification_setting_data['courier_assigned']['IS_FIREBASE_NOTIFICATION'] : null, ['class' => 'custom-control-input', 'id' => 'courier_assigned1'], false) }}
                                            {{ Form::label('courier_assigned1', null .' <span class="text-danger"></span>', ['class' => 'custom-control-label', 'for' => 'courier_assigned1'], false) }}
                                        </div>
                                    </td>
                                </tr>

                                <tr class="border-bottom-0">
                                    <td class="text-left">{{__('message.departed_assigned')}}</td>
                                    <td class="text-right">
                                        <div class="custom-checkbox m-2 float-right">
                                            {{ Form::hidden('notification_settings[departed_assigned][IS_ONESIGNAL_NOTIFICATION]', 0) }}
                                            {{ Form::checkbox('notification_settings[departed_assigned][IS_ONESIGNAL_NOTIFICATION]', 1, isset($notification_setting_data['departed_assigned']['IS_ONESIGNAL_NOTIFICATION']) ? $notification_setting_data['departed_assigned']['IS_ONESIGNAL_NOTIFICATION'] : null, ['class' => 'custom-control-input', 'id' => 'departed_assigned'], false) }}
                                            {{ Form::label('departed_assigned', null  .' <span class="text-danger"></span>',['class' => 'custom-control-label', 'for' => 'departed_assigned'],false) }}
                                        </div>
                                    </td>

                                    <td class="text-right">
                                        <div class="custom-checkbox m-2 float-right">
                                            {{ Form::hidden('notification_settings[departed_assigned][IS_FIREBASE_NOTIFICATION]', 0) }}
                                            {{ Form::checkbox('notification_settings[departed_assigned][IS_FIREBASE_NOTIFICATION]', 1, isset($notification_setting_data['departed_assigned']['IS_FIREBASE_NOTIFICATION']) ? $notification_setting_data['departed_assigned']['IS_FIREBASE_NOTIFICATION'] : null, ['class' => 'custom-control-input', 'id' => 'departed_assigned1'], false) }}
                                            {{ Form::label('departed_assigned1', null .' <span class="text-danger"></span>', ['class' => 'custom-control-label', 'for' => 'departed_assigned1'], false) }}
                                        </div>
                                    </td>
                                </tr>

                                <tr class="border-bottom-0">
                                    <td class="text-left">{{__('message.courier_pickup_up')}}</td>
                                    <td class="text-right">
                                        <div class="custom-checkbox m-2 float-right">
                                            {{ Form::hidden('notification_settings[courier_pickup_up][IS_ONESIGNAL_NOTIFICATION]', 0) }}
                                            {{ Form::checkbox('notification_settings[courier_pickup_up][IS_ONESIGNAL_NOTIFICATION]', 1, isset($notification_setting_data['courier_pickup_up']['IS_ONESIGNAL_NOTIFICATION']) ? $notification_setting_data['courier_pickup_up']['IS_ONESIGNAL_NOTIFICATION'] : null, ['class' => 'custom-control-input', 'id' => 'courier_pickup_up'], false) }}
                                            {{ Form::label('courier_pickup_up', null  .' <span class="text-danger"></span>',['class' => 'custom-control-label', 'for' => 'courier_pickup_up'],false) }}
                                        </div>
                                    </td>

                                    <td class="text-right">
                                        <div class="custom-checkbox m-2 float-right">
                                            {{ Form::hidden('notification_settings[courier_pickup_up][IS_FIREBASE_NOTIFICATION]', 0) }}
                                            {{ Form::checkbox('notification_settings[courier_pickup_up][IS_FIREBASE_NOTIFICATION]', 1, isset($notification_setting_data['courier_pickup_up']['IS_FIREBASE_NOTIFICATION']) ? $notification_setting_data['courier_pickup_up']['IS_FIREBASE_NOTIFICATION'] : null, ['class' => 'custom-control-input', 'id' => 'courier_pickup_up1'], false) }}
                                            {{ Form::label('courier_pickup_up1', null .' <span class="text-danger"></span>', ['class' => 'custom-control-label', 'for' => 'courier_pickup_up1'], false) }}
                                        </div>
                                    </td>
                                </tr>

                                <tr class="border-bottom-0">
                                    <td class="text-left">{{__('message.courier_transfer')}}</td>
                                    <td class="text-right">
                                        <div class="custom-checkbox m-2 float-right">
                                            {{ Form::hidden('notification_settings[courier_transfer][IS_ONESIGNAL_NOTIFICATION]', 0) }}
                                            {{ Form::checkbox('notification_settings[courier_transfer][IS_ONESIGNAL_NOTIFICATION]', 1, isset($notification_setting_data['courier_transfer']['IS_ONESIGNAL_NOTIFICATION']) ? $notification_setting_data['courier_transfer']['IS_ONESIGNAL_NOTIFICATION'] : null, ['class' => 'custom-control-input', 'id' => 'courier_transfer'], false) }}
                                            {{ Form::label('courier_transfer', null  .' <span class="text-danger"></span>',['class' => 'custom-control-label', 'for' => 'courier_transfer'],false) }}
                                        </div>
                                    </td>

                                    <td class="text-right">
                                        <div class="custom-checkbox m-2 float-right">
                                            {{ Form::hidden('notification_settings[courier_transfer][IS_FIREBASE_NOTIFICATION]', 0) }}
                                            {{ Form::checkbox('notification_settings[courier_transfer][IS_FIREBASE_NOTIFICATION]', 1, isset($notification_setting_data['courier_transfer']['IS_FIREBASE_NOTIFICATION']) ? $notification_setting_data['courier_transfer']['IS_FIREBASE_NOTIFICATION'] : null, ['class' => 'custom-control-input', 'id' => 'courier_transfer1'], false) }}
                                            {{ Form::label('courier_transfer1', null .' <span class="text-danger"></span>', ['class' => 'custom-control-label', 'for' => 'courier_transfer1'], false) }}
                                        </div>
                                    </td>
                                </tr>

                                <tr class="border-bottom-0">
                                    <td class="text-left">{{__('message.create')}}</td>
                                    <td class="text-right">
                                        <div class="custom-checkbox m-2 float-right">
                                            {{ Form::hidden('notification_settings[create][IS_ONESIGNAL_NOTIFICATION]', 0) }}
                                            {{ Form::checkbox('notification_settings[create][IS_ONESIGNAL_NOTIFICATION]', 1, isset($notification_setting_data['create']['IS_ONESIGNAL_NOTIFICATION']) ? $notification_setting_data['create']['IS_ONESIGNAL_NOTIFICATION'] : null, ['class' => 'custom-control-input', 'id' => 'create'], false) }}
                                            {{ Form::label('create', null .' <span class="text-danger"></span>',['class' => 'custom-control-label', 'for' => 'create'],false) }}
                                        </div>
                                    </td>

                                    <td class="text-right">
                                        <div class="custom-checkbox m-2 float-right">
                                            {{ Form::hidden('notification_settings[create][IS_FIREBASE_NOTIFICATION]', 0) }}
                                            {{ Form::checkbox('notification_settings[create][IS_FIREBASE_NOTIFICATION]', 1, isset($notification_setting_data['create']['IS_FIREBASE_NOTIFICATION']) ? $notification_setting_data['create']['IS_FIREBASE_NOTIFICATION'] : null, ['class' => 'custom-control-input', 'id' => 'create1'], false) }}
                                            {{ Form::label('create1', null .' <span class="text-danger"></span>', ['class' => 'custom-control-label', 'for' => 'create1'], false) }}
                                        </div>
                                    </td>
                                </tr>

                                <tr class="border-bottom-0">
                                    <td class="text-left">{{__('message.delayed')}}</td>
                                    <td class="text-right">
                                        <div class="custom-checkbox m-2 float-right">
                                            {{ Form::hidden('notification_settings[delayed][IS_ONESIGNAL_NOTIFICATION]', 0) }}
                                            {{ Form::checkbox('notification_settings[delayed][IS_ONESIGNAL_NOTIFICATION]', 1, isset($notification_setting_data['delayed']['IS_ONESIGNAL_NOTIFICATION']) ? $notification_setting_data['delayed']['IS_ONESIGNAL_NOTIFICATION'] : null, ['class' => 'custom-control-input', 'id' => 'delayed'], false) }}
                                            {{ Form::label('delayed', null .' <span class="text-danger"></span>',['class' => 'custom-control-label', 'for' => 'delayed'],false) }}
                                        </div>
                                    </td>

                                    <td class="text-right">
                                        <div class="custom-checkbox m-2 float-right">
                                            {{ Form::hidden('notification_settings[delayed][IS_FIREBASE_NOTIFICATION]', 0) }}
                                            {{ Form::checkbox('notification_settings[delayed][IS_FIREBASE_NOTIFICATION]', 1, isset($notification_setting_data['delayed']['IS_FIREBASE_NOTIFICATION']) ? $notification_setting_data['delayed']['IS_FIREBASE_NOTIFICATION'] : null, ['class' => 'custom-control-input', 'id' => 'delayed1'], false) }}
                                            {{ Form::label('delayed1', null .' <span class="text-danger"></span>', ['class' => 'custom-control-label', 'for' => 'delayed1'], false) }}
                                        </div>
                                    </td>
                                </tr>

                                <tr class="border-bottom-0">
                                    <td class="text-left">{{__('message.failed')}}</td>
                                    <td class="text-right">
                                        <div class="custom-checkbox m-2 float-right">
                                            {{ Form::hidden('notification_settings[failed][IS_ONESIGNAL_NOTIFICATION]', 0) }}
                                            {{ Form::checkbox('notification_settings[failed][IS_ONESIGNAL_NOTIFICATION]', 1, isset($notification_setting_data['failed']['IS_ONESIGNAL_NOTIFICATION']) ? $notification_setting_data['failed']['IS_ONESIGNAL_NOTIFICATION'] : null, ['class' => 'custom-control-input', 'id' => 'failed'], false) }}
                                            {{ Form::label('failed', null .' <span class="text-danger"></span>',['class' => 'custom-control-label', 'for' => 'failed'],false) }}
                                        </div>
                                    </td>

                                    <td class="text-right">
                                        <div class="custom-checkbox m-2 float-right">
                                            {{ Form::hidden('notification_settings[failed][IS_FIREBASE_NOTIFICATION]', 0) }}
                                            {{ Form::checkbox('notification_settings[failed][IS_FIREBASE_NOTIFICATION]', 1, isset($notification_setting_data['failed']['IS_FIREBASE_NOTIFICATION']) ? $notification_setting_data['failed']['IS_FIREBASE_NOTIFICATION'] : null, ['class' => 'custom-control-input', 'id' => 'failed1'], false) }}
                                            {{ Form::label('failed1', null .' <span class="text-danger"></span>', ['class' => 'custom-control-label', 'for' => 'failed1'], false) }}
                                        </div>
                                    </td>
                                </tr>

                                <tr class="border-bottom-0">
                                    <td class="text-left">{{__('message.payment_status_message')}}</td>
                                    <td class="text-right">
                                        <div class="custom-checkbox m-2 float-right">
                                            {{ Form::hidden('notification_settings[payment_status_message][IS_ONESIGNAL_NOTIFICATION]', 0) }}
                                            {{ Form::checkbox('notification_settings[payment_status_message][IS_ONESIGNAL_NOTIFICATION]', 1, isset($notification_setting_data['payment_status_message']['IS_ONESIGNAL_NOTIFICATION']) ? $notification_setting_data['payment_status_message']['IS_ONESIGNAL_NOTIFICATION'] : null, ['class' => 'custom-control-input', 'id' => 'payment_status_message'], false) }}
                                            {{ Form::label('payment_status_message', null .' <span class="text-danger"></span>',['class' => 'custom-control-label', 'for' => 'payment_status_message'],false) }}
                                        </div>
                                    </td>

                                    <td class="text-right">
                                        <div class="custom-checkbox m-2 float-right">
                                            {{ Form::hidden('notification_settings[payment_status_message][IS_FIREBASE_NOTIFICATION]', 0) }}
                                            {{ Form::checkbox('notification_settings[payment_status_message][IS_FIREBASE_NOTIFICATION]', 1, isset($notification_setting_data['payment_status_message']['IS_FIREBASE_NOTIFICATION']) ? $notification_setting_data['payment_status_message']['IS_FIREBASE_NOTIFICATION'] : null, ['class' => 'custom-control-input', 'id' => 'payment_status_message1'], false) }}
                                            {{ Form::label('payment_status_message1', null .' <span class="text-danger"></span>', ['class' => 'custom-control-label', 'for' => 'payment_status_message1'], false) }}
                                        </div>
                                    </td>
                                </tr>

                            </table>
                        </div>
                    </div>
                    <hr>
                <div class="col-md-12 mt-1 mb-4">
                    {{ Form::submit(__('message.save'), ['class'=>"btn btn-md btn-primary float-md-right"]) }}
                </div>
            </div>
        </div>
    </div>
    {{ Form::close() }}
</div>
@section('bottom_script')
    <script>
    </script>
@endsection


