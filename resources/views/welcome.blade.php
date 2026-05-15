<x-main-layout>

    @section('scripts')
        @vite(['resources/js/loadPosts.js'])

        @if(!$highlighted_posts->isEmpty())
            @vite(['resources/js/highlight.js'])
        @endif
    @endsection

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            font-family:'Poppins', sans-serif;
            background:#f5f5f5;
            color:#111827;
        }

        a{
            text-decoration:none;
            color:inherit;
        }

        .article{
            width:100%;
            min-height:100vh;
            background:#f5f5f5;
        }

        /* ================= HERO BANNER ================= */

        .hero-banner{
            width:100%;
            height:520px;
            position:relative;
            overflow:hidden;
        }

        .hero-banner img{
            width:100%;
            height:100%;
            object-fit:cover;
        }

        .hero-overlay{
            position:absolute;
            inset:0;
            background:rgba(0,0,0,0.45);
            display:flex;
            align-items:center;
            justify-content:center;
            text-align:center;
            padding:20px;
        }

        .hero-content{
            max-width:850px;
            color:#fff;
        }

        .hero-content h1{
            font-size:68px;
            font-weight:700;
            margin-bottom:20px;
            line-height:1.1;
        }

        .hero-content p{
            font-size:18px;
            line-height:1.8;
            color:#e5e7eb;
        }

        /* ================= MAIN CONTAINER ================= */

        .main-content{
            width:100%;
            
            margin:auto;
           
        }

        /* ================= FEATURED POSTS ================= */

        .image__container{
            width:100%;
            margin-bottom:60px;
        }

        .highlighted_icon{
            display:inline-flex;
            align-items:center;
            gap:8px;
            background:#111827;
            color:#fff;
            padding:12px 20px;
            border-radius:8px;
            margin-bottom:25px;
            font-size:15px;
            font-weight:600;
        }

        .highlighted_icon i{
            color:#facc15;
        }

        .featured-grid{
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(350px,1fr));
            gap:30px;
        }

        .post-highlighted{
            background:#fff;
            border-radius:18px;
            overflow:hidden;
            border:1px solid #e5e7eb;
        }

        .post-highlighted img{
            width:100%;
            height:260px;
            object-fit:cover;
            display:block;
        }

        .post-highlighted .body{
            padding:25px;
        }

        .top-info{
            display:flex;
            align-items:center;
            gap:12px;
            flex-wrap:wrap;
            margin-bottom:18px;
        }

        .category{
            padding:7px 16px;
            border-radius:50px;
            font-size:13px;
            font-weight:600;
        }

        .reading-time{
            font-size:14px;
            color:#6b7280;
        }

        .top-info i{
            color:#6b7280;
        }

        .title{
            font-size:28px;
            line-height:1.4;
            font-weight:700;
            margin-bottom:20px;
            color:#111827;
        }

        .short_body{
            font-size:15px;
            line-height:1.8;
            color:#6b7280;
            margin-top:20px;
        }

        .user{
            display:flex;
            align-items:center;
            gap:14px;
        }

        .user img{
            width:52px;
            height:52px;
            border-radius:50%;
            object-fit:cover;
        }

        .user .name{
            font-weight:600;
            color:#111827;
        }

        .user .date{
            font-size:14px;
            color:#6b7280;
        }

        /* ================= DOTS ================= */

        .dots{
            display:flex;
            justify-content:center;
            gap:10px;
            margin-top:25px;
        }

        .dot{
            cursor:pointer;
            color:#9ca3af;
            font-size:14px;
        }

        /* ================= POSTS SECTION ================= */

        .posts{
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(320px,1fr));
            gap:30px;
        }

        .posts > *{
            background:#fff;
            border-radius:18px;
            overflow:hidden;
            border:1px solid #e5e7eb;
        }

        /* ================= LOADER ================= */

        .loading{
            width:100%;
            display:flex;
            justify-content:center;
            margin:40px 0;
        }

        .hidden{
            display:none;
        }

        .loader{
            width:55px;
            height:55px;
            border:4px solid #d1d5db;
            border-top-color:#111827;
            border-radius:50%;
            animation:spin 1s linear infinite;
        }

        @keyframes spin{
            100%{
                transform:rotate(360deg);
            }
        }

        /* ================= RESPONSIVE ================= */

        @media(max-width:992px){

            .hero-banner{
                height:420px;
            }

            .hero-content h1{
                font-size:52px;
            }

            .title{
                font-size:24px;
            }
        }

        @media(max-width:768px){

            .hero-banner{
                height:360px;
            }

            .hero-content h1{
                font-size:38px;
            }

            .hero-content p{
                font-size:15px;
            }

            .main-content{
                padding:40px 20px;
            }

            .featured-grid{
                grid-template-columns:1fr;
            }

            .posts{
                grid-template-columns:1fr;
            }

            .post-highlighted img{
                height:220px;
            }
        }

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