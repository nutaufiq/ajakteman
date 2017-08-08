<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;

class RedeemController extends Controller
{
    public function index()
    {
        $count = \App\Redeem::count();
        $redeems = \App\Redeem::orderBy('id', 'desc')->paginate(10);

        return view('webcontrol.redeem.list', compact('count', 'redeems'));
    }

    public function download()
    {
        $redeems = \App\Redeem::where('status', 0)->get();

        $date_time = Carbon::now();

        \Excel::create('OLX_Ajakteman_Redeems_'.$date_time, function($excel) use($redeems) {

            $excel->sheet('Redeems', function($sheet) use($redeems) {

                $sheet->loadView('table.excel.redeems')->with('redeems', $redeems);

            });

        })->export('xls');
    }

    public function edit($id)
    {
        $redeem = \App\Redeem::find($id);

        return view('webcontrol.redeem.edit', compact('redeem'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'status'   => 'required',
        ]);

        $status = $request->input('status');

        $data = \App\Redeem::find($id);

        $data->status = $status;

        $data->save();

        return redirect('webcontrol/redeem/'.$id.'/edit')->with('message', 'Redeem Updated!');
    }
}
