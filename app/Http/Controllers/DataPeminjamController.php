<?php

namespace App\Http\Controllers;

use App\Models\DataPeminjam;
use Dflydev\DotAccessData\Data;
use App\Models\Telepon;
use Illuminate\Http\Request;
use App\Models\JenisKelamin;

use Illuminate\Support\Facades\Session;

use App\Models\User;

use Storage;

class DataPeminjamController extends Controller
{
    //
    public function index()
    {
        $data_peminjam = DataPeminjam::orderBy('id', 'asc')->paginate(5);
        $jumlah_peminjam = DataPeminjam::count();
        $no = 0;
        return view('data_peminjam.index', compact('data_peminjam', 'jumlah_peminjam'));
    }

    public function create()
    {
        $list_jenis_kelamin = JenisKelamin::pluck('nama_jenis_kelamin', 'id_jenis_kelamin');
        return view('data_peminjam.create', compact('list_jenis_kelamin'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'kode_peminjam' => 'required|string',
            'nama_peminjam' => 'required|string|max:30',
            'jenis_kelamin' => 'nullable|in:laki-laki,perempuan',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'pekerjaan' => 'required|string'
        ]);

        $this->validate($request, [
            'foto' => 'required|image|mimes:jpeg,jpg,png',
        ]);
        $foto_peminjam = $request->foto;
        $nama_file = time() . '.' . $foto_peminjam->getClientoriginalExtension();
        $foto_peminjam->move('foto_peminjam/', $nama_file);

        $data_peminjam = new DataPeminjam;
        $data_peminjam->kode_peminjam = $request->kode_peminjam;
        $data_peminjam->nama_peminjam = $request->nama_peminjam;
        $data_peminjam->id_jenis_kelamin = $request->id_jenis_kelamin;
        $data_peminjam->tanggal_lahir = $request->tanggal_lahir;
        $data_peminjam->alamat = $request->alamat;
        $data_peminjam->pekerjaan = $request->pekerjaan;
        $data_peminjam->foto = $nama_file;
        $data_peminjam->user_id = $request->user_id;
        $data_peminjam->save();

        $telepon = new Telepon();
        $telepon->nomor_telepon = $request->telepon;
        $data_peminjam->telepon()->save($telepon);

        Session::flash('flash_message', 'Data peminjam berhasil disimpan');

        return redirect('data_peminjam');
    }

    public function edit($id)
    {
        $peminjam = DataPeminjam::find($id);
        if (!empty($peminjam->telepon->nomor_telepon)) {
            $peminjam->nomor_telepon = $peminjam->telepon->nomor_telepon;
        }
        $list_jenis_kelamin = JenisKelamin::pluck('nama_jenis_kelamin', 'id_jenis_kelamin');
        return view('data_peminjam.edit', compact('peminjam', 'list_jenis_kelamin'));
    }

    public function update(Request $request, $id)
    {
        $data_peminjam = DataPeminjam::find($id);
        if ($request->has('foto')) {
            $foto_peminjam = $request->foto;
            $nama_file = time() . '.' . $foto_peminjam->getClientOriginalExtension();
            $foto_peminjam->move('foto_peminjam/', $nama_file);
            $data_peminjam->kode_peminjam = $request->kode_peminjam;
            $data_peminjam->nama_peminjam = $request->nama_peminjam;
            $data_peminjam->id_jenis_kelamin = $request->id_jenis_kelamin;
            $data_peminjam->tanggal_lahir = $request->tanggal_lahir;
            $data_peminjam->alamat = $request->alamat;
            $data_peminjam->pekerjaan = $request->pekerjaan;
            $data_peminjam->foto = $nama_file;
            $data_peminjam->update();
            $cari_user_id = DataPeminjam::where('id', $id)->pluck('user_id');
            $user = User::where('id', $cari_user_id);
            $user->update([
                'name' => $request->nama_peminjam,
            ]);
        } else {
            $data_peminjam->kode_peminjam = $request->kode_peminjam;
            $data_peminjam->nama_peminjam = $request->nama_peminjam;
            $data_peminjam->id_jenis_kelamin = $request->id_jenis_kelamin;
            $data_peminjam->tanggal_lahir = $request->tanggal_lahir;
            $data_peminjam->alamat = $request->alamat;
            $data_peminjam->pekerjaan = $request->pekerjaan;
            $data_peminjam->update();
            $cari_user_id = DataPeminjam::where('id', $id)->pluck('user_id');
            $user = User::where('id', $cari_user_id);
            $user->update([
                'name' => $request->nama_peminjam,
            ]);
        }

        if ($data_peminjam->telepon) {
            if ($request->filled('nomor_telepon')) {
                $telepon = $data_peminjam->telepon;
                $telepon->nomor_telepon = $request->input('nomor_telepon');
                $data_peminjam->telepon()->save($telepon);
            } else {
                $data_peminjam->telepon()->delete();
            }
        } else {
            if ($request->filled('nomor_telepon')) {
                $telepon = new Telepon();
                $telepon->nomor_telepon = $request->nomor_telepon;
                $data_peminjam->telepon()->save($telepon);
            }
        }

        Session::flash('flash_message', 'Data Peminjam Berhasil diupdate');

        return  redirect('data_peminjam');
    }

