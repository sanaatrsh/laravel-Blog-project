  <x-guest-layout>

      <x-slot name='title'>
          About
      </x-slot>



      <div class="page-section container mt-5">
          {{-- <form action="{{ route('blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data"> --}}
          <form action="{{ route('blog.update', $blog['id']) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="form-group m-4">
                  <label for="title">Title</label>
                  <input type="text" name="title" id="title" class="form-control" value="{{ $blog['title'] }}">
                  @error('title')
                      <div class="text-danger">{{ $message }}</div>
                  @enderror
              </div>

              <div class="form-group m-4">
                  <label for="description">Description</label>
                  <textarea name="description" id="description" class="form-control">{{ $blog['description'] }}</textarea>
                  @error('description')
                      <div class="text-danger">{{ $message }}</div>
                  @enderror
              </div>

              <div class="form-group m-4">
                  <label for="image">Image</label>
                  <input type="file" name="image" id="image" class="form-control-file"
                    value={{$blog['image']}} >
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

                    <option @selected('unpublish' == $blog['status']) value="unpublish">unpublish</option>
                    {{-- <option value="unpublish">unpublish</option> --}}
                      <option @selected('publish' == $blog['status']) value="publish">Published</option>
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
                          <option {{ $category['id'] == $blog['category_id'] ? 'selected' : '' }}
                              value={{ $category['id'] }}>{{ $category['name'] }}
                          </option>
                      @endforeach
                      {{-- <option>international</option> --}}
                  </select>
              </div>

              <button class="btn btn-primary m-4">Update</button>
          </form>
      </div>



  </x-guest-layout>
