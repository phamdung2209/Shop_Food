<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    protected $userId;

    public function __construct()
    {

    }

    public function getIdUser()
    {
        return \Auth::user()->id;
    }

    public function dashboard()
    {
        $totalTransaction = Transaction::where('tst_user_id', $this->getIdUser())
            ->select('id')
            ->count();

        $totalTransactionCancel = Transaction::where([
            'tst_user_id' => $this->getIdUser(),
            'tst_status'  => -1
        ])
            ->select('id')
            ->count();

        $totalTransactionProcess = Transaction::where([
            'tst_user_id' => $this->getIdUser(),
        ])->whereIn('tst_status' , [1,2])
            ->select('id')
            ->count();

        $totalTransactionSuccess = Transaction::where([
            'tst_user_id' => $this->getIdUser(),
            'tst_status'  => 3
        ])
            ->select('id')
            ->count();

        $viewData = [
            'totalTransaction'        => $totalTransaction,
            'totalTransactionCancel'  => $totalTransactionCancel,
            'totalTransactionProcess' => $totalTransactionProcess,
            'totalTransactionSuccess' => $totalTransactionSuccess
        ];

        return view('user.dashboard', $viewData);
    }
}
