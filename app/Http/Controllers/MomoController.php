<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use App\Models\HoaDon;
use App\Models\GiaoDich;

class MomoController extends Controller
{
    public function momoPayment(Request $request)
    {
        $idhoadon = $request->input('idhoadon');
        $tongtien = $request->input('tongtien');

        // Tạo đơn hàng trong MoMo
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
        $partnerCode = "MOMO";
        $accessKey = "F8BBA842ECF85";
        $secretKey = "K951B6PE1waDMi640xX08PD3vg6EkVlz";
        $orderInfo = "Thanh toán đơn hàng #" . $idhoadon;
        $amount = $tongtien * 1000; // Chuyển đổi từ nghìn đồng sang đồng
        $orderId = time() . "_" . $idhoadon;
        $redirectUrl = route('momo.success');
        $ipnUrl = route('momo.ipn');
        $extraData = "";

        $requestId = time() . "";
        $requestType = "captureWallet";

        // Tạo chữ ký
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $secretKey);

        $data = [
            'partnerCode' => $partnerCode,
            'partnerName' => "Vietcar Rental",
            'storeId' => "SuperCar",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature
        ];

        $result = $this->execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result, true);

        // Lưu thông tin thanh toán vào session hoặc database
        Session::put('payment_info', [
            'idhoadon' => $idhoadon,
            'payment_method' => 'momo',
            'order_id' => $orderId
        ]);

        // Chuyển hướng đến trang thanh toán MoMo
        if (isset($jsonResult['payUrl'])) {
            return redirect($jsonResult['payUrl']);
        } else {
            return redirect()->back()->with('error', 'Không thể kết nối đến MoMo. Vui lòng thử lại sau.');
        }
    }

    // Phương thức gửi HTTP request cho MoMo API
    private function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data)
        ));
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);

        $result = curl_exec($ch);

        curl_close($ch);
        return $result;
    }

    // Xử lý callback từ MoMo
    public function momoSuccess(Request $request)
    {
        // Lấy thông tin từ callback
        $orderId = $request->orderId;
        $requestId = $request->requestId;
        $amount = $request->amount;
        $orderInfo = $request->orderInfo;
        $orderType = $request->orderType;
        $transId = $request->transId;
        $resultCode = $request->resultCode;

        // Xác thực kết quả thanh toán
        if ($resultCode == 0) {
            // Lấy thông tin giao dịch từ session
            $paymentInfo = Session::get('payment_info');
            $idhoadon = $paymentInfo['idhoadon'];

            // Cập nhật trạng thái thanh toán trong database
            $hoaDon = HoaDon::find($idhoadon);
            if ($hoaDon) {
                $hoaDon->tinhtranghoadon = 1; // Đã thanh toán
                $hoaDon->save();

                // Lưu thông tin giao dịch
                $paymentDetail = new PaymentDetail();
                $paymentDetail->idhoadon = $idhoadon;
                $paymentDetail->method = 'momo';
                $paymentDetail->transaction_id = $transId;
                $paymentDetail->amount = $amount / 1000; // Chuyển về nghìn đồng
                $paymentDetail->save();

                return redirect()->route('pages.trangchu')->with('success', 'Thanh toán thành công! Cảm ơn bạn đã đặt xe.');
            }
        }

        return redirect()->route('pages.trangchu')->with('error', 'Thanh toán thất bại. Vui lòng thử lại sau.');
    }

    // Xử lý IPN (Instant Payment Notification) từ MoMo
    public function momoIPN(Request $request)
    {
        // Xử lý thông báo từ MoMo (có thể cần lưu log hoặc cập nhật trạng thái đơn hàng)
        Log::info('MoMo IPN', $request->all());

        return response()->json(['message' => 'OK'], 200);
    }
}
