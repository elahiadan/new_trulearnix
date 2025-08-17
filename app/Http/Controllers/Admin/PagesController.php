<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PagesController extends Controller
{
    public function index()
    {
        $pages = Page::latest()->get();
        return view('admin.cms.cms', compact('pages'));
    }

    public function create(Request $request)
    {
        $data = Page::where('id', $request->id)->first();
        $keyword = unserialize($data->keyword);
        return response()->json([
            'success' => true,
            'data' => $data,
            'keyword' => $keyword,
        ]);
    }

    public function store(Request $request)
    {
        $id = $request->id;
        $page = Page::where("id", $id)->first();

        $data = $request->input();
        $page->title = $data['title'];
        $page->description = $data['description'];
        $page->slug = $data['slug'];
        $page->keyword = serialize($data['keyword']);
        $page->status = $data['status'];
        $page->save();

        return redirect(route('cms'));
    }

    public function show(Request $request)
    {
        $data = Page::where('id', $request->id)->first();
        $keyword = unserialize($data->keyword);
        return response()->json([
            'success' => true,
            'data' => $data,
            'keyword' => $keyword,
        ]);
    }

    public function edit($id)
    {
        $pages = Page::where("id", $id)->first();

        if ($pages == null || $pages->id == null) {
            abort(404);
        }
        return view('admin.cms.cms-content-edit', compact('pages'));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $page = Page::where("id", $id)->first();

        $data = $request->input();
        $page->page = $data['cmsContent'];
        $page->save();

        return redirect(route('cms'));
    }
}
