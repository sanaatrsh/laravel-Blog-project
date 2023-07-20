  <x-guest-layout>

      <x-slot name='title'>
          {{$blog['title']}}
      </x-slot>

      <div class='portfolio-modal' tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">

                  <div class="d-flex justify-content-end">
                      <!-- Update Button -->
                      <a href="{{ route('blog.edit', $blog['id']) }}" class="btn btn-primary m-2">
                          Update
                      </a>
                      <!-- Delete Button -->
                      <form action="{{ route('blog.delete', $blog['id']) }}" method="post">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger m-2 me-5">Delete</button>
                      </form>
                  </div>

                  <div class="container">
                      <div class="row justify-content-center">
                          <div class="col-lg-8">
                              <div class="modal-body">
                                  <!-- Project details-->
                                  <h2 class="text-uppercase">{{ $blog['id'] . '-' . $blog['title'] }}</h2>
                                  <h3 class="text-uppercase">{{ $blog['category_id']}}</h3>
                                  {{-- <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p> --}}
                                  <img class="img-fluid d-block mx-auto" src='../{{ $blog['image'] }}'' alt="..." />
                                  <p>{{ $blog['description'] }}</p>
                                  {{-- <ul class="list-inline">
                                      <li>
                                          <strong>Client:</strong>
                                          Threads
                                      </li>
                                      <li>
                                          <strong>Category:</strong>
                                          Illustration
                                      </li>
                                  </ul>
                                  <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal"
                                      type="button">
                                      <i class="fas fa-xmark me-1"></i>
                                      Close Project
                                  </button> --}}
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

  </x-guest-layout>
