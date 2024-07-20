<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="ThemesLay">
    <title>حجز رحلات</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="80x80" href="assets/images/favicon.png">
    <!-- Main CSS -->
    <link href="{{ asset('/css/main.css') }}" rel="stylesheet">
</head>

<body>
<!-- page content area -->
<div class="pagewrap">
    <div class="head-wrapper">
        <!-- search engine section-->
        <div class="search-engine">
            <div class="container">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-12 mb-5 text-center position-relative">
                        <h1 class="display-3 fw-bold mb-4 theme-text-white theme-text-shadow">
                            رحلة تذاكر طيران
                        </h1>
                        <p class="mb-0 theme-text-white">اكتشف الأماكن المذهلة بعروض حصرية</p>


                    </div>
                </div>
                <!-- search engine tabs -->
                <div class="row mt-0 mt-lg-5">
                    <div class="col-12 col-lg-10 offset-lg-1 mb-5 text-center position-relative">
                        <!-- product main tab list -->
                        <ul class="nav nav-tabs d-flex justify-content-center border-0 cust-tab" id="myTab"
                            role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="flight-tab" data-bs-toggle="tab"
                                        data-bs-target="#flight-tab-pane" type="button" role="tab"
                                        aria-controls="flight-tab-pane" aria-selected="true">الرحلات</button>
                            </li>
                        </ul>
                        <!-- product main tab content -->
                        <div class="tab-content mt-3" id="myTabContent">
                            <!-- flight search tab -->
                            <div class="tab-pane fade show active" id="flight-tab-pane" role="tabpanel"
                                 aria-labelledby="flight-tab" tabindex="0">
                                <!-- flight multiple search tab -->
                                <ul class="nav nav-pills cust-pills" id="pills-tab" role="tablist">
                                   {{-- <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="pills-oneway-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-oneway" type="button" role="tab"
                                                aria-controls="pills-oneway" aria-selected="true">
                                                <span
                                                    class="d-inline-block p-2 rounded-circle bg-white align-middle me-2"></span>
                                            One Way</button>
                                    </li>--}}
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-oneway" role="tabpanel"
                                         aria-labelledby="pills-oneway-tab" tabindex="0">
                                        <!-- one way search -->
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="search-pan flex-row-reverse row mx-0 theme-border-radius">
                                                    <div
                                                        class="col-12 col-lg-4 col-xl-2 ps-0 mb-2 mb-xl-0 pe-0 pe-lg-2flex-row-reverse">
                                                        <div class="form-group px-2">
                                                            <label for="exampleDataList" class="form-label">تقلع من</label>
                                                            <select class="form-select m2" aria-label="Default select example">
                                                                <option value="1">طرابلس</option>
                                                                <option value="2">بنغازي</option>
                                                                <option value="3">غدامس</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-12 col-lg-4 col-xl-2 ps-0 mb-2 mb-xl-0 pe-0 pe-lg-2">
                                                        <div class="form-group px-2">
                                                            <label for="exampleDataList2" class="form-label">الوصول إلى</label>
                                                            <select class="form-select m2" aria-label="Default select example">
                                                                <option value="1">طرابلس</option>
                                                                <option value="2">بنغازي</option>
                                                                <option value="3">غدامس</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-12 col-lg-4 col-xl-3 ps-0 mb-2 mb-xl-0 pe-0 pe-lg-0 pe-xl-2">
                                                        <div class="form-group">
                                                            <label class="form-label">تاريخ المغادرة</label>
                                                            <input type="text" class="form-control"
                                                                   placeholder="Wed 2 Mar">
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="col-12 col-lg-6 col-xl-3 ps-0 mb-2 mb-lg-0 mb-xl-0 pe-0 pe-lg-2">
                                                        <div class="form-group border-0">
                                                            <label class="form-label">Traveller's
                                                            </label>
                                                            <div class="dropdown" id="myDD1">
                                                                <button class="dropdown-toggle form-control"
                                                                        type="button" id="travellerInfoOneway11"
                                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <span class="text-truncate">2 adults - 1
                                                                            childeren - 1 Infants
                                                                        </span>
                                                                </button>
                                                                <div class="dropdown-menu"
                                                                     aria-labelledby="travellerInfoOneway11">
                                                                    <ul class="drop-rest">
                                                                        <li>
                                                                            <div class="d-flex small">Adults
                                                                            </div>
                                                                            <div
                                                                                class="ms-auto input-group plus-minus-input">
                                                                                <div class="input-group-button">
                                                                                    <button type="button"
                                                                                            class="circle"
                                                                                            data-quantity="minus"
                                                                                            data-field="onewayAdult">
                                                                                        <i class="bi bi-dash"></i>
                                                                                    </button>
                                                                                </div>
                                                                                <input class="input-group-field"
                                                                                       type="number" name="onewayAdult"
                                                                                       value="0">
                                                                                <div class="input-group-button">
                                                                                    <button type="button"
                                                                                            class="circle"
                                                                                            data-quantity="plus"
                                                                                            data-field="onewayAdult">
                                                                                        <i class="bi bi-plus"></i>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="d-flex small">Child
                                                                            </div>
                                                                            <div
                                                                                class="ms-auto input-group plus-minus-input">
                                                                                <div class="input-group-button">
                                                                                    <button type="button"
                                                                                            class="circle"
                                                                                            data-quantity="minus"
                                                                                            data-field="onewayChild">
                                                                                        <i class="bi bi-dash"></i>
                                                                                    </button>
                                                                                </div>
                                                                                <input class="input-group-field"
                                                                                       type="number" name="onewayChild"
                                                                                       value="0">
                                                                                <div class="input-group-button">
                                                                                    <button type="button"
                                                                                            class="circle"
                                                                                            data-quantity="plus"
                                                                                            data-field="onewayChild">
                                                                                        <i class="bi bi-plus"></i>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="d-flex small">Infants
                                                                            </div>
                                                                            <div
                                                                                class="ms-auto input-group plus-minus-input">
                                                                                <div class="input-group-button">
                                                                                    <button type="button"
                                                                                            class="circle"
                                                                                            data-quantity="minus"
                                                                                            data-field="onewayInfant">
                                                                                        <i class="bi bi-dash"></i>
                                                                                    </button>
                                                                                </div>
                                                                                <input class="input-group-field"
                                                                                       type="number"
                                                                                       name="onewayInfant" value="0">
                                                                                <div class="input-group-button">
                                                                                    <button type="button"
                                                                                            class="circle"
                                                                                            data-quantity="plus"
                                                                                            data-field="onewayInfant">
                                                                                        <i class="bi bi-plus"></i>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-6 col-xl-2 px-0">
                                                        <button type="submit" class="btn btn-search"
                                                                onclick="window.location.href='#';">
                                                                <span class="fw-bold"><i
                                                                        class="bi bi-search me-2"></i>
                                                                    بحث
                                                                </span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- flight class section -->
                                            <div class="col-12 mt-2">
                                                <div class="d-flex flex-sm-row flex-column">
                                                    <div class="me-2 mb-2 mb-lg-0">
                                                    </div>
                                                    <div class="me-2">
                                                        <div class="switch mode-switch">
                                                            <input type="checkbox" name="class_mode" id="class_mode"
                                                                   value="1">
                                                            <label for="class_mode" data-on="Premium"
                                                                   data-off="Economy"
                                                                   class="mode-switch-inner"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /oneway search -->
                                    </div>
                                </div>

                            </div>
                            <!-- /flight tab end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- popular routes section -->
