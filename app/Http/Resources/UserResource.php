<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\DeliveryManDocument;
use App\Models\DeliverymanVehicleHistory;
use App\Models\User;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $id = $request->id;
        $user = User::where('id', $id)->withTrashed()->first();
        $courier_companies_detail = null;
        if ($user && $user->vehicle_id != null) {
            $vehicledata = DeliverymanVehicleHistory::where('delivery_man_id', $user->id)->where('is_active', 1)->get();
            if ($vehicledata->isNotEmpty()) {
                $courier_companies_detail = DeliverymanVehicleHistoryResource::collection($vehicledata);
            }
        }

        $is_verified_delivery_man = false;
        if ($this->user_type == 'delivery_man') {
            $is_verified_delivery_man = DeliveryManDocument::verifyDeliveryManDocument($this->id);
        }

        $is_email_verification = SettingData('email_verification', 'email_verification');
        $is_mobile_verification = SettingData('mobile_verification', 'mobile_verification');
        $is_document_verification = SettingData('document_verification', 'document_verification');

        return [
            'id'                => $this->id, 
            'name'              => $this->name,
            'email'             => $this->email,
            'username'          => $this->username,
            'status'            => $this->status,
            'user_type'         => $this->user_type,
            'country_id'        => $this->country_id,
            'country_name'      => optional($this->country)->name,
            'city_id'           => $this->city_id,
            'city_name'         => optional($this->city)->name,
            'address'           => $this->address,
            'contact_number'    => $this->contact_number,
            'profile_image'     => getSingleMedia($this, 'profile_image', null),
            'login_type'        => $this->login_type,
            'latitude'          => $this->latitude,
            'longitude'         => $this->longitude,
            'uid'               => $this->uid,
            'player_id'         => $this->player_id,
            'fcm_token'         => $this->fcm_token,
            'last_notification_seen' => $this->last_notification_seen,
            'is_verified_delivery_man' => (int) $is_verified_delivery_man,
            'created_at'        => $this->created_at,
            'updated_at'        => $this->updated_at,
            'deleted_at'        => $this->deleted_at,
            'user_bank_account' => $this->userBankAccount,
            'otp_verify_at'     => $this->otp_verify_at,
            'email_verified_at' => $this->email_verified_at,
            'document_verified_at' => $this->document_verified_at,
            'app_version'       => $this->app_version,
            'app_source'        => $this->app_source,
            'last_actived_at'   => $this->last_actived_at,
            'is_email_verification' => ($is_email_verification  == 0) ? true : false,
            'is_mobile_verification' => ($is_mobile_verification == 0) ? true : false,
            'is_document_verification' => ($is_document_verification == 0) ? true : false,
            'referral_code' => $this->referral_code,
            'partner_referral_code' => $this->partner_referral_code,
            'vehicle_id'  => $this->vehicle_id,
            'DeliverymanVehicleHistory' => $courier_companies_detail,
        ];
    }
}