    public function destroy($id)
    {
        $cari_user_id = DataPeminjam::where('id', $id)->pluck('user_id');
        $user_id = User::where('id', $cari_user_id);
        $user_id->delete();
        $data_peminjam = DataPeminjam::find($id);
        $data_peminjam->delete();
        Session::flash('flash_message', 'Data peminjam berhasil dihapus');
        Session::flash('penting', true);
        return redirect('data_peminjam');
    }

    public function search(Request  $request)
    {
        $batas = 5;
        $cari = $request->kata;
        $data_peminjam = Datapeminjam::where('nama_peminjam', 'like', '%' . $cari . '%')->paginate($batas);
        $no = $batas * ($data_peminjam->currentPage() - 1);
        return view('data_peminjam.search', compact('data_peminjam', 'no', 'cari'));
    }

    public function CobaCollection()
    {
        $daftar = [
            'Budi Santoso',
            'Santika Nugraha',
            'JOJO',
            'Susanti'
        ];
        $collection = collect($daftar)->map(function ($nama) {
            return ucwords($nama);
        });
        return $collection;
    }

    public function collection_first()
    {
        $collection = DataPeminjam::all()->first();
        return $collection;
    }

    public function collection_last()
    {
        $collection = DataPeminjam::all()->last();
        return $collection;
    }

    public function collection_count()
    {
        $collection = DataPeminjam::all()->count();
        return "Jumlah Peminjam : " . $collection;
    }

    public function collection_take()
    {
        $collection = DataPeminjam::all()->take(3);
        return $collection;
    }

    public function collection_pluck()
    {
        $collection = DataPeminjam::all()->pluck('nama_peminjam');
        return $collection;
    }

    public function collection_where()
    {
        $collection = DataPeminjam::all()->where('kode_peminjam', 'P004');
        return $collection;
    }

    public function collection_whereIN()
    {
        $collection = DataPeminjam::all()->whereIN('kode_peminjam', ['P004', 'P002']);
        return $collection;
    }

    public function collection_toarray()
    {
        $collection = DataPeminjam::select('kode_peminjam', 'nama_peminjam')->take(3)->get();
        $koleksi = $collection->toArray();
        foreach ($koleksi as $peminjam) {
            echo $peminjam['kode_peminjam'] . ' - ' . $peminjam['nama_peminjam'] . '<br>';
        }
    }

    public function collection_toJson()
    {
        $data = [
            ['kode_peminjam' => 'P001', 'nama_peminjam' => "Karina"],
            ['kode_peminjam' => 'P002', 'nama_peminjam' => "Nadira"],
            ['kode_peminjam' => 'P003', 'nama_peminjam' => "JOJO"],
            ['kode_peminjam' => 'P004', 'nama_peminjam' => "Lesti"],
        ];
        $collection = collect($data)->toJson();
        return $collection;
    }
}
