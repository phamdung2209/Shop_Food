<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Carbon\Carbon;
use App\Models\Transaction;
use App\Models\Order;
use App\Models\Payment;
use App\Mail\TransactionSuccess;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Models\DiscountCode;


class ShoppingCartController extends Controller
{
    public function index()
    {
        $shopping = \Cart::content();
        $viewData = [
            'title_page' => 'Danh sách giỏ hàng',
            'shopping'   => $shopping
        ];
        \Cart::setGlobalDiscount(0);
        return view('frontend.pages.shopping.index', $viewData);
    }

    /**
     * Thêm giỏ hàng
     * */
    public function add(Request $request, $id)
    {
        $product = Product::find($id);

        //1. Kiểm tra tồn tại sản phẩm
        if (!$product) return redirect()->to('/');

        // 2. Kiểm tra số lượng sản phẩm
        if ($product->pro_number < 1) {
            //4. Thông báo
            \Session::flash('toastr', [
                'type'    => 'error',
                'message' => 'Số lượng sản phẩm không đủ'
            ]);

            return redirect()->back();
        }

        // 3. Thêm sản phẩm vào giỏ hàng
        \Cart::add([
            'id'      => $product->id,
            'name'    => $product->pro_name,
            'qty'     => 1,
            'price'   => number_price($product->pro_price, $product->pro_sale),
            'weight'  => '1',
            'options' => [
                'sale'      => $product->pro_sale,
                'price_old' => $product->pro_price,
                'image'     => $product->pro_avatar,
                'size'      => $request->size,
                'color'      => $request->color,
                'gender'      => $request->gender,
            ]
        ]);

        //4. Thông báo
        \Session::flash('toastr', [
            'type'    => 'success',
            'message' => 'Thêm giỏ hàng thành công'
        ]);

        return response([
            'size' => $request->size
        ]);
    }

    public function postPay(Request $request)
    {
        $data = $request->except("_token", 'payment');
        if (!\Auth::user()->id) {
            //4. Thông báo
            \Session::flash('toastr', [
                'type'    => 'error',
                'message' => 'Đăng nhập để thực hiện tính năng này'
            ]);

            return redirect()->back();
        }

        $discountCode = $request->discount;
        $data = $request->except("_token", 'discount');
        $data['tst_user_id'] = \Auth::user()->id;$data['tst_user_id'] = \Auth::user()->id;
        $data['tst_total_money'] = str_replace(',', '', \Cart::subtotal(0));
        $data['created_at']      = Carbon::now();

        if ($request->payment == 2) {
            $totalMoney = str_replace(',', '', \Cart::subtotal(0));
            session(['info_custormer' => $data]);
            return view('frontend/pages/vnpay/index', compact('totalMoney'));
        } else {
            $data['tst_code']      = randString(15);
            $transactionID           = Transaction::insertGetId($data);
            if ($transactionID) {
                $shopping = \Cart::content();
                // Mail::to($request->tst_email)->send(new TransactionSuccess($shopping));

                if ($discountCode) {
                    $discount = DiscountCode::where('d_code', $request->discount)->first();
                    if ($discount->d_number_code == 0) {
                        \Session::flash('toastr', [
                            'type'    => 'error',
                            'message' => 'Mã giảm giá không còn hiệu lực hoặc đã hết'
                        ]);

                        return redirect()->back();
                    }
                    if ($discount) {
                        $discountCode = DiscountCode::find($discount->id);
                        $discountCode->d_number_code = $discount->d_number_code - 1;
                        $discountCode->save();
                    }
                }

                foreach ($shopping as $key => $item) {

                    // Lưu chi tiết đơn hàng
                    Order::insert([
                        'od_transaction_id' => $transactionID,
                        'od_product_id'     => $item->id,
                        'od_sale'           => $item->options->sale,
                        'od_qty'            => $item->qty,
                        'od_price'          => $item->price
                        // 'od_size'          => $item->options->size,
                        // 'od_color'          => $item->options->color,
                        // 'od_gender'          => $item->options->gender,
                    ]);

                    //Tăng pay ( số lượt mua của sản phẩm dó)
                    \DB::table('products')
                        ->where('id', $item->id)
                        ->increment("pro_pay");
                }
            }

            \Session::flash('toastr', [
                'type'    => 'success',
                'message' => 'Đơn hàng của bạn đã được lưu'
            ]);
            \Cart::destroy();
            return redirect()->to('/');
        }
    }

    public function update(Request $request, $id)
    {
        if ($request->ajax()) {

            //1.Lấy tham số
            $qty       = $request->qty ?? 1;
            $idProduct = $request->idProduct;
            $product   = Product::find($idProduct);

            //2. Kiểm tra tồn tại sản phẩm
            if (!$product) return response(['messages' => 'Không tồn tại sản sản phẩm cần update']);

            //3. Kiểm tra số lượng sản phẩm còn ko
            if ($product->pro_number < $qty) {
                return response([
                    'messages' => 'Số lượng cập nhật không đủ',
                    'error'    => true
                ]);
            }

            //4. Update
            \Cart::update($id, $qty);

            return response([
                'messages'   => 'Cập nhật thành công',
                'totalMoney' => \Cart::subtotal(0),
                'totalItem'  => number_format(number_price($product->pro_price, $product->pro_sale) * $qty, 0, ',', '.')
            ]);
        }
    }

