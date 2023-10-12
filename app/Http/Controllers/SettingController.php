<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Repositories\SettingService;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    private $settingService;

    public function __construct(SettingService $settingService)
    {
        $this->settingService = $settingService;
    }


    public function index()
    {
        $data = $this->settingService->all();
        return view('admin.setting.index', compact('data'));
    }


    public function create()
    {
        return view('admin.setting.create');
    }


    public function store(Request $request)
    {
        $this->settingService->store($request->all());
        return redirect()->route('setting.index')->with('success','Setting has success created');
    }


    public function show(Setting $setting)
    {
        return view('admin.setting.show', compact('setting'));
    }


    public function edit(Setting $setting)
    {
        return view('admin.setting.edit', compact('setting'));
    }


    public function update(Request $request, Setting $setting)
    {
        $this->settingService->update($request->all(),$setting->id);
        return back()->with('success','Setting has success updated');
    }


    public function destroy(Setting $setting)
    {
        $this->settingService->destroy($setting->id);
        return redirect()->route('setting.index')->with('success','Setting has success deleted');
    }

    public function dataTable()
    {
        return $this->settingService->dataTable();
    }
}
