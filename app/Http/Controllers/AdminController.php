<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ecommerce;
use App\Models\Pelaku_Usaha;
use Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class AdminController extends Controller
{
    public function home(User $user)
    {
        return view('admin/dashboard/dashboard');
    }
    public function user()
    {
        $data = User::all();
        return view('admin/master/user', ['data' => $data]);
    }
    public function user_store(Request $request)
    {
        $id = User::orderByRaw('LENGTH(user_id) DESC')
            ->orderBy('user_id', 'DESC')
            ->first();
        if ($id == NULL) {
            $user_id = 1;
        } else {
            $user_id = $id->user_id + 1;
        }

        $validate = $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        if (!$validate) {
            return view('admin/master/user');
        }

        $data = $request->all();
        // dd($data);
        User::create([
            'user_id' => $user_id,
            'user_name' => $data['full_name'],
            'email' => $data['email'],
            'desa_id' => 1,
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
        ]);
        return $this->user();
    }
    public function user_edit(Request $request, $id)
    {
        $data = $request->all();
        // dd($data);
        $user_update = User::find($data['id']);

        if ($user_update) {
            User::where('user_id', $data['id'])
                ->update([
                    'user_name' => $data['full_name'],
                    'email' => $data['email'],
                    'desa_id' => 1,
                    'username' => $data['username'],
                    'password' => isset($data['password']) ? Hash::make($data['password']) : $user_update->password,
                ]);
        }
        return $this->user();
        // return view('admin/master/user', ['data_user' => $user]);
    }

    public function user_destroy(Request $request, $id)
    {
        $user = User::find($request->id);
        $user->delete();

        return $this->user();
    }

    public function ecommerce()
    {
        $ecommerce = Ecommerce::all();
        // return view('admin.content_market.content_market', compact('content_market'));
        return view('admin/content_market/content_market', ['data' => $ecommerce]);
    }

    public function ecommerce_store(Request $request)
    {
        $id = Ecommerce::orderByRaw('LENGTH(ecommerce_id) DESC')
            ->orderBy('ecommerce_id', 'DESC')
            ->first();
        if ($id == NULL) {
            $id = 1;
        } else {
            $id = $id->ecommerce_id + 1;
        }
        Ecommerce::create([
            'ecommerce_id'       => $id,
            'ecommerce_name'      => $request->ecommerce_name,
        ]);

        return redirect('/ecommerce')->with('success', 'Data Berhasil disimpan');
    }

    public function ecommerce_add()
    {
        return view('admin/content_market/add_content');
    }

    public function ecommerce_destroy(Request $request, $id)
    {
        $ecommerce = Ecommerce::find($request->id);
        $ecommerce->delete();

        return redirect('/ecommerce')->with('success', 'Data Berhasil diubah');
    }

    public function ecommerce_edit(Request $request, $id)
    {
        $data = $request->all();
        $ecommerce = Ecommerce::find($data['id']);
        if ($ecommerce) {
            Ecommerce::where('ecommerce_id', $data['id'])
                ->update([
                    "ecommerce_name" => $data['ecommerce_name'],
                ]);
        }
        return $this->ecommerce();
    }

    public function berita()
    {
        $beritas = Berita::all();
        // return view('admin.content_market.content_market', compact('content_market'));
        return view('admin/content_market/content_market', ['data' => $beritas]);
    }

    public function pelaku_usaha()
    {
        $pelaku_usaha = Pelaku_Usaha::all();
        // return view('admin.content_market.content_market', compact('content_market'));
        return view('admin/layanan_umkm/index', ['data' => $pelaku_usaha]);
    }

    public function pelaku_usaha_add(Request $request)
    {
        // dd();
        $id = Pelaku_Usaha::orderByRaw('LENGTH(usaha_id) DESC')
            ->orderBy('usaha_id', 'DESC')
            ->first();
        if ($id == NULL) {
            $id = 1;
        } else {
            $id = $id->usaha_id + 1;
        }

        $validate = $request->validate([
            'usaha_nama' => 'required',
            'usaha_alamat' => 'required',
            'usaha_telp' => 'required',
            'usaha_deskripsi' => 'required',
            'usaha_sejarah' => 'required',
            'usaha_keahlian' => 'required',
            'usaha_img' => 'required',
        ]);


        $file = $request->file('usaha_img');

        /* ganti nama file */
        $nama_file = time() . "_" . $file->getClientOriginalName();

        /* isi dengan nama folder tempat kemana file diupload */
        $tujuan_upload = 'data_file';

        /* upload file */
        $file->move($tujuan_upload, $nama_file);


        if (!$validate) {
            return redirect('/pelaku_usaha')->with('error', 'Data Gagal disimpan');
        }

        $data = $request->all();
        // dd($data);
        Pelaku_Usaha::create([
            'usaha_id' => $id,
            'usaha_nama' => $data['usaha_nama'],
            'usaha_alamat' => $data['usaha_alamat'],
            'user_id' => Auth::id(),
            'usaha_telp' => $data['usaha_telp'],
            'usaha_deskripsi' => $data['usaha_deskripsi'],
            'usaha_sejarah' => $data['usaha_sejarah'],
            'usaha_keahlian' => $data['usaha_keahlian'],
            'usaha_img' => $nama_file,
        ]);
        return redirect('/pelaku_usaha')->with('success', 'Data Berhasil disimpan');
    }

    public function pelaku_usaha_destroy(Request $request, $id)
    {
        $ecommerce = Pelaku_Usaha::find($request->id);
        $ecommerce->delete();

        return redirect('/pelaku_usaha')->with('success', 'Data Berhasil diubah');
    }

    public function pelaku_usaha_edit(Request $request, $id)
    {
        $data = $request->all();
        $pelaku_usaha = Pelaku_Usaha::find($data['id']);
        // dd($data);
        if ($pelaku_usaha) {
            if (isset($data['usaha_img'])) {
                $file = $request->file('usaha_img');

                /* ganti nama file */
                $nama_file = time() . "_" . $file->getClientOriginalName();

                /* isi dengan nama folder tempat kemana file diupload */
                $tujuan_upload = 'data_file';

                /* upload file */
                $file->move($tujuan_upload, $nama_file);
            }


            Pelaku_Usaha::where('usaha_id', $data['id'])
                ->update([
                    'usaha_nama' => $data['usaha_nama'],
                    'usaha_alamat' => $data['usaha_alamat'],
                    'user_id' => Auth::id(),
                    'usaha_telp' => $data['usaha_telp'],
                    'usaha_deskripsi' => $data['usaha_deskripsi'],
                    'usaha_sejarah' => $data['usaha_sejarah'],
                    'usaha_keahlian' => $data['usaha_keahlian'],
                    'usaha_img' => isset($data['usaha_img']) ? $nama_file : $pelaku_usaha->usaha_img,
                ]);
        }
        return $this->pelaku_usaha();
    }
}
