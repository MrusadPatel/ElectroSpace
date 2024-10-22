<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CodSetting;
use Illuminate\Http\Request;

class CodSettingController extends Controller
{
    public function index()
    {
        $codSetting = CodSetting::first();
        return view('admin.payment-settings.cod-setting', compact('codSetting'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'status' => ['required', 'integer'],
        ]);

        CodSetting::updateOrCreate(
            ['id' => $id],
            [
                'status' => $request->status,
            ]
        );

        return redirect()->back();

    }
}
