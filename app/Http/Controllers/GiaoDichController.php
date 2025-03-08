<?php

namespace App\Http\Controllers;

use App\Http\Requests\GiaoDichCreateRequest;
use App\Models\GiaoDich;
use App\Models\HoaDon;
use App\Models\User;
use App\Models\Xe;
use Illuminate\Http\Request;
use Exception;
use DateTime;
use Illuminate\Database\QueryException;
use Mail;
use App\Mail\DuyetGiaoDich;
use Auth;

class GiaoDichController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index()
    {
        $giaoDichs = GiaoDich::with('user', 'xe')->orderBy('tinhtranggiaodich', 'asc')->latest()->get();

        return view('admin.giaodich.index', compact('giaoDichs'));
    }

    public function create()
    {
        return view('admin.giaodich.create');
    }

    public function store(GiaoDichCreateRequest $request)
    {
        $idUser = User::select('iduser')->where('cccd', '=', $request->cccd)->first()->iduser;
        $idXe = Xe::select('idxe')->where('bienso', '=', $request->bienso)->first()->idxe;

        $giaodich = new GiaoDich([
            'iduser' => $idUser,
            'idxe' => $idXe,
            'phidv' => $request->get('phidv'),
            'tongtien' => $request->get('tongtien'),
            'ngaynhanxe' => $request->get('ngaynhanxe'),
            'ngaytraxe' => $request->get('ngaytraxe'),
        ]);

        $xe = Xe::where('idxe', $giaodich->idxe)->first();
        $xe->tinhtrang = 1;
        $xe->save();
        $giaodich->save();

        return redirect()->route('giaodich.index')->with('success', 'Giao dịch đã được thêm thành công.');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $giaoDich = GiaoDich::findOrFail($id);
        $user = $giaoDich->user;
        $xe = $giaoDich->xe;
        $xes = Xe::all();

        $ngayNhanXe = new DateTime($giaoDich->ngaynhanxe);
        $ngayTraXe = new DateTime($giaoDich->ngaytraxe);
        $songaythue = $ngayTraXe->diff($ngayNhanXe)->days;
        return view('admin.giaodich.edit', compact('giaoDich', 'user', 'xe', 'xes', 'songaythue'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            // 'tenxe' => 'required',
            // 'bienso' => 'required',
            // 'cccd' => 'required',
            // 'ngaynhanxe' => 'required|date',
            // 'ngaytraxe' => 'required|date|after:ngaynhanxe',
        ]);

        $giaoDich = GiaoDich::findOrFail($id);
        $idUser = User::select('iduser')->where('cccd', '=', $request->cccd)->first()->iduser;
        $idXe = Xe::select('idxe')->where('bienso', '=', $request->bienso)->first()->idxe;

        $oldGiaoDich = $giaoDich->replicate();

        $giaoDich->iduser = $idUser;
        $giaoDich->idxe = $idXe;
        $giaoDich->phidv = $request->get('phidv');
        $giaoDich->tongtien = $request->filled('tongtien') ? $request->get('tongtien') : $giaoDich->tongtien;
        $giaoDich->ngaynhanxe = $request->get('ngaynhanxe');
        $giaoDich->ngaytraxe = $request->get('ngaytraxe');
        $giaoDich->save();

        $hoadon = HoaDon::where('idgiaodich', $id)->first();

        if ($hoadon) {
            // Cập nhật các trường dữ liệu trong bảng hoadon nếu có thay đổi
            if ($giaoDich->iduser != $oldGiaoDich->iduser) {
                $hoadon->iduser = $giaoDich->iduser;
            }
            if ($giaoDich->idxe != $oldGiaoDich->idxe) {
                $hoadon->idxe = $giaoDich->idxe;
            }
            if ($giaoDich->phidv != $oldGiaoDich->phidv) {
                $hoadon->phidv = $giaoDich->phidv;
            }
            if ($giaoDich->tongtien != $oldGiaoDich->tongtien) {
                $hoadon->tongtien = $giaoDich->tongtien;
            }
            if ($giaoDich->ngaynhanxe != $oldGiaoDich->ngaynhanxe) {
                $hoadon->ngaynhanxe = $giaoDich->ngaynhanxe;
            }
            if ($giaoDich->ngaytraxe != $oldGiaoDich->ngaytraxe) {
                $hoadon->ngaytraxe = $giaoDich->ngaytraxe;
            }
            $hoadon->save();
        }

        return redirect()->route('giaodich.index')->with('success', 'Giao dịch đã được cập nhật thành công.');
    }

    public function destroy($id)
    {
        try {
            $giaoDich = GiaoDich::where('idgiaodich', $id)->firstOrFail();
            $xe = Xe::where('idxe', $giaoDich->idxe)->firstOrFail();

            $xe->tinhtrang = 0;
            $xe->save();

            $giaoDich->delete();
            return back()->with(['thong-bao' => 'Xóa thành công giao dịch!', 'type' => 'success']);
        } catch (QueryException $e) {
            return back()->with(['thong-bao' => 'Không thể xóa giao dịch này do giao dịch này đã được duyệt. Để xoá yêu cầu bỏ dấu tick ở trường \'Duyệt\'. Hoặc xoá hoá đơn liên quan đến giao dịch này ở \'Quản lý hoá đơn\' ', 'type' => 'danger']);
        }
    }

    public function updateTinhTrang(Request $request)
    {
        try {
            $giaoDich = GiaoDich::where('idgiaodich', $request->idgiaodich)->firstOrFail();
            $giaoDich->tinhtranggiaodich = $request->tinhtranggiaodich;
            $giaoDich->save();

            $xe = Xe::where('idxe', $giaoDich->idxe)->firstOrFail();

            if ($request->tinhtranggiaodich == 1) {
                $existsHoaDon = HoaDon::where('idgiaodich', $request->idgiaodich)->exists();
                if (!$existsHoaDon) {
                    $hoaDon = new HoaDon();
                    $hoaDon->idgiaodich = $giaoDich->idgiaodich;
                    $hoaDon->iduser = $giaoDich->iduser;
                    $hoaDon->idxe = $giaoDich->idxe;
                    $hoaDon->ngaythanhtoan = null;
                    $hoaDon->phidv = $giaoDich->phidv;
                    $hoaDon->tongtien = $giaoDich->tongtien;
                    $hoaDon->tinhtranghoadon = 0;
                    $hoaDon->ngaynhanxe = $giaoDich->ngaynhanxe;
                    $hoaDon->ngaytraxe = $giaoDich->ngaytraxe;
                    $hoaDon->save();
                }

                $xe->tinhtrang = -1;
            } else {
                $existsHoaDon = HoaDon::where('idgiaodich', $request->idgiaodich)->exists();
                if ($existsHoaDon) {
                    $hoaDon = HoaDon::where('idgiaodich', $request->idgiaodich)->firstOrFail();
                    $hoaDon->delete();
                }

                $xe->tinhtrang = -1;
            }

            $xe->save();

            if ($request->tinhtranggiaodich == 1) {
                $giaoDich = GiaoDich::findOrFail($request->idgiaodich);
                Mail::to($giaoDich->user->email)->send(new DuyetGiaoDich($giaoDich));
            }

            return response()->json([
                'status' => 'OK',
                'message' => 'Tình trạng giao dịch đã được cập nhật'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage()
            ]);
        }
    }


    public function ajaxDatXe(Request $request)
    {
        $user = Auth::user(); // Lấy thông tin người dùng đã đăng nhập
        $userId = $user->iduser;
        try {
            GiaoDich::create([
                'ngaynhanxe' => $request->ngay_nhan_xe,
                'ngaytraxe' => $request->ngay_tra_xe,
                'tinhtranggiaodich' => 0,
                'phidv' => 2000,
                'tongtien' => $request->thanh_tien,
                'iduser' => $userId,
                'idxe' => $request->id_xe,
            ]);

            Xe::where('idxe', $request->id_xe)->update(['tinhtrang' => -1]);

            return response()->json([
                'error' => false
            ]);
        } catch (Exception $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage()
            ]);
        }
    }
}
