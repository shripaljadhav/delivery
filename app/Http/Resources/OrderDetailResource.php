<?php

namespace App\Http\Resources;

use App\Models\City;
use App\Models\Claims;
use App\Models\ExtraCharge;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $pdfUrl = null;
         if($this->status == 'completed' ){
             $pdfUrl = route('api-order-invoice', ['id' => $this->id]);
         }
         $basetotal = $this->weight_charge  + $this->distance_charge + $this->vehicle_charge + $this->insurance_charge + $this->fixed_charges;
         $extraCharge = ExtraCharge::where('city_id',$this->city_id)->get();
         $cityData = City::find($this->city_id);
         
         if ($this->milisecond != null) {
            $claims = Claims::where('traking_no', $this->milisecond)->first();
         }
        return [
            'order_tracking_id'             => $this->milisecond,
            'id'                            => (int)$this->id,
            'client_id'                     => (int)$this->client_id,
            'client_name'                   => optional($this->client)->name,
            'date'                          => $this->date,
            // 'readable_date'                 => timeAgoFormat($this->created_at),
            'pickup_point'                  => $this->pickup_point,
            'delivery_point'                => $this->delivery_point,
            'packaging_symbols'             => json_decode($this->packaging_symbols),
            'country_id'                    => (int)$this->country_id,
            'country_name'                  => optional($this->country)->name,
            'city_id'                       =>(int) $this->city_id,
            'city_name'                     => optional($this->city)->name,
            'parcel_type'                   => $this->parcel_type,
            'total_weight'                  => $this->total_weight,
            'weight_charge'                 => $this->weight_charge,
            'distance_charge'               => $this->distance_charge,
            'vehicle_charge'                => $this->vehicle_charge,
            'total_distance'                => $this->total_distance,
            'insurance_charge'              => $this->insurance_charge,
            'pickup_datetime'               => $this->pickup_datetime,
            'delivery_datetime'             => $this->delivery_datetime,
            'parent_order_id'               => $this->parent_order_id,
            'status'                        => $this->status,
            'bid_type'                      => $this->bid_type,
            'payment_id'                    => (int)($this->payment_id ?? null),
            'payment_type'                  => optional($this->payment)->payment_type,
            'payment_status'                => optional($this->payment)->payment_status,
            'payment_collect_from'          => $this->payment_collect_from,
            'delivery_man_id'               => $this->delivery_man_id,
            'delivery_man_name'             => optional($this->delivery_man)->name,
            'check_without_wallet'          => optional($this->delivery_man)->check_without_wallet,
            'fixed_charges'                 => $this->fixed_charges,
            'extra_charges'                 => $this->extra_charges,
            'total_amount'                  => $this->total_amount,
            'total_parcel'                  => $this->total_parcel,
            'reason'                        => $this->reason,
            'pickup_confirm_by_client'      => $this->pickup_confirm_by_client,
            'pickup_confirm_by_delivery_man' => $this->pickup_confirm_by_delivery_man,
            'pickup_time_signature'     =>  getSingleMedia($this, 'pickup_time_signature', null),
            'delivery_time_signature'   =>  getSingleMedia($this, 'delivery_time_signature', null),
            'auto_assign'               => $this->auto_assign,
            'is_reschedule'             => $this->is_reschedule,
            'rescheduledatetime'        => $this->rescheduledatetime,
            'is_shipped'                => $this->is_shipped,
            'shipped_verify_at'         => $this->shipped_verify_at,
            'cancelled_delivery_man_ids'    => $this->cancelled_delivery_man_ids,
            'created_at'    => $this->created_at,
            'updated_at'    => $this->updated_at,
            'deleted_at' => $this->deleted_at,
            'return_order_id' => $this->retunOrdered->count() > 0 ? true : false,
            'vehicle_id' => $this->vehicle_id,
            'vehicle_data' => $this->vehicle_data,
            'vehicle_image' => getMediaFileExit(optional($this->vehicle), 'vehicle_image') ? getSingleMedia(optional($this->vehicle), 'vehicle_image', null) : null,
            'invoice' => $pdfUrl,
            'base_total' => $basetotal,
            'extra_charge_list' => $extraCharge,
            'city_details_list' => $cityData,
           'isClaimed' => isset($claims) ? (int)$claims->isClaimed : 0,
        ];
    }
}