<section class="popular-routes">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 mb-5 mb-lg-0">
                <h4 class="fs-2 fw-bold theme-text-secondary mb-0">Popular Routes</h4>
                <p class="mb-0 theme-text-accent-one">International &amp; Domestic fames ac ante ipsum</p>
            </div>
            <div class="col-12 col-lg-6 align-self-center justify-content-end d-flex">
                <div class="d-flex">
                    <div class="dropdown-center">
                        <button class="btn recomended-btn" type="button">More <i
                                class="bi bi-arrow-up-right ms-2"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <!-- popular routes stip -->
            <div class="col-12 mb-3">
                <div class="p-3 theme-border-radius border">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-xl-4 col-lg-6">
                            <div class="row align-items-center">
                                <div class="col-sm-auto">
                                    <img class="size-40" src="assets/images/icons/1.png" alt="image">
                                </div>
                                <div class="col">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <div class="fs-6">14:00</div>
                                            <div class="small theme-text-accent-one">DEL</div>
                                        </div>
                                        <div class="col text-center">
                                            <div class="flightLine">
                                                <div></div>
                                                <div></div>
                                            </div>
                                            <div class="small theme-text-accent-two">4h 05m- Nonstop</div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="fs-6">22:00</div>
                                            <div class="small theme-text-accent-one">LHR</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 my-5 my-lg-0">
                            <div class="row align-items-center">
                                <div class="col-sm-auto">
                                    <img class="size-40" src="assets/images/icons/2.png" alt="image">
                                </div>
                                <div class="col">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <div class="fs-6">15:00</div>
                                            <div class="small theme-text-accent-one">ABD</div>
                                        </div>
                                        <div class="col text-center">
                                            <div class="flightLine">
                                                <div></div>
                                                <div></div>
                                            </div>
                                            <div class="small theme-text-accent-two">2h 00m- Nonstop</div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="fs-6">17:00</div>
                                            <div class="small theme-text-accent-one">AEH</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="d-flex justify-content-between">
                                <div class="me-4">
                                    <div class="fs-6">US$934</div>
                                    <div class="small theme-text-accent-one">16 deals</div>
                                </div>
                                <a href="#" class="theme-btn-outline p-2">
                                    View Deal <i class="bi bi-arrow-up-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- repetable -->
            <div class="col-12 mb-3">
                <div class="p-3 theme-border-radius border">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-xl-4 col-lg-6">
                            <div class="row align-items-center">
                                <div class="col-sm-auto">
                                    <img class="size-40" src="assets/images/icons/5.png" alt="image">
                                </div>
                                <div class="col">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <div class="fs-6">12:00</div>
                                            <div class="small theme-text-accent-one">AAR</div>
                                        </div>
                                        <div class="col text-center">
                                            <div class="flightLine">
                                                <div></div>
                                                <div></div>
                                            </div>
                                            <div class="small theme-text-accent-two">2h 05m- Nonstop</div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="fs-6">14:50</div>
                                            <div class="small theme-text-accent-one">LHR</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 my-5 my-lg-0">
                            <div class="row align-items-center">
                                <div class="col-sm-auto">
                                    <img class="size-40" src="assets/images/icons/4.png" alt="image">
                                </div>
                                <div class="col">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <div class="fs-6">14:00</div>
                                            <div class="small theme-text-accent-one">LHR</div>
                                        </div>
                                        <div class="col text-center">
                                            <div class="flightLine">
                                                <div></div>
                                                <div></div>
                                            </div>
                                            <div class="small theme-text-accent-two">3h 00m- Nonstop</div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="fs-6">17:00</div>
                                            <div class="small theme-text-accent-one">AAR</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="d-flex justify-content-between">
                                <div class="me-4">
                                    <div class="fs-6">US$734</div>
                                    <div class="small theme-text-accent-one">12 deals</div>
                                </div>
                                <a href="#" class="theme-btn-outline p-2">
                                    View Deal <i class="bi bi-arrow-up-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- repetable -->
            <div class="col-12 mb-3">
                <div class="p-3 theme-border-radius border">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-xl-4 col-lg-6">
                            <div class="row align-items-center">
                                <div class="col-sm-auto">
                                    <img class="size-40" src="assets/images/icons/1.png" alt="image">
                                </div>
                                <div class="col">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <div class="fs-6">20:00</div>
                                            <div class="small theme-text-accent-one">DXB</div>
                                        </div>
                                        <div class="col text-center">
                                            <div class="flightLine">
                                                <div></div>
                                                <div></div>
                                            </div>
                                            <div class="small theme-text-accent-two">2h 15m- Nonstop</div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="fs-6">22:15</div>
                                            <div class="small theme-text-accent-one">LHR</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 my-5 my-lg-0">
                            <div class="row align-items-center">
                                <div class="col-sm-auto">
                                    <img class="size-40" src="assets/images/icons/3.png" alt="image">
                                </div>
                                <div class="col">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <div class="fs-6">14:00</div>
                                            <div class="small theme-text-accent-one">LHR</div>
                                        </div>
                                        <div class="col text-center">
                                            <div class="flightLine">
                                                <div></div>
                                                <div></div>
                                            </div>
                                            <div class="small theme-text-accent-two">2h 20m- Nonstop</div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="fs-6">18:50</div>
                                            <div class="small theme-text-accent-one">DXB</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="d-flex justify-content-between">
                                <div class="me-4">
                                    <div class="fs-6">US$534</div>
                                    <div class="small theme-text-accent-one">20 deals</div>
                                </div>
                                <a href="#" class="theme-btn-outline p-2">
                                    View Deal <i class="bi bi-arrow-up-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- repetable -->
            <div class="col-12 mb-3">
                <div class="p-3 theme-border-radius border">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-xl-4 col-lg-6">
                            <div class="row align-items-center">
                                <div class="col-sm-auto">
                                    <img class="size-40" src="assets/images/icons/3.png" alt="image">
                                </div>
                                <div class="col">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <div class="fs-6">12:00</div>
                                            <div class="small theme-text-accent-one">MUB</div>
                                        </div>
                                        <div class="col text-center">
                                            <div class="flightLine">
                                                <div></div>
                                                <div></div>
                                            </div>
                                            <div class="small theme-text-accent-two">10h 05m- Nonstop</div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="fs-6">22:05</div>
                                            <div class="small theme-text-accent-one">LAS</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 my-5 my-lg-0">
                            <div class="row align-items-center">
                                <div class="col-sm-auto">
                                    <img class="size-40" src="assets/images/icons/4.png" alt="image">
                                </div>
                                <div class="col">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <div class="fs-6">14:00</div>
                                            <div class="small theme-text-accent-one">LAS</div>
                                        </div>
                                        <div class="col text-center">
                                            <div class="flightLine">
                                                <div></div>
                                                <div></div>
                                            </div>
                                            <div class="small theme-text-accent-two">10h 00m- Nonstop</div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="fs-6">24:00</div>
                                            <div class="small theme-text-accent-one">MUM</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="d-flex justify-content-between">
                                <div class="me-4">
                                    <div class="fs-6">US$998</div>
                                    <div class="small theme-text-accent-one">20 deals</div>
                                </div>
                                <a href="#" class="theme-btn-outline p-2">
                                    View Deal <i class="bi bi-arrow-up-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- repetable -->
        </div>
    </div>
