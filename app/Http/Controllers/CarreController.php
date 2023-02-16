<?php

namespace App\Http\Controllers;

use App\Models\Carre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class CarreController extends Controller
{
    //
    public function index()
    {
        return view('userView');
    }
    public function addCarrer(Request $request)
    {
        try {
            // dd($request);

            $validation = Validator::make($request->all(), [
                'name' => 'required',
                'ph_no' => 'required',
                'email' => 'required',
                'totalExp' => 'required',
                'skillsets' => 'required',
                'curentOrg' => 'required',
                'addtinalRemark' => 'required'
            ]);

            $file = $request->file('resume');
            $tempname = $file->getClientOriginalExtension();
            $filename = time() . "." . $tempname;
            $file->move(public_path('upload'), $filename);
            Carre::create([
                'name' => $request->name,
                'ph_no' => $request->ph_no,
                'email' => $request->email,
                'totalExp' => $request->totalExp,
                'skillsets' => $request->skillsets,
                'curentOrg' => $request->curentOrg,
                'addtinalRemark' => $request->addtinalRemark,
                'resume' => $filename
            ]);

            $filePath = public_path('upload/' . $filename);
            $data = [
                'name' => $request->name, 'phone' => $request->ph_no, 'email' => $request->email,
                'totalExp' => $request->totalExp,
                'skillsets' => $request->skillsets,
                'curentOrg' => $request->curentOrg,
                'addtinalRemark' => $request->addtinalRemark
            ];
            $user['to'] = $request->email;
            Mail::send('mailTemp', $data, function ($message) use ($user, $filePath) {
                $message->to($user['to']);
                $message->subject('your Details');
                $message->attach($filePath);
            });
            return response()->json(['success' => true, 'msg' => ' Add Successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }
}