    /**
     *  Xoá sản phẩm đơn hang
     * */
    public function delete(Request $request, $rowId)
    {
        if ($request->ajax())
        {
            \Cart::remove($rowId);
            return response([
                'totalMoney' => \Cart::subtotal(0),
                'type'       => 'success',
                'message'    => 'Xoá sản phẩm khỏi đơn hàng thành công'
            ]);
        }
    }

    public function cartDiscount(Request $request)
    {
        if ($request->ajax())
        {
            $discount = DiscountCode::where('d_code', $request->discount_code)->first();

            if ($discount->d_number_code == 0) {
                return response([
                    'totalMoney' => \Cart::subtotal(0),
                    'type'       => 'errors',
                    'message'    => 'Số lượng mã giảm giá đã hết'
                ]);
            }

            \Cart::setGlobalDiscount($discount->d_percentage);

            return response([
                'totalMoney' => \Cart::subtotal(0) ,
                'percentage' => $discount->d_percentage,
                'type'       => 'success',
                'message'    => 'Áp dụng mã giảm giá thành công'
            ]);
        }
    }

    public function checkTimeDiscount($dateThi) {
        $currentTime = Carbon::now();
        $datetime = new Carbon($dateThi);
        $checkTimeBDThi = Carbon::parse($currentTime)->diffInMinutes($datetime, false);
        return $checkTimeBDThi;
    }

    public function createPayment(Request $request)
    {
        $vnp_TxnRef = randString(15); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = $request->order_desc;
        $vnp_OrderType = $request->order_type;
        $vnp_Amount = str_replace(',', '', \Cart::subtotal(0)) * 100;
        $vnp_Locale = $request->language;
        $vnp_BankCode = $request->bank_code;
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = array(
            "vnp_Version" => "2.0.0",
            "vnp_TmnCode" => env('VNP_TMN_CODE'),
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => route('vnpay.return'),
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($inputData);

        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }
        
        $vnp_Url = env('VNP_URL') . "?" . $query;
        if (env('VNP_HASH_SECRET')) {
            $vnpSecureHash = hash('sha256', env('VNP_HASH_SECRET') . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }

        return redirect($vnp_Url);
    }

    public function vnpayReturn(Request $request) {
        if (session()->has('info_custormer') && $request->vnp_ResponseCode == '00') {
            //
            \DB::beginTransaction();
            try {
                $vnpayData = $request->all();
                $data = session()->get('info_custormer');
                $transactionID           = Transaction::insertGetId($data);

                if ($transactionID) {
                    $shopping = \Cart::content();
                    //Mail::to($request->tst_email)->send(new TransactionSuccess($shopping));

                    foreach ($shopping as $key => $item) {

                        // Lưu chi tiết đơn hàng
                        Order::insert([
                            'od_transaction_id' => $transactionID,
                            'od_product_id'     => $item->id,
                            'od_sale'           => $item->options->sale,
                            'od_qty'            => $item->qty,
                            'od_price'          => $item->price,
                            'od_size'          => $item->options->size,
                            'od_color'          => $item->options->color,
                            'od_gender'          => $item->options->gender,
                        ]);

                        //Tăng pay ( số lượt mua của sản phẩm dó)
                        \DB::table('products')
                            ->where('id', $item->id)
                            ->increment("pro_pay");
                    }

                    $dataPayment = [
                        'p_transaction_id' => $transactionID,
                        'p_transaction_code' => $vnpayData['vnp_TxnRef'],
                        'p_user_id' => $data['tst_user_id'],
                        'p_money' => $data['tst_total_money'],
                        'p_note' => $vnpayData['vnp_OrderInfo'],
                        'p_vnp_response_code' => $vnpayData['vnp_ResponseCode'],
                        'p_code_vnpay' => $vnpayData['vnp_TransactionNo'],
                        'p_code_bank' => $vnpayData['vnp_BankCode'],
                        'p_time' => date('Y-m-d H:i', strtotime($vnpayData['vnp_PayDate'])),
                    ];
                    Payment::insert($dataPayment);
                }

                \Session::flash('toastr', [
                    'type'    => 'success',
                    'message' => 'Đơn hàng của bạn đã được lưu'
                ]);
                \Cart::destroy();
                \DB::commit();
                return view('frontend/pages/vnpay/vnpay_return', compact('vnpayData'));

            } catch (\Exception $exception) {
                \Session::flash('toastr', [
                    'type'    => 'error',
                    'message' => 'Đã xảy ra lỗi không thể thanh toán đơn hàng'
                ]);
                \DB::rollBack();
                return redirect()->to('/');
            }
        } else {

            \Session::flash('toastr', [
                'type'    => 'error',
                'message' => 'Đã xảy ra lỗi không thể thanh toán đơn hàng'
            ]);
            return redirect()->to('/');
        }
    }
}
