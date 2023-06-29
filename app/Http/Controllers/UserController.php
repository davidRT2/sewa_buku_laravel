<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Hash;

use App\Models\JenisKelamin;

use App\Models\DataPeminjam;

class UserController extends Controller
{
    //
    protected function index() {
        $batas = 5;
        $jumlah_user = User::count();
        $user_list = User::orderBy('id', 'asc')->simplePaginate($batas);
        $no = 0;
        return view('user.index', compact('user_list', 'no', 'jumlah_user'));
    }

    protected function create(){
        return view('user/create');
    }

    public function store(Request $request) {
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->level = $request->level;
        $user->save();

        if($user->level == 'peminjam'){
            $user_id = User::max('id');
            $name = $request->name;
            $list_jenis_kelamin = JenisKelamin::pluck('nama_jenis_kelamin', 'id_jenis_kelamin');
            return view('data_peminjam/create', compact('name', 'user_id', 'list_jenis_kelamin'));
        }else{
            return redirect('user');
        }
    }

    public function edit($id) {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id){
        $user = User::find($id);
        $pass_lama = $user->password;
        $user->name = $request->name;
        $user->email = $request->email;
        $pass_baru = $request->password;
        if($pass_lama != $pass_baru){$user->password = Hash::make($request->password);}
        $user->level = $request->level;
        $user->update();

        $data_peminjam = DataPeminjam::where('user_id', $id);
        $data_peminjam->update([
            'nama_peminjam' => $request->name,
        ]);
        return redirect('user');
    }

    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        $data_peminjam = DataPeminjam::where('user_id', $id);
        $data_peminjam->delete();

        return redirect('user');
    }
}
