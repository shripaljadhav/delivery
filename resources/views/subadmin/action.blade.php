<?php
    $auth_user= authSession();
?>
@if($deleted_at != null)
    <div class="d-flex justify-content-end align-items-center">
        @if($auth_user->can('subadmin-edit'))
        <a class="mr-2" href="{{ route('sub-admin.restore', ['id' => $id ,'type'=>'restore']) }}" data--confirmation--restore="true" title="{{ __('message.restore_title') }}"><i class="ri-refresh-line" style="font-size:18px"></i></a>
        @endif
        {{ Form::open(['route' => ['sub-admin.force.delete', $id, 'type'=>'forcedelete'], 'method' => 'delete','data--submit'=>'users'.$id]) }}
                @if($auth_user->can('subadmin-delete'))
                    <a class="mr-2 text-danger" href="javascript:void(0)" data--submit="users{{$id}}"
                        data--confirmation='true' data-title="{{ __('message.delete_form_title',['form'=> __('message.sub_admin') ]) }}"
                        title="{{ __('message.force_delete_form_title',['form'=>  __('message.sub_admin') ]) }}"
                        data-message='{{ __("message.force_delete_msg") }}'>
                        <i class="ri-delete-bin-2-fill" style="font-size:18px"></i>
                    </a>
                @endif
            </div>
        {{ Form::close() }}
 @else
    @if($action_type == 'status')
        <div class="custom-switch custom-switch-text custom-switch-color custom-control-inline m-0">
            <div class="custom-switch-inner">
                <input type="checkbox" class="custom-control-input bg-success change_status" data-type="user" id="{{ $data->id }}" data-id="{{ $data->id }}" {{ ($data->status == '0' ? 0 : 1) ? 'checked' : '' }} value="{{ $data->id }}">
                <label class="custom-control-label" for="{{ $data->id }}" data-on-label="" data-off-label=""></label>
            </div>
        </div>
    @endif
    @if($action_type == 'action')
        <div class="d-flex justify-content-end align-items-center">
            @if($auth_user->can('subadmin-edit'))
                <a class="mr-2" href="{{ route('sub-admin.edit', $id) }}" title="{{ __('message.update_form_title',['form' => __('message.sub_admin') ]) }}"><i class="fas fa-edit text-primary"></i></a>
            @endif

            @if($auth_user->can('subadmin-delete'))
                {{ Form::open(['route' => ['sub-admin.destroy', $id], 'method' => 'delete','data--submit'=>'users'.$id]) }}
                    <a class="mr-2 text-danger" href="javascript:void(0)" data--submit="users{{$id}}"
                        data--confirmation='true' data-title="{{ __('message.delete_form_title',['form'=> __('message.sub_admin') ]) }}"
                        title="{{ __('message.delete_form_title',['form'=>  __('message.sub_admin') ]) }}"
                        data-message='{{ __("message.delete_msg") }}'>
                        <i class="fas fa-trash-alt"></i>
                    </a>
                {{ Form::close() }}
            @endif
        </div>
    @endif
@endif
