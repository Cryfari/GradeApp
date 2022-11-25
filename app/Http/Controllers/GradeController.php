<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Grade;
use Exception;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\isNull;
function gradeNilai($kehadiran, $tugas, $uts, $uas){
    $nilai_kehadiran = (($kehadiran / 15) * 0.1) * 100;
    $nilai_tugas = $tugas * 0.2;
    $nilai_uts = $uts * 0.3;
    $nilai_uas = $uas * 0.4;
    $total = round($nilai_kehadiran + $nilai_tugas + $nilai_uts + $nilai_uas, 2);
    if ($total >= 85){
        $grade = 'A';
    }else if (80 <= $total && $total <= 84.99){
        $grade = 'A-';
    }else if (75 <= $total && $total <= 79.99){
        $grade = 'B+';
    }else if (70 <= $total && $total <= 74.99){
        $grade = 'B';
    }else if (65 <= $total && $total <= 69.99){
        $grade = 'B-';
    }else if (60 <= $total && $total <= 64.99){
        $grade = 'C+';
    }else if (55 <= $total && $total <= 59.99){
        $grade = 'C';
    }else if (50 <= $total && $total <= 54.99){
        $grade = 'C-';
    }else if (40 <= $total && $total <= 49.99){
        $grade = 'D';
    }else{
        $grade = 'E';
    }
    if ($total <= 64.99){
        $ket = 'TIDAK LULUS';
    }else{
        $ket = 'LULUS';
    }
    return [$total, $grade, $ket];

}

class GradeController extends Controller
{
    public function home(){
        return view('home');
    }


    public function nilai(){
        $datas = Grade::all();
        return view('nilai')->with('datas', $datas);
    }


    public function add(){
        return view('form');
    }


    public function addprocess(Request $request){
        $result = gradeNilai($request->kehadiran, $request->tugas, $request->uts, $request->uas);

        if($request->image == ''){
            $image = 'default.jpeg';

        }else{
            $image = time().'.'.$request->image->extension();
            $request->image->move(public_path('storage').'/images', $image);

        }
        try{
            Grade::create([
                'nama' => $request->nama,
                'kehadiran' => $request->kehadiran,
                'tugas' => $request->tugas,
                'uts' => $request->uts,
                'uas' => $request->uas,
                'akhir' => $result[0],
                'grade' => $result[1],
                'ket' => $result[2],
                'image' => $image
            ]);
        }catch(Exception $e){
            return redirect('nilai')->with('messages',['danger'=>'Data Gagal Disimpan'.$e]);
        }
        return redirect('nilai')->with('messages',['success'=>'Data Berhasil Disimpan']);
    }


    public function detail($id){
        try{
            $data = Grade::findOrFail($id);
        }catch (Exception $e){
            return redirect('nilai')->with('messages',['danger'=>'Data Tidak Tersedia']);
        }
        return view('detail')->with('data', $data);
    }


    public function update($id){

        try{
            $data = Grade::findOrFail($id);
        }catch(Exception $e){
            return redirect('nilai')->with('messages',['danger'=>'Data Tidak Tersedia']);
        }
        return view('form')->with('data', $data);
    }


    public function updateprocess(Request $request, $id, $image){
        try{
            $data = Grade::findOrFail($id);
            $result = gradeNilai($request->kehadiran, $request->tugas, $request->uts, $request->uas);
            if($request->image !== $data->image){
                if(Storage::delete($data->image)) {
                    $image_dir = public_path('storage').'/images/'.$image;
                    unlink($image_dir);
                 }
                $image = time().'.'.$request->image->extension();
                $request->image->move(public_path('storage').'/images', $image);
            }
            $data->update([
                'nama' => $request->nama,
                'kehadiran' => $request->kehadiran,
                'tugas' => $request->tugas,
                'uts' => $request->uts,
                'uas' => $request->uas,
                'akhir' => $result[0],
                'grade' => $result[1],
                'ket' => $result[2],
                'image' => $image
            ]);
        }catch(Exception $e){
            return back()->with('messages',['danger'=>'Data Gagal Diupdate']);
        }

        return redirect('nilai')->with('messages',['success'=>'Data Berhasil Diupdate']);
    }


    public function delete($id){
        try{
            $data = Grade::find($id);
            $data->delete();
        }catch(Exception $e){
            return redirect('nilai')->with('messages',['danger'=>'Data Gagal Dihapus']);
        }
        return redirect('nilai')->with('messages',['success'=>'Data Berhasil Dihapus']);
    }
}


