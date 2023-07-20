<x-guest-layout>


    <x-slot name='masterHeader'>
        <x-master-header />
    </x-slot>

    <!-- Services-->
    <section class="page-section" id="services">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Categories</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
            <div class="row text-center">
                @foreach ($categories as $category)
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">{{ $category['id'] . '-' . $category['name'] }}</h4>
                    </div>
                @endforeach

            </div>
        </div>
    </section>



    {{-- @stop --}}
</x-guest-layout>
