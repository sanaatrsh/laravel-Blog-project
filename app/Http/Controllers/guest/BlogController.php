<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Category;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\Rule;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //ORM eloquent
        $blogs = Blog::where('status', '=', 'publish')->get();
        return view('guest.pages.blogs',
            [
                'blogs' => $blogs
            ]
        );
    //     return Response::json(
    //         [
    //             'blogs' => $blogs
    //     ]
    // );
    //     return response()->json(
    //         [
    //             'blogs' => $blogs
    //     ]
    // );
        // return Response::json([
        //     'blogs' => $blogs
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // dd(1);
        $categories = Category::all();
        return view('guest.pages.add-blog', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        {
            $data = $request->validate([
                "title" => ['required', 'string'],
                "description" => ['required', 'string'],
                // "image" => ['nullable'],
                "date_to_publish" => ['required'],
                "status" => ['required', Rule::in(['publish', 'unpublish'])],
                "category_id" => ['required'],
            ]);
            // dd($data);
              // 1
              $image = $request->image;
              $imageExt = $image->extension();
              $imageName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
              $fileName = $imageName . '-'. time() . '.' . $imageExt;

              // 2
              $imagePath = 'images/blog/';
              $image->move(public_path($imagePath), $fileName);
              // 3
              $dataWithImage = array_merge(
                  $data,
                  [
                    'image'=> $imagePath . $fileName
                  ]
               );
            Blog::create($dataWithImage);
            return redirect('/blog');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {

        // $blog = Blog::where('id', '=', $id)->first();

        // $blog = Blog::findOrFail($id);

        // if (isset($blog)) {
        //     return view(
        //         'guest.pages.show-blog',
        //         ['blog' => $blog]
        //     );
        // } else {
        //     abort(404);
        // }

        return view(

            'guest.pages.show-blog',
            ['blog' => $blog]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $categories = Category::all();
        return view('guest.pages.update-blog', [
            'blog' => $blog,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        // dd($request -> all());
        $data = $request->validate([
            "title" => ['required', 'string'],
            "description" => ['required', 'string'],
            "image" => ['nullable', 'image'],
            "date_to_publish" => ['required'],
            "status" => ['required', Rule::in(['publish', 'unpublish'])],
            "category_id" => ['required'],
        ]);
        // dd($data);
        $image = $request->image;
        $imageExt = $image->extension();
        $imageName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
        $fileName = $imageName . '-'. time() . '.' . $imageExt;


        // 2
        $imagePath = 'images/blog/';
        $image->move(public_path($imagePath), $fileName);
        // 3
        $dataWithImage = array_merge(
            $data,
            [
              'image'=> $imagePath . $fileName
            ]
         );
    $blog->update($dataWithImage);
        return redirect('/blog/' . $blog['id']);
        // return redirect()->back();
        // return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete($blog);
        return redirect('/blog');
    }
}
