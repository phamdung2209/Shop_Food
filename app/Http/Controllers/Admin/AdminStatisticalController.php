<?php

namespace App\Http\Controllers\Admin;

use App\HelpersClass\Date;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Product;

class AdminStatisticalController extends Controller
{
    public function index()
    {
        //Tổng hđơn hàng
        $totalTransactions = \DB::table('transactions')->select('id')->count();

        //Tổng thành viên
        $totalUsers = \DB::table('users')->select('id')->count();

        // Tông sản phẩm
        $totalProducts = \DB::table('products')->select('id')->count();


        // Tông đánh giá
        $totalRatings = \DB::table('ratings')->select('id')->count();

        // Danh sách đơn hàng mới
        $transactions = Transaction::orderByDesc('id')
                        ->limit(10)
                        ->get();

        // Top sản phẩm xem nhiều
        $topViewProducts = Product::orderByDesc('pro_view')
            ->limit(10)
            ->get();

        // Top sản phẩm mua nhiều
        $topPayProducts = Product::orderByDesc('pro_pay')
            ->limit(10)
            ->get();

        // Thống kê trạng thái đơn hàng
        // Tiep nhan
        $transactionDefault = Transaction::where('tst_status',1)->select('id')->count();
        // dang van chuyen
        $transactionProcess = Transaction::where('tst_status',2)->select('id')->count();
        // Thành công
        $transactionSuccess = Transaction::where('tst_status',3)->select('id')->count();
        //Cancel
        $transactionCancel = Transaction::where('tst_status',-1)->select('id')->count();

        $statusTransaction = [
            [
                'Hoàn tất' , $transactionSuccess, false
            ],
            [
                'Đang vận chuyển' , $transactionProcess, false
            ],
            [
                'Tiếp nhận' , $transactionDefault, false
            ],
            [
                'Huỷ bỏ' , $transactionCancel, false
            ]
        ];

        $listDay = Date::getListDayInMonth();

        //Doanh thu theo tháng ứng với trạng thái đã xử lý
        $revenueTransactionMonth = Transaction::where('tst_status',3)
            ->whereMonth('created_at',date('m'))
            ->select(\DB::raw('sum(tst_total_money) as totalMoney'), \DB::raw('DATE(created_at) day'))
            ->groupBy('day')
            ->get()->toArray();

        //Doanh thu theo tháng ứng với trạng thái tiếp nhận
        $revenueTransactionMonthDefault = Transaction::where('tst_status',1)
            ->whereMonth('created_at',date('m'))
            ->select(\DB::raw('sum(tst_total_money) as totalMoney'), \DB::raw('DATE(created_at) day'))
            ->groupBy('day')
            ->get()->toArray();

        $arrRevenueTransactionMonth = [];
        $arrRevenueTransactionMonthDefault = [];
        foreach($listDay as $day) {
            $total = 0;
            foreach ($revenueTransactionMonth as $key => $revenue) {
                if ($revenue['day'] ==  $day) {
                    $total = $revenue['totalMoney'];
                    break;
                }
            }

            $arrRevenueTransactionMonth[] = (int)$total;

            $total = 0;
            foreach ($revenueTransactionMonthDefault as $key => $revenue) {
                if ($revenue['day'] ==  $day) {
                    $total = $revenue['totalMoney'];
                    break;
                }
            }
            $arrRevenueTransactionMonthDefault[] = (int)$total;
        }



        $viewData = [
            'totalTransactions'          => $totalTransactions,
            'totalUsers'                 => $totalUsers,
            'totalProducts'              => $totalProducts,
            'totalRatings'               => $totalRatings,
            'transactions'               => $transactions,
            'topViewProducts'            => $topViewProducts,
            'topPayProducts'             => $topPayProducts,
            'statusTransaction'          => json_encode($statusTransaction),
            'listDay'                    => json_encode($listDay),
            'arrRevenueTransactionMonth' => json_encode($arrRevenueTransactionMonth),
            'arrRevenueTransactionMonthDefault' => json_encode($arrRevenueTransactionMonthDefault)
        ];

        return view('admin.statistical.index', $viewData);
    }
}
