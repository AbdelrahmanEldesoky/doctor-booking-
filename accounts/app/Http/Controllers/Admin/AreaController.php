<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\AreaDataTable;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Area;
use App\Models\Country;
use App\Models\Hospital;
use App\Jobs\SendPasswordEmailJob;
use Illuminate\Contracts\Support\Renderable;
use App\Models\User;
use App\Models\UserInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param AreaDataTable $dataTable
     * @return Renderable
     */
    public function index(AreaDataTable $dataTable)
    {
        $assets = ['data-table'];
        return $dataTable->render('admin.areas.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::get();
        return view('admin.areas.create', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach($request->name_en as $key=>$name)
        {
            Area::create([
                'city_id' => $request->city_id,
                'name_en' => $name,
                'name_ar' => $request->name_ar[$key],
            ]);
        }
        

        return redirect()->route('admin.areas.index')->with('message', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $area = Area::findOrFail($id);
        $cities = City::get();
        return view('admin.areas.edit', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Area::findOrFail($id)->update($request->all());

        return redirect()->route('admin.areas.index')->with('message', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Area::findOrFail($id)->delete();

        return redirect()->route('admin.areas.index')->with('message', 'Deleted Successfully');
    }

}
