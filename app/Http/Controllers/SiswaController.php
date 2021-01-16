<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Exports\SiswaExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use App\Siswa;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('cari')) {
            $data_siswa = \App\Siswa::where('nama_depan', 'LIKE', '%' . $request->cari . '%')->get();
        } else {
            $data_siswa = \App\Siswa::all();
        }
        return view('siswa.index', ['data_siswa' => $data_siswa]);
    }

    public function create(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nama_depan' => 'required|min:3',
            'nama_belakang' => 'required',
            'email' => 'required|unique:users',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'avatar' => 'required|mimes:jpg,png|image|max:1024'
        ]);
        //insert ke table user
        $user = new \App\User;
        $user->role = 'siswa';
        $user->name = $request->nama_depan;
        $user->email = $request->email;
        $user->password = bcrypt('1234');
        $user->remember_token = Str::random(60);
        $user->save();
        // insert ke table siswa
        $request->request->add(['user_id' => $user->id]);
        $siswa = \App\Siswa::create($request->all());
        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
        return redirect('/siswa')->with('sukses', 'Data berhasil diinput');
    }

    public function edit(Siswa $siswa)
    {
        return view('siswa/edit', ['siswa' => $siswa]);
    }

    public function update(Request $request, Siswa $siswa)
    {
        // dd($request->all());
        $siswa->update($request->all());
        if ($request->hasFile('avatar')) {
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
        return redirect('/siswa')->with('sukses', 'Data berhasil diupdate');
    }

    public function delete(Siswa $siswa)
    {
        $siswa->delete();
        return redirect('/siswa')->with('sukses', 'Data berhasil dihapus');
    }

    public function profile(Siswa $siswa)
    {
        $matapelajaran = \App\Mapel::all();
        // dd($mapel);
        // Menyimpan data untuk chart
        $categories = [];
        $data = [];

        foreach ($matapelajaran as $mp) {
            if($siswa->mapel()->wherePivot('mapel_id', $mp->id)->first()) {
                $categories[] = $mp->nama;
                $data[] = $siswa->mapel()->wherePivot('mapel_id', $mp->id)->first()->pivot->nilai;
            }
        }
        // dd($data);
        // dd(json_encode($categories));

        return view('siswa.profile', ['siswa' => $siswa, 'matapelajaran' => $matapelajaran, 'categories' => $categories, 'data' => $data]);
    }

    public function addnilai(Request $request, Siswa $siswa)
    {
        if ($siswa->mapel()->where('mapel_id', $request->mapel)->exists()) {
            return redirect('siswa/' . $idsiswa . '/profile')->with('error', 'Data mata pelajaran sudah ada');
        }
        $siswa->mapel()->attach($request->mapel, ['nilai' => $request->nilai]);
        return redirect('siswa/' . $idsiswa . '/profile')->with('sukses', 'Data nilai berhasil dimasukkan');
    }

    public function deletenilai($idsiswa, $idmapel)
    {
        $siswa = Siswa::find($idsiswa);
        $siswa->mapel()->detach($idmapel);
        return redirect()->back()->with('sukses', 'Data nilai berhasil dihapus');
    }

    public function exportExcel() 
    {
        return Excel::download(new SiswaExport, 'siswa.xlsx');
    }

    public function exportPdf()
    {
        // $pdf = PDF::loadHTML('<h1>Data Siswa</h1>');
        $siswa = Siswa::all();
        $pdf = PDF::loadView('export.siswapdf', ['siswa' => $siswa]);
        return $pdf->download('siswa.pdf');
    }
}
