<?php

namespace App\Http\Controllers;

use App\Models\DongXe;
use App\Models\HangXe;
use Illuminate\Http\Request;
use App\Models\Xe;
use App\Models\GiaoDich;
use App\Models\HoaDon;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    public function getHome()
    {
        $xes = Xe::with('dongXe', 'hangXe')->orderBy('gia', 'desc')->take(8)->get();
        // return view('pages.trangchu', ['xes' => $xes]);
        return view('pages.trangchu', compact('xes'));
    }

    public function getDangNhap()
    {
        return view('pages.dangnhap');
    }

    public function getDangKy()
    {
        $today = \Carbon\Carbon::now()->format('Y-m-d');
        return view('pages.dangky', compact('today'));
    }

    public function getAbout()
    {
        return view('pages.about');
    }

    public function getContact()
    {
        return view('pages.lienhe');
    }

    public function storeContract(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'content' => 'required',
        ]);

        $data = $request->all();

        // Get recipient from config or use fallback
        $recipient = config('mail.contact_recipient') ?: 'thanhtrieunguyen2004@gmail.com';

        try {
            Mail::to($recipient)->send(new ContactMail($data));
            return redirect()->back()->with('success', 'Cảm ơn bạn đã liên hệ với chúng tôi!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Không thể gửi email: ' . $e->getMessage());
        }
    }

    public function getThueXe()
    {
        $xes = Xe::with('dongXe', 'hangXe', 'hinhXe')->latest()->paginate(24);
        $dongXes = DongXe::select('iddongxe', 'tendongxe')->get();
        $hangXes = HangXe::select('idhangxe', 'tenhangxe')->get();
        return view('pages.thuexe', compact('xes', 'dongXes', 'hangXes'));
    }

    public function getBlog()
    {
        return view('pages.blogs');
    }
    public function getDulich()
    {
        return view('pages.dulich');
    }

    public function timKiem(Request $request)
    {
        $dongXes = DongXe::all();
        $hangXes = HangXe::all();
        $query = $request->q;
        if ($query) {
            $xes = Xe::with('dongxe', 'hangxe')
                ->where('tenxe', 'LIKE', '%' . $query . '%')
                ->orWhere('bienso', 'LIKE', '%' . $query . '%')
                ->latest()
                ->paginate(24);
        } else {
            $xes = Xe::with('dongxe', 'hangxe')->latest()->paginate(24);
        }

        return view('pages.timkiem', compact('xes', 'query', 'dongXes', 'hangXes'));
    }

    public function getTrangCaNhan()
    {
        $khachHang = auth()->user();
        $giaoDichs = GiaoDich::with('xe', 'user')
            ->join('users', 'giaodich.iduser', '=', 'users.iduser')
            ->where('cccd', $khachHang->cccd)
            ->orderBy('giaodich.created_at', 'DESC')
            ->get();

        return view('pages.trangcanhan', compact('khachHang', 'giaoDichs'));
    }

    public function getTrangThanhToan($id)
    {
        $giaoDich = GiaoDich::findOrFail($id);
        $hoaDon = $giaoDich->hoadon;

        return view('pages.thanhtoan', compact('hoaDon'));
    }
}
