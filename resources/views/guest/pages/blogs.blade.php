<x-guest-layout>
    <x-slot name='title'>
        Sanad Blogs
    </x-slot>

    <x-slot name='masterHeader'>
        <x-master-header header-text="Hello To Our Blogs" />
    </x-slot>



    <!-- Blogs Grid-->
    <section class="page-section bg-light" id="portfolio">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Blogs</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                <a href="{{ route('blog.create') }}" class="btn btn-primary m-4">add blog</a>
            </div>
            <div class="row">
                @foreach ($blogs as $blog)
                    <div class="col-lg-4 col-sm-6 mb-4">

                        <!-- Portfolio item 1-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" href={{ '/blog/' . $blog['id'] }}>
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src={{ $blog['image'] }} alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">{{ $blog['id'] . '-' . $blog['title'] }}
                                </div>
                                <div class="portfolio-caption-subheading text-muted">{{ $blog['description'] }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>

    {{-- @stop --}}
</x-guest-layout>
