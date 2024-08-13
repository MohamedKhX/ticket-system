<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tourly - لحجز تذاكر الطيران</title>

    <!--
      - favicon
    -->
    <link rel="shortcut icon" href="{{ asset('img/favicon.svg') }}" type="image/svg+xml">

    <!--
      - custom css link
    -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!--
      - google font link
    -->
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;600;800&display=swap" rel="stylesheet">

    <style>

        /*Styling Selectbox*/
        .dropdown {
            width: 300px;
            display: inline-block;
            background-color: #fff;
            border-radius: 2px;
            box-shadow: 0 0 2px rgb(204, 204, 204);
            transition: all .5s ease;
            position: relative;
            font-size: 14px;
            color: #474747;
            height: 100%;
            text-align: left
        }
        .dropdown .select {
            cursor: pointer;
            display: block;
            padding: 10px
        }
        .dropdown .select > i {
            font-size: 13px;
            color: #888;
            cursor: pointer;
            transition: all .3s ease-in-out;
            float: right;
            line-height: 20px
        }
        .dropdown:hover {
            box-shadow: 0 0 4px rgb(204, 204, 204)
        }
        .dropdown:active {
            background-color: #f8f8f8
        }
        .dropdown.active:hover,
        .dropdown.active {
            box-shadow: 0 0 4px rgb(204, 204, 204);
            border-radius: 2px 2px 0 0;
            background-color: #f8f8f8
        }
        .dropdown.active .select > i {
            transform: rotate(-90deg)
        }
        .dropdown .dropdown-menu {
            position: absolute;
            background-color: #fff;
            width: 100%;
            left: 0;
            margin-top: 1px;
            box-shadow: 0 1px 2px rgb(204, 204, 204);
            border-radius: 0 1px 2px 2px;
            overflow: hidden;
            display: none;
            max-height: 144px;
            overflow-y: auto;
            z-index: 9
        }
        .dropdown .dropdown-menu li {
            padding: 10px;
            transition: all .2s ease-in-out;
            cursor: pointer
        }
        .dropdown .dropdown-menu {
            padding: 0;
            list-style: none
        }
        .dropdown .dropdown-menu li:hover {
            background-color: #f2f2f2
        }
        .dropdown .dropdown-menu li:active {
            background-color: #e2e2e2
        }
    </style>
</head>

<body id="top">

<!--
  - #HEADER
-->

<header class="header" data-header>

    <div class="overlay" data-overlay></div>

    <div class="header-top">
        <div class="container">

            <a href="tel:+01123456790" class="helpline-box">

                <div class="icon-box">
                    <ion-icon name="call-outline"></ion-icon>
                </div>

                <div class="wrapper">
                    <p class="helpline-title">لمزيد من الاستفسار :</p>

                    <p class="helpline-number">+091 1234567</p>
                </div>

            </a>

            <a href="#" class="logo">
                <img src="{{ asset('img/logo.svg') }}" alt="Tourly logo">
            </a>

            <div class="header-btn-group">
                <a class="search-btn" href="{{ route('flights-table') }}">
                    <ion-icon name="search"></ion-icon>
                </a>
                <button class="nav-open-btn" aria-label="Open Menu" data-nav-open-btn>
                    <ion-icon name="menu-outline"></ion-icon>
                </button>

            </div>

        </div>
    </div>

    <div class="header-bottom">
        <div class="container">

            <ul class="social-list">

                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-facebook"></ion-icon>
                    </a>
                </li>

                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-twitter"></ion-icon>
                    </a>
                </li>

                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-youtube"></ion-icon>
                    </a>
                </li>

            </ul>

            <nav class="navbar" data-navbar>

                <div class="navbar-top">

                    <a href="#" class="logo">
                        <img src="{{ asset('img/logo-blue.svg') }}" alt="Tourly logo">
                    </a>

                    <button class="nav-close-btn" aria-label="Close Menu" data-nav-close-btn>
                        <ion-icon name="close-outline"></ion-icon>
                    </button>

                </div>

                <ul class="navbar-list">

                    <li>
                        <a href="#home" class="navbar-link" data-nav-link>الرئيسية</a>
                    </li>

                    <li>
                        <a href="#" class="navbar-link" data-nav-link>من نحن</a>
                    </li>

                    <li>
                        <a href="#destination" class="navbar-link" data-nav-link>الواجهات</a>
                    </li>

                    <li>
                        <a href="#package" class="navbar-link" data-nav-link>خطوط الطيران</a>
                    </li>

                    <li>
                        <a href="#gallery" class="navbar-link" data-nav-link>المعرض</a>
                    </li>

                    <li>
                        <a href="#contact" class="navbar-link" data-nav-link>تواصل معنا</a>
                    </li>

                </ul>

            </nav>

            <a href="{{ route('flights-table') }}" class="btn btn-primary" style="cursor: pointer">احجز الآن</a>


        </div>
    </div>

