<x-guest-layout>

    <x-slot name='title'>
        Add Blog
    </x-slot>



    <div class="page-section container mt-5">
        {{-- <form action="{{ route('blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data"> --}}
        <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="form-group m-4">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control">
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group m-4">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control"></textarea>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group m-4">
                <label for="image" hidden>Image</label>
                <input type="file" name="image" id="image" class="form-control-file" >
            </div>

            <div class="form-group m-4">
                <label for="date_to_publish">Date to Publish</label>
                <input type="date" name="date_to_publish" id="date_to_publish" class="form-control">
                @error('date_to_publish')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group m-4">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">

                  <option value="unpublish">unpublish</option>
                  {{-- <option value="unpublish">unpublish</option> --}}
                    <option value="publish">published</option>
                </select>
                @error('status')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group m-4">
                <label for="category_id">Category</label>
                <select name="category_id" id="category_id" class="form-control">
                    <option selected value="">select the category</option>
                    @foreach ($categories as $category)
                        <option value={{ $category['id'] }}>{{ $category['name'] }}
                        </option>
                    @endforeach
                    {{-- <option>international</option> --}}
                </select>
            </div>

            <button class="btn btn-primary m-4">Add</button>
        </form>
    </div>



</x-guest-layout>
