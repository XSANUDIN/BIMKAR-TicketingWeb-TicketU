<x-layouts.app>

    <section class="relative">
        <div id="heroCarousel" class="carousel w-full h-[500px] md:h-[600px] overflow-hidden text-white">

            {{-- SLIDE 1 — Energetic (Orange / Pink) --}}
            <div class="carousel-item relative w-full flex items-center
                        bg-gradient-to-br from-orange-500 via-pink-500 to-rose-600">
                <div class="max-w-7xl mx-auto px-6">
                    <span class="uppercase tracking-widest text-sm opacity-80">
                        Trending Event
                    </span>
                    <h1 class="text-5xl md:text-6xl font-extrabold mb-4 leading-tight">
                        Explore Amazing Events
                    </h1>
                    <p class="max-w-xl mb-6 text-lg opacity-90">
                        Konser, seminar, workshop, dan pengalaman terbaik.
                    </p>
                    <a href="#event-section" class="btn btn-neutral btn-lg">
                        Jelajahi Event
                    </a>
                </div>

                {{--
                <img
                    src="https://spotme.com/wp-content/uploads/2020/07/Hero-1.jpg"
                    class="absolute inset-0 w-full h-full object-cover object-center -z-10"
                    loading="lazy"
                />
                --}}
            </div>

            {{-- SLIDE 2 — Calm & Premium (Blue / Indigo) --}}
            <div class="carousel-item relative w-full flex items-center
                        bg-gradient-to-br from-indigo-600 via-blue-600 to-cyan-500">
                <div class="max-w-7xl mx-auto px-6">
                    <span class="uppercase tracking-widest text-sm opacity-80">
                        Limited Seat
                    </span>
                    <h1 class="text-5xl md:text-6xl font-extrabold mb-4">
                        Book Your Seat Now
                    </h1>
                    <p class="max-w-xl mb-6 text-lg opacity-90">
                        Jangan lewatkan event favoritmu.
                    </p>
                    <a href="#event-section" class="btn btn-neutral btn-lg text-white border-white">
                        Lihat Event
                    </a>
                </div>

                {{--
                <img
                    src="https://img.daisyui.com/images/stock/photo-1609621838510-5ad474b7d25d.webp"
                    class="absolute inset-0 w-full h-full object-cover object-center -z-10"
                    loading="lazy"
                />
                --}}
            </div>

            {{-- SLIDE 3 — Fresh & Modern (Green / Teal) --}}
            <div class="carousel-item relative w-full flex items-center
                        bg-gradient-to-br from-emerald-500 via-teal-500 to-sky-500">
                <div class="max-w-7xl mx-auto px-6">
                    <span class="uppercase tracking-widest text-sm opacity-80">
                        Pengalaman Baru
                    </span>
                    <h1 class="text-5xl md:text-6xl font-extrabold mb-4">
                        Buat pengalaman tak terlupakan untuk
                    </h1>
                    <p class="max-w-xl mb-6 text-lg opacity-90">
                        Event terbaik untuk setiap momen hidupmu.
                    </p>
                    <a href="#event-section" class="btn btn-accent btn-lg">
                        Mulai Sekarang
                    </a>
                </div>

                {{--
                <img
                    src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30"
                    class="absolute inset-0 w-full h-full object-cover object-center -z-10"
                    loading="lazy"
                />
                --}}
            </div>

        </div>

        {{-- NAVIGATION --}}
        <div class="absolute left-6 right-6 top-1/2 -translate-y-1/2 flex justify-between pointer-events-none">
            <button onclick="prevSlide()" class="btn btn-circle glass pointer-events-auto">❮</button>
            <button onclick="nextSlide()" class="btn btn-circle glass pointer-events-auto">❯</button>
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