</header>





<main>
    <article>

        <!--
          - #HERO
        -->

        <section class="hero" id="home">
            <div class="container">

                <h2 class="h1 hero-title">رحلة لإستكشاف ليبيا</h2>

                <p class="hero-text">
                    اكتشف سحر ليبيا، حيث تلتقي الصحراء بالشواطئ الذهبية، والتاريخ بالحاضر. انطلق في رحلة لا تُنسى عبر مدنها العريقة، من آثار لبدة العظمى إلى أجواء طرابلس الحيوية. دعنا نأخذك في مغامرة استثنائية لاستكشاف كنوز ليبيا المخفية، وتجربة ثقافتها الغنية وطبيعتها الساحرة.
                </p>

                <div class="btn-group">
                    <a href="{{ route('flights-table') }}" class="btn btn-primary" style="cursor: pointer">اقرأ المزيد</a>

                    <a href="{{ route('flights-table') }}" class="btn btn-secondary" style="cursor: pointer">احجز الآن</a>
                </div>

            </div>
        </section>





        <!--
          - #TOUR SEARCH
        -->

        <section class="tour-search">
            <div class="container">

                <form action="{{ route('flights-table', ['tableFilters[airline][values][0]']) }}" class="tour-search-form">

                    <div class="input-wrapper">
                        <label for="destination" class="input-label">مطار المغادرة</label>

                        <select name="tableFilters[departure_airport][values][0]" id="" style="padding: 15px 20px; border-radius: 100px; width: 100%; border: transparent; background-color: white">
                            @foreach($airports as $airport)
                                <option value="{{ $airport->id }}">{{ $airport->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="input-wrapper">
                        <label for="destination" class="input-label">مطار الهبوط</label>

                        <select name="tableFilters[arrival_airport][values][0]" id="" style="padding: 15px 20px; border-radius: 100px; width: 100%; border: transparent; background-color: white">
                            @foreach($airports as $airport)
                                <option value="{{ $airport->id }}">{{ $airport->name }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="input-wrapper">
                        <label for="checkin" class="input-label">وقت المغادرة</label>

                        <input type="date" name="tableFilters[date][departure_time]" id="checkin" required class="input-field">
                    </div>

                    <div class="input-wrapper">
                        <label for="checkout" class="input-label">وقت الوصول</label>

                        <input type="date" name="tableFilters[date][arrival_time]" id="checkout" required class="input-field">
                    </div>

                    <button type="submit" class="btn btn-secondary">بحث</button>

                </form>

            </div>
        </section>





        <!--
          - #POPULAR
        -->

        <section class="popular" id="destination">
            <div class="container">


                <h2 class="h2 section-title">الوجهات المشهورة</h2>

                <p class="section-text">
                    استكشف الوجهات المشهورة في ليبيا:  تجمع بين الأصالة والتنوع
                </p>

                <ul class="popular-list">

                    <li>
                        <div class="popular-card">

                            <figure class="card-img">
                                <img src="{{ asset('img/popular-1.jpg') }}" alt="San miguel, italy" loading="lazy">
                            </figure>

                            <div class="card-content">

                                <div class="card-rating">
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                </div>

                                <p class="card-subtitle">
                                    <a href="#">ليبيا</a>
                                </p>

                                <h3 class="h3 card-title">
                                    <a href="#">طرابلس</a>
                                </h3>

                                <p class="card-text">
                                    طرابلس، العاصمة وأكبر مدينة في ليبيا، تجمع بين التاريخ العريق والحداثة.
                                </p>

                            </div>

                        </div>
                    </li>

                    <li>
                        <div class="popular-card">

                            <figure class="card-img">
                                <img src="{{ asset('img/popular-3.jpg') }}" alt="Burj khalifa, dubai" loading="lazy">
                            </figure>

                            <div class="card-content">

                                <div class="card-rating">
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                </div>

                                <p class="card-subtitle">
                                    <a href="#">ليبيا</a>
                                </p>

                                <h3 class="h3 card-title">
                                    <a href="#">بنغازي</a>
                                </h3>

                                <p class="card-text">
                                    بنغازي، ثاني أكبر مدينة في ليبيا، تتميز بتاريخها العريق وثقافتها المتنوعة.
                                </p>

                            </div>

                        </div>
                    </li>

                    <li>
                        <div class="popular-card">

                            <figure class="card-img">
                                <img src="{{ asset('img/popular-2.jpg') }}" alt="Kyoto temple, japan" loading="lazy">
                            </figure>

                            <div class="card-content">

                                <div class="card-rating">
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                </div>

                                <p class="card-subtitle">
                                    <a href="#">ليبيا</a>
                                </p>

                                <h3 class="h3 card-title">
                                    <a href="#">صبراته</a>
                                </h3>

                                <p class="card-text">
                                    جوهرة الآثار الرومانية في ليبيا: تقع صبراتة على الساحل الغربي لليبيا
                                </p>

                            </div>

                        </div>
                    </li>

                </ul>

            {{--    <button class="btn btn-primary">More destintion</button>--}}

            </div>
        </section>





        <!--
          - #PACKAGE
        -->

        <section class="package" id="package">
            <div class="container">

                <p class="section-subtitle">خطوط الطيران</p>

                <h2 class="h2 section-title">استكشف رحلاتنا عبر خطوط الطيران الليبية</h2>

                <p class="section-text">
                    استكشف رحلاتنا عبر خطوط الطيران الليبية: انطلق في مغامرة لا تُنسى مع خطوط الطيران الليبية،
                </p>

                <ul class="package-list">
                    @foreach($airlines as $airline)
                        <li>
                            <div class="package-card">

                                <figure class="card-banner">
                                    <img height="100" src="{{ $airline->logo }}" alt="Experience The Great Holiday On Beach" loading="lazy">
                                </figure>

                                <div class="card-content">

                                    <h3 class="h3 card-title">
                                        {{ $airline->name }}
                                    </h3>

                                    <p class="card-text">
                                        {{ $airline->description }}
                                    </p>



                                </div>

                                <div class="card-price">

                                    <div class="wrapper">

                                    </div>


                                    <a href="{{ route('flights-table', ['tableFilters[airline][values][0]' => $airline->id]) }}" class="btn btn-secondary" style="cursor: pointer;">استكشف رحلاتنا</a>

                                </div>

                            </div>
                        </li>
                    @endforeach
                </ul>

            </div>
        </section>





        <!--
          - #GALLERY
        -->

        <section class="gallery" id="gallery">
            <div class="container">

                <p class="section-subtitle">معرض الصور</p>

                <h2 class="h2 section-title">صور من المسافرين</h2>

                <p class="section-text">
                    استمتع بمشاهد حية وتجارب ملهمة من مسافرينا عبر معرض الصور الخاص بنا. استعرض لقطات رائعة من مغامراتهم في ليبيا، وتعرف على الأماكن التي زاروها والأوقات التي قضوها. هل لديك صور خاصة من رحلتك معنا؟ شاركها معنا وأضف لمسة شخصية إلى مجتمع المسافرين لدينا.
                </p>

                <ul class="gallery-list">

                    <li class="gallery-item">
                        <figure class="gallery-image">
                            <img src="{{ asset('img/gallery-1.jpg') }}" alt="Gallery image">
                        </figure>
                    </li>

                    <li class="gallery-item">
                        <figure class="gallery-image">
                            <img src="{{ asset('img/gallery-3.jpg') }}" alt="Gallery image">
                        </figure>
                    </li>

                    <li class="gallery-item">
                        <figure class="gallery-image">
                            <img src="{{ asset('img/gallery-2.jpg') }}" alt="Gallery image">
                        </figure>
                    </li>

                    <li class="gallery-item">
                        <figure class="gallery-image">
                            <img src="{{ asset('img/gallery-4.jpg') }}" alt="Gallery image">
                        </figure>
                    </li>

                    <li class="gallery-item">
                        <figure class="gallery-image">
                            <img src="{{ asset('img/gallery-5.jpg') }}" alt="Gallery image">
                        </figure>
                    </li>

                </ul>

            </div>
        </section>




        <!--
          - #CTA
        -->

        <section class="cta" id="contact">
            <div class="container">

                <div class="cta-content">

                    <h2 class="h2 section-title">جاهز لسفر لا ينسى!</h2>

                    <p class="section-text">
                        تقدم Tourly تجربة فريدة ومميزة لعشاق السفر والمغامرات. نسعى لجعل رحلتك إلى ليبيا سلسة وممتعة من خلال توفير أفضل عروض حجز تذاكر الطيران، الفنادق، والجولات السياحية. مع Tourly، يمكنك استكشاف أجمل المدن الليبية مثل طرابلس، بنغازي، صبراتة، وغيرها من الوجهات الساحرة.
                    </p>
                </div>

                <button class="btn btn-secondary">تواصل معنا</button>

            </div>
        </section>

    </article>
</main>





<!--
  - #FOOTER
-->

<footer class="footer">

    <div class="footer-top">
        <div class="container">

            <div class="footer-brand">

                <a href="#" class="logo">
                    <img src="{{ asset('img/logo.svg') }}" alt="Tourly logo">
                </a>

                <p class="footer-text">
                    تقدم Tourly تجربة فريدة ومميزة لعشاق السفر والمغامرات. نسعى لجعل رحلتك إلى ليبيا سلسة وممتعة من خلال توفير أفضل عروض حجز تذاكر الطيران، الفنادق، والجولات السياحية. مع Tourly، يمكنك استكشاف أجمل المدن الليبية مثل طرابلس، بنغازي، صبراتة، وغيرها من الوجهات الساحرة.
                </p>

            </div>

            <div class="footer-contact">

                <h4 class="contact-title">تواصل معنا</h4>

                <p class="contact-text">
                    لا تتردد في الاتصال بنا والوصول إلينا!!
                </p>

                <ul>

                    <li class="contact-item">
                        <ion-icon name="call-outline"></ion-icon>

                        <a href="tel:+01123456790" class="contact-link">+091 1234567</a>
                    </li>

                    <li class="contact-item">
                        <ion-icon name="mail-outline"></ion-icon>

                        <a href="mailto:info.tourly.com" class="contact-link">info.tourly.ly</a>
                    </li>

                    <li class="contact-item">
                        <ion-icon name="location-outline"></ion-icon>

                        <address>طرابلس - الدهماني</address>
                    </li>

                </ul>

            </div>

            <div class="footer-form">

                <p class="form-text">
                    اشترك في النشرة الإخبارية لدينا لمزيد من التحديثات والأخبار !!
                </p>

                <form action="" class="form-wrapper">
                    <input type="email" name="email" class="input-field" placeholder="اكتب البريد الإلكتروني" required>

                    <button type="submit" class="btn btn-secondary">اشترك</button>
                </form>

            </div>

        </div>
    </div>
</footer>





<!--
  - #GO TO TOP
-->

<a href="#top" class="go-top" data-go-top>
    <ion-icon name="chevron-up-outline"></ion-icon>
</a>





<!--
  - custom js link
-->
<script src="{{ asset('js/script.js') }}"></script>

<!--
  - ionicon link
-->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
@filamentScripts
</body>

</html>