</section>


<!-- subscription section -->
<section class="py-5 theme-bg-primary">
    <div class="container">
        <div class="row justify-between items-center">
            <div class="col-12 col-lg-6">
                <div class="d-flex  align-items-center">
                    <img src="assets/images/icons/subscribe-icon.png" alt="subscribe" class="img-fluid">
                    <div class="ms-3">
                        <h4 class="text-26 text-white fw-600">Your Travel Journey Starts Here</h4>
                        <p class="text-white">Sign up and we'll send the best deals to you</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-5 offset-lg-1 align-self-center">
                <div class="input-group subs-form">
                    <input type="text" class="form-control border-0" placeholder="Your Email"
                           aria-label="Your Email" aria-describedby="button-addon2">
                    <button class="btn btn-search" type="button" id="button-addon2">Subscribe</button>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- footer section-->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-6 col-lg-3 mb-5 mb-lg-0">
                <h5 class="mb-5 fs-6">Contact Us</h5>
                <div class="flex-grow-1">
                    Customer Care<br>
                    <span class="fs-5 theme-text-primary">+(1) 123 456 7890</span>
                </div>
                <div class="flex-grow-1 mt-3">
                    Need live support?<br>
                    <a href="#" class="fs-5 theme-text-primary">hi@example.com</a>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-2 mb-5 mb-lg-0">
                <div class="d-flex">
                    <h5 class="mb-5 fs-6">Company</h5>
                </div>
                <div class="d-flex">
                    <ul class="fl-menu">
                        <li class="nav-item"><a href="javascript:void(0)">About Us</a></li>
                        <li class="nav-item"><a href="javascript:void(0)">Careers</a></li>
                        <li class="nav-item"><a href="javascript:void(0)">Blog</a></li>
                        <li class="nav-item"><a href="javascript:void(0)">Press</a></li>
                        <li class="nav-item"><a href="javascript:void(0)">Offers</a></li>
                        <li class="nav-item"><a href="javascript:void(0)">Deals</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-2 mb-5 mb-lg-0">
                <h5 class="mb-5 fs-6">Support</h5>
                <div class="mt-5">
                    <ul class="fl-menu">
                        <li class="nav-item"><a href="javascript:void(0)">Contact</a></li>
                        <li class="nav-item"><a href="javascript:void(0)">Legal Notice</a></li>
                        <li class="nav-item"><a href="javascript:void(0)">Privacy Policy</a></li>
                        <li class="nav-item"><a href="javascript:void(0)">Terms and Conditions</a></li>
                        <li class="nav-item"><a href="javascript:void(0)">Sitemap</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-3 mb-5 mb-lg-0">
                <div class="d-flex justify-content-lg-center">
                    <h5 class="mb-5 fs-6">Other Services</h5>
                </div>
                <div class="d-flex justify-content-lg-center">
                    <ul class="fl-menu">
                        <li class="nav-item"><a href="javascript:void(0)">Bus</a></li>
                        <li class="nav-item"><a href="javascript:void(0)">Activity Finder</a></li>
                        <li class="nav-item"><a href="javascript:void(0)">Tour List</a></li>
                        <li class="nav-item"><a href="javascript:void(0)">Flight Search</a></li>
                        <li class="nav-item"><a href="javascript:void(0)">Cruise Ticket</a></li>
                        <li class="nav-item"><a href="javascript:void(0)">Holidays</a></li>
                        <li class="nav-item"><a href="javascript:void(0)">Travel Agents</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-2 mb-5 mb-lg-0">

            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-3 mt-lg-5">
                <p class="pt-2 mb-0 small theme-text-accent-one">&copy; 2024 RoundTours All rights reserved.
                </p>
            </div>
            <div class="col-12 col-lg-6 mt-5">
                <ul class="footer-link d-flex flex-row flex-wrap justify-content-lg-center align-items-center">
                    <li><a href="javascript:void(0)">Privacy</a></li>
                    <li><a href="javascript:void(0)">Terms</a></li>
                    <li><a href="javascript:void(0)">Site Map</a></li>
                </ul>
            </div>
            <div class="col-12 col-lg-3 mt-5">
                <div class="d-flex social justify-content-lg-end">
                    <a href="javascript:void(0)" class="fs-4 pe-3"><i class="bi bi-facebook"></i></a>
                    <a href="javascript:void(0)" class="fs-4 pe-3"><i class="bi bi-twitter"></i></a>
                    <a href="javascript:void(0)" class="fs-4 pe-3"><i class="bi bi-linkedin"></i></a>
                    <a href="javascript:void(0)" class="fs-4 pe-3"><i class="bi bi-instagram"></i></a>
                    <a href="javascript:void(0)" class="fs-4"><i class="bi bi-whatsapp"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Scroll To Top Start-->
    <a href="javascript:void(0)" class="scrollToTop"><i class="bi bi-chevron-double-up"></i></a>
</footer>

<!-- js file -->
<script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
    // Scroll Top
    $(document).ready(function () {
        var ScrollTop = $(".scrollToTop");
        $(window).on('scroll', function () {
            if ($(this).scrollTop() < 500) {
                ScrollTop.removeClass("active");
            } else {
                ScrollTop.addClass("active");
            }
        });
        $('.scrollToTop').on('click', function () {
            $('html, body').animate({
                scrollTop: 0
            }, 500);
            return false;
        });
    });
</script>
</body>

</html>
