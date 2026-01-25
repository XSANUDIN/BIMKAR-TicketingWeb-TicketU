<x-layouts.app>

    {{-- HERO CAROUSEL --}}
    <section class="relative">
        <div id="heroCarousel" class="carousel w-full h-[500px] overflow-hidden">

            {{-- Slide 1 --}}
            <div class="carousel-item relative w-full">
                <img
                    src="https://awsimages.detik.net.id/community/media/visual/2023/08/25/the-sounds-project.jpeg?w=700&q=90"
                    class="w-full h-full object-cover object-center"
                    loading="lazy"
                />

                {{-- Overlay --}}
                <div class="absolute inset-0 bg-gradient-to-r from-black/70 to-black/20 flex items-center">
                    <div class="max-w-7xl mx-auto px-6 text-white">
                        <h1 class="text-5xl md:text-6xl font-extrabold mb-4 leading-tight">
                            Explore Amazing Events
                        </h1>
                        <p class="max-w-xl mb-6 text-lg opacity-90">
                            Konser, seminar, dan Kuliner dalam satu platform.
                        </p>
                        <a href="#event-section" class="btn btn-primary btn-lg">
                            Jelajahi Event
                        </a>
                    </div>
                </div>
            </div>

            {{-- Slide 2 --}}
            <div class="carousel-item relative w-full">
                <img
                    src="https://cdn1-production-images-kly.akamaized.net/jBfc2VwSXbv66n36ojbBct0yz9s=/1200x675/smart/filters:quality(75):strip_icc():format(jpeg)/kly-media-production/medias/4219033/original/024185100_1667903034-WhatsApp_Image_2022-11-01_at_8.35.53_PM.jpeg"
                    class="w-full h-full object-cover"
                    loading="lazy"
                />

                <div class="absolute inset-0 bg-gradient-to-r from-black/70 to-black/20 flex items-center">
                    <div class="max-w-7xl mx-auto px-6 text-white">
                        <h1 class="text-5xl md:text-6xl font-extrabold mb-4">
                            Book Your Seat Now
                        </h1>
                        <p class="max-w-xl mb-6 text-lg opacity-90">
                            Jangan lewatkan event favoritmu.
                        </p>
                        <a href="#event-section" class="btn btn-secondary btn-lg">
                            Lihat Event
                        </a>
                    </div>
                </div>
            </div>

        </div>

        {{-- Navigation --}}
        <div class="absolute left-6 right-6 top-1/2 -translate-y-1/2 flex justify-between">
            <button onclick="prevSlide()" class="btn btn-circle glass">❮</button>
            <button onclick="nextSlide()" class="btn btn-circle glass">❯</button>
        </div>
    </section>

    {{-- EVENT SECTION --}}
    <section id="event-section" class="max-w-7xl mx-auto py-16 px-6">

        {{-- Header --}}
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 mb-10">
            <div>
                <h2 class="text-3xl font-extrabold tracking-tight">
                    Event Terbaru
                </h2>
                <p class="text-gray-500 mt-1">
                    Pilih event sesuai minatmu
                </p>
            </div>

            {{-- Category Filter --}}
            <div class="flex gap-2 overflow-x-auto pb-2">
                <a href="{{ route('home') }}">
                    <x-user.category-pill
                        label="Semua"
                        :active="!request('category')" />
                </a>

                @foreach($categories as $category)
                    <a href="{{ route('home', ['category' => $category->id]) }}">
                        <x-user.category-pill
                            :label="$category->nama"
                            :active="request('category') == $category->id" />
                    </a>
                @endforeach
            </div>
        </div>

        {{-- Event Grid --}}
        @if($events->count())
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
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
        @else
            <div class="text-center py-24 text-gray-500">
                <p class="text-xl font-semibold">Belum ada event 🚫</p>
                <p class="mt-2">Silakan cek kembali nanti</p>
            </div>
        @endif
    </section>

    {{-- CAROUSEL SCRIPT --}}
    <script>
        const carousel = document.getElementById('heroCarousel');
        let index = 0;

        function nextSlide() {
            index = (index + 1) % carousel.children.length;
            carousel.scrollTo({
                left: carousel.offsetWidth * index,
                behavior: 'smooth'
            });
        }

        function prevSlide() {
            index = (index - 1 + carousel.children.length) % carousel.children.length;
            carousel.scrollTo({
                left: carousel.offsetWidth * index,
                behavior: 'smooth'
            });
        }

        // Auto slide
        setInterval(nextSlide, 5000);
    </script>

</x-layouts.app>
