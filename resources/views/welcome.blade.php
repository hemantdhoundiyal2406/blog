<x-main-layout>

    @section('scripts')
        @vite(['resources/js/loadPosts.js'])

        @if(!$highlighted_posts->isEmpty())
            @vite(['resources/js/highlight.js'])
        @endif
    @endsection

    <style>
        *{margin:0;padding:0;box-sizing:border-box;}
        body{font-family:"Poppins",sans-serif;background:radial-gradient(circle at 10% 10%,#dbeafe 0%,transparent 40%),radial-gradient(circle at 90% 20%,#fae8ff 0%,transparent 35%),linear-gradient(160deg,#f8fafc 0%,#eef2ff 100%);color:#0f172a;}
        a{text-decoration:none;color:inherit;}
        .article{width:100%;min-height:100vh;background:transparent;}
        .hero-banner{width:100%;height:560px;position:relative;overflow:hidden;border-radius:0 0 48px 48px;}
        .hero-banner img{width:100%;height:100%;object-fit:cover;}
        .hero-overlay{position:absolute;inset:0;background:linear-gradient(135deg,rgba(2,6,23,.75) 0%,rgba(79,70,229,.45) 100%);display:flex;align-items:center;justify-content:center;text-align:center;padding:20px;}
        .hero-content{max-width:850px;color:#fff;backdrop-filter:blur(4px);}
        .hero-content h1{font-size:72px;font-weight:700;margin-bottom:20px;line-height:1.1;}
        .hero-content p{font-size:18px;line-height:1.8;color:#e2e8f0;}
        .main-content{width:100%;max-width:1280px;margin:auto;padding:56px 20px 0;}
        .image__container{width:100%;margin-bottom:60px;}
        .highlighted_icon{display:inline-flex;align-items:center;gap:8px;background:linear-gradient(135deg,#312e81 0%,#7c3aed 100%);color:#fff;padding:12px 20px;border-radius:999px;margin-bottom:25px;font-size:15px;font-weight:600;}
        .highlighted_icon i{color:#facc15;}
        .featured-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(350px,1fr));gap:30px;}
        .post-highlighted{background:rgba(255,255,255,.65);backdrop-filter:blur(10px);border-radius:24px;overflow:hidden;border:1px solid rgba(255,255,255,.8);box-shadow:0 22px 50px -20px rgba(30,41,59,.45);transition:all .25s ease;}
        .post-highlighted:hover{transform:translateY(-6px);box-shadow:0 30px 60px -25px rgba(79,70,229,.5);}
        .post-highlighted img{width:100%;height:260px;object-fit:cover;display:block;}
        .post-highlighted .body{padding:25px;}
        .top-info{display:flex;align-items:center;gap:12px;flex-wrap:wrap;margin-bottom:18px;}
        .category{padding:7px 16px;border-radius:50px;font-size:13px;font-weight:600;}
        .reading-time{font-size:14px;color:#475569;}
        .top-info i{color:#64748b;}
        .title{font-size:28px;line-height:1.4;font-weight:700;margin-bottom:20px;color:#0f172a;}
        .short_body{font-size:15px;line-height:1.8;color:#475569;margin-top:20px;}
        .user{display:flex;align-items:center;gap:14px;}
        .user img{width:52px;height:52px;border-radius:50%;object-fit:cover;}
        .user .name{font-weight:600;color:#0f172a;}
        .user .date{font-size:14px;color:#475569;}
        .dots{display:flex;justify-content:center;gap:10px;margin-top:25px;}
        .dot{cursor:pointer;color:#6366f1;font-size:14px;}
        .posts{display:grid;grid-template-columns:repeat(auto-fit,minmax(320px,1fr));gap:30px;}
        .posts > *{background:rgba(255,255,255,.65);backdrop-filter:blur(10px);border-radius:24px;overflow:hidden;border:1px solid rgba(255,255,255,.8);box-shadow:0 20px 45px -24px rgba(30,41,59,.4);}
        .loading{width:100%;display:flex;justify-content:center;margin:40px 0;}
        .hidden{display:none;}
        .loader{width:55px;height:55px;border:4px solid #d1d5db;border-top-color:#111827;border-radius:50%;animation:spin 1s linear infinite;}
        @keyframes spin{100%{transform:rotate(360deg);}}
        @media(max-width:992px){.hero-banner{height:460px;}.hero-content h1{font-size:52px;}.title{font-size:24px;}}
        @media(max-width:768px){.hero-banner{height:380px;}.hero-content h1{font-size:38px;}.hero-content p{font-size:15px;}.main-content{padding:40px 16px 0;}.featured-grid,.posts{grid-template-columns:1fr;}.post-highlighted img{height:220px;}}
    </style>

    <div class="article">

        <!-- ================= HERO BANNER ================= -->

        <div class="hero-banner">

            <img src="{{ asset('images/picture3.jpg') }}" alt="Banner">

            <div class="hero-overlay">

                <div class="hero-content">

                    <h1>Modern Blog Experience</h1>

                    <p>
                        Discover creative articles, trending stories,
                        and insightful content designed with a clean
                        modern layout for better reading experience.
                    </p>

                </div>

            </div>

        </div>

        <!-- ================= MAIN CONTENT ================= -->

        <div class="main-content">

            <!-- ================= FEATURED POSTS ================= -->

            @if(!$highlighted_posts->isEmpty())

                <div class="image__container">

                    <div class="highlighted_icon">
                        Highlighted <i class="fa-solid fa-star"></i>
                    </div>

                    <div class="featured-grid">

                        @foreach($highlighted_posts as $highlighted_post)

                            <a href="{{ route('post.show', $highlighted_post->post->slug) }}">

                                <div class="post post-highlighted fade">

                                    <img src="{{ asset($highlighted_post->post->image_path) }}"
                                         alt="{{ $highlighted_post->post->title }}">

                                    <div class="body">

                                        <div class="top-info">

                                            @if ($highlighted_post->post->category)
                                                <div class="category"
                                                     style="background: {{ $highlighted_post->post->category->backgroundColor }}20;
                                                            color: {{ $highlighted_post->post->category->textColor }}">
                                                    {{ $highlighted_post->post->category->name }}
                                                </div>
                                            @endif

                                            @if ($highlighted_post->post->read_time)
                                                <i class="fa-solid fa-clock"></i>

                                                <p class="reading-time">
                                                    {{ $highlighted_post->post->read_time }} min read
                                                </p>
                                            @endif

                                        </div>

                                        <p class="title">
                                            {{ $highlighted_post->post->title }}
                                        </p>

                                        <div class="user">

                                            <img src="{{ asset($highlighted_post->post->user->image_path) }}"
                                                 alt="user">

                                            <p>
                                                <span class="name">
                                                    {{ $highlighted_post->post->user->firstname . ' ' . $highlighted_post->post->user->lastname }}
                                                </span>

                                                <br>

                                                <span class="date">
                                                    {{ \Carbon\Carbon::parse($highlighted_post->post->created_at)->translatedFormat('d F, Y') }}
                                                </span>
                                            </p>

                                        </div>

                                        <p class="short_body">
                                            {{ $highlighted_post->post->excerpt }}
                                        </p>

                                    </div>

                                </div>

                            </a>

                        @endforeach

                    </div>

                    <div class="dots">
                        @for($i = 0; $i < count($highlighted_posts); $i++)
                            <i class="dot fa-regular fa-circle"
                               onclick="currentSlide({{$i+1}});"></i>
                        @endfor
                    </div>

                </div>

            @endif

            <!-- ================= POSTS ================= -->

            <div class="posts">

                @foreach ($posts as $post)
                    <x-main-post-card :post="$post" />
                @endforeach

            </div>

            <!-- ================= LOADER ================= -->

            <div class="loading hidden">
                <div class="loader"></div>
            </div>

            <div class="load-posts"></div>

        </div>

    </div>

</x-main-layout>