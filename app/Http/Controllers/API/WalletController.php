<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Wallet;
use App\Models\WalletHistory;
use App\Http\Resources\WalletHistoryResource;
use Illuminate\Support\Facades\DB;

class WalletController extends Controller
{
    public function saveWallet(Request $request)
    {
        $data = $request->all();
        $user_id = request()->user_id ?? auth()->user()->id;
        $data['user_id'] = $user_id;
        $currency = appSettingData('currency_code')->currency_code;
        if( $currency == null ) {
            return json_message_response(__('message.contact_administrator'), 400);
        }
        $data['currency'] = $currency;
        $wallet =  Wallet::firstOrCreate(
            [ 'user_id' => $user_id ]
        );

        if ($data['type'] == 'credit') {
            $data['transaction_type'] = $request->transaction_type;
            $total_amount = $wallet->total_amount + $data['amount'];
        }

        if ($data['type'] == 'debit') {
            $data['transaction_type'] = 'correction';
            $total_amount = $wallet->total_amount - $data['amount'];
        }

        $wallet->currency = $data['currency'];
        $wallet->total_amount = $total_amount;
        $message = __('message.save_form',[ 'form' => __('message.wallet') ] );
        try
        {
            DB::beginTransaction();
            $wallet->save();
            $data['balance'] = $total_amount;
            $data['datetime'] = date('Y-m-d H:i:s');
            $result = WalletHistory::updateOrCreate(['id' => $request->id], $data);
            DB::commit();
        } catch(\Exception $e) {
            DB::rollBack();
            return json_custom_response($e);
        }
        return json_message_response($message);
    }

    public function getList(Request $request)
    {
        $wallet = WalletHistory::myWalletHistory();

        $wallet->when(request('user_id'), function ($q) {
            return $q->where('user_id', request('user_id'));
        });

        $per_page = config('constant.PER_PAGE_LIMIT');
        if ($request->has('per_page') && !empty($request->per_page)) {

            if (is_numeric($request->per_page)) {
                $per_page = $request->per_page;
            }

            if ($request->per_page == -1) {
                $per_page = $wallet->count();
            }
        }

        $wallet = $wallet->orderBy('id', 'desc')->paginate($per_page);
        $items = WalletHistoryResource::collection($wallet);

        $wallet_data = Wallet::where('user_id', auth()->user()->id)->first();
        $response = [
            'pagination' => json_pagination_response($items),
            'data' => $items,
            'wallet_data' => $wallet_data
        ];

        return json_custom_response($response);
    }

    public function getWallatDetail(Request $request)
    {
        $wallet_data = Wallet::where('user_id', auth()->id())->first();

        if ($wallet_data == null) {
            $message = __('message.not_found_entry', ['name' => __('message.wallet')]);
            return json_message_response($message, 400);
        }

        $response = [
            'wallet_data' => $wallet_data ?? null,
            'total_amount'  => $wallet_data->total_amount,
        ];

        return json_custom_response($response);
    }

    public function rewardhistory(Request $request){

        $user = auth()->user();
        $wallethistory = WalletHistory::where(['user_id' => $user->id]  )
        ->where('type', 'credit')
        ->where('transaction_type', 'Reference Reward');

        $per_page = config('constant.PER_PAGE_LIMIT');
        if ($request->has('per_page') && !empty($request->per_page)) {

            if (is_numeric($request->per_page)) {
                $per_page = $request->per_page;
            }

            if ($request->per_page == -1) {
                $per_page = $wallethistory->count();
            }
        }

        $wallethistory = $wallethistory->orderBy('id', 'desc')->paginate($per_page);
        $items = WalletHistoryResource::collection($wallethistory);
        $response = [
            'pagination' => json_pagination_response($items),
            'data' => $items,
        ];

        return json_custom_response($response);
    }
}
