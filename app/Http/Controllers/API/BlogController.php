<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\BlogResource;
use App\Models\Blog;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::all();
        return response()->json(
            [
                'blogs' => BlogResource::collection($blogs),
                'message' => "this is all blogs"
        ]
    );
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            "title" => ['required', 'string'],
            "description" => ['required', 'string'],
            "image" => ['required', 'image'],
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
      $blog=  Blog::create(
        $dataWithImage
        [
            // "title" => ['required', 'string'],
            // "description" => ['required', 'string'],
            // "image" => ['required', 'image'],
            // "date_to_publish" => ['required'],
            // "status" => ['required', Rule::in(['publish', 'unpublish'])],
            // "category_id" => ['required'],
        ]
    );
      return response()->json([
        'message' =>'blog is created success',
        'blog'=>new BlogResource( $blog),
    ]);    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return response()->json(
            [
                'blog' => new BlogResource($blog),
            'message' => "this is the blog"
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
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
        // $blog->update($data);
        // return redirect('/blog/' . $blog['id']);
        return response()->json([
            'message' => "blog updated",
            'blog' => new BlogResource($blog),

        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete($blog);
        return response()->json(
            [

                'message' => "blog deleted"
        ]
    );
    }
}
