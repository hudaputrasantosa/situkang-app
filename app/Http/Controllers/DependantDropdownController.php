<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravolt\Indonesia\Models\Village;

class DependantDropdownController extends Controller
{
    public function provinces()
    {
        return \Indonesia::allProvinces();
    }

    public function cities(Request $request)
    {
        return \Indonesia::findProvince($request->id, ['cities'])->cities->pluck('name', 'id');
    }

    public function districts()
    {
        return \Indonesia::findCity('189', ['districts'])->districts;
    }

    public function villages(Request $request)
    {
        $desas = Village::where('district_code', $request->id)->get();
        foreach ($desas as $desa) {
            echo '<option value="{{ $desa->id }}">{{ $desa->name }}</option>';
        }
        // return \Indonesia::findDistrict($request->id, ['villages'])->villages;
    }
}
