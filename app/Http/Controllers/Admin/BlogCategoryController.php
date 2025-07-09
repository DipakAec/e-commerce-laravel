<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\BlogCategory;
use Illuminate\Support\Str;


use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    public function index()
    {
        $blog_categories = BlogCategory::orderBy('created_at', 'asc')->paginate(10); // 10 items per page

        return view('admin.blog_category.index', compact('blog_categories'));
    }


    public function create()
    {
        return view('admin.blog_category.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:blog_categories,slug',
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);

        $validated['slug'] = $validated['slug'] ?? Str::slug($validated['name']);

        BlogCategory::create($validated);

        return redirect()->route('blog-categories.index')->with('success', 'Blog category created successfully.');
    }

    public function toggleStatus(Request $request)
    {
        $blog_categories = BlogCategory::find($request->id);

        if (!$blog_categories) {
            return response()->json(['status' => false, 'message' => 'Team member not found.']);
        }

        $blog_categories->status = $blog_categories->status === 'active' ? 'inactive' : 'active';
        $blog_categories->save();

        return response()->json([
            'status' => true,
            'new_status' => $blog_categories->status,
            'message' => 'Status updated to ' . ucfirst($blog_categories->status)
        ]);
    }

    public function edit($id)
    {
        $category = BlogCategory::findOrFail($id);
        return view('admin.blog_category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = BlogCategory::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:blog_categories,slug,' . $category->id,
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);

        $validated['slug'] = $validated['slug'] ?? $category->slug;

        $category->update($validated);

        return redirect()->route('blog-categories.index')->with('success', 'Blog category updated successfully.');
    }

    public function destroy($id)
    {
        $blog_cat = BlogCategory::findOrFail($id);


        // Delete team member from database
        $blog_cat->delete();

        return redirect()->route('blog-categories.index')->with('success', 'Team member deleted successfully!');
    }
}
