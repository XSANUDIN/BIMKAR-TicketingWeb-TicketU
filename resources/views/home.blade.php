<x-layouts.app>
    <div class="carousel w-full">
        <div id="slide1" class="carousel-item relative w-full">
            <img
            src="https://spotme.com/wp-content/uploads/2020/07/Hero-1.jpg"
            class="w-full" width="100px"/>
            <div class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
            <a href="#slide4" class="btn btn-circle">❮</a>
            <a href="#slide2" class="btn btn-circle">❯</a>
            </div>
        </div>
        <div id="slide2" class="carousel-item relative w-full">
            <img
            src="https://img.daisyui.com/images/stock/photo-1609621838510-5ad474b7d25d.webp"
            class="w-full" />
            <div class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
            <a href="slide1" class="btn btn-circle">❮</a>
            <a href="#slide3" class="btn btn-circle">❯</a>
            </div>
        </div>
    </div>

    <section class="max-w-7xl mx-auto py-12 px-6">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-2xl font-black uppercase italic">Event</h2>
            <div class="flex gap-2">
                <a href="{{ route('home') }}">
                    <x-user.category-pill :label="'Semua'" :active="!request('category')" />
                </a>
                @foreach($categories as $category)
                <a href="{{ route('home', ['category' => $category->id]) }}">
                    <x-user.category-pill :label="$category->nama" :active="request('category') == $category->id" />
                </a>
                @endforeach
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($events as $event)
                <x-user.event-card 
                    :title="$event->judul" 
                    :date="$event->tanggal_waktu" 
                    :location="$event->lokasi"
                    :price="$event->tikets_min_harga" 
                    :image="$event->gambar" 
                    :href="route('events.show', $event)" />
            @endforeach
        </div>
    </section>
</x-layouts.app>