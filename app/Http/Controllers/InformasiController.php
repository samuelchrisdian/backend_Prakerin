<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Informasi;

class InformasiController extends Controller
{
    public function getAll($limit = 10, $offset = 0)  {
      try {
        $data["count"] = Informasi::count();
        $informasi = array();

        foreach (Informasi::take($limit)->skip($offset)->get() as $p) {
          $item = [
            "id"          => $p->id,
            "nama_jalan"  => $p->nama_jalan,
            "hari"        => $p->hari,
            "jam"    	    => $p->jam,
            "harga_tiket" => $p->harga_tiket,
            "cocok_untuk" => $p->cocok_untuk,
            "created_at"  => $p->created_at,
            "updated_at"  => $p->updated_at
          ];

          array_push($informasi, $item);
        }
        $data["informasi"] = $informasi;
        $data["status"] = 1;
        return response($data);

      } catch (\Exception $e) {
        return response()->json([
          'status' => '0',
          'message' =>$e->getMessage()
        ]);
      }

    }

    public function tambah(Request $request){
      $informasi = new Informasi();
      $informasi->nama_jalan  = $request->nama_jalan;
      $informasi->hari        = $request->hari;
      $informasi->jam         = $request->jam;
      $informasi->harga_tiket = $request->harga_tiket;
      $informasi->cocok_untuk = $request->cocok_untuk;
      $informasi->save();

      return response()->json([
        'Status' => '1',
        'Message' => 'Informasi Berhasil Disimpan'
      ], 201);
    }

    public function edit(Request $request){
      $informasi = informasi::where('id', $request->id)->first();
      $informasi->nama_jalan  = $request->nama_jalan;
      $informasi->hari        = $request->hari;
      $informasi->jam         = $request->jam;
      $informasi->harga_tiket = $request->harga_tiket;
      $informasi->cocok_untuk = $request->cocok_untuk;
      $informasi->save();

      return response()->json([
        'Status' => '1',
        'Message' => 'Informasi Berhasil DiEdit'
      ], 201);
    }

    public function hapus($id){
      try {
        $informasi = Informasi::where("id", $id)->delete();

        return response([
          "Status" => '1',
          "Message" => 'Informasi Berhasil DiHapus'
        ]);
      } catch (\Exception $e) {
        return response([
          "Status" => '0',
          "Message" => $e->getMessage()
        ]);
      }

    }

}
