<x-app-layout>
    @push('styles')
        <style>

            /* Screens Resolution : 992px
            -------------------------------------------------------------------------- */
            @media only screen and (max-width: 1200px) {

            }

            /* Screens Resolution : 992px
            -------------------------------------------------------------------------- */
            @media only screen and (max-width: 992px) {



            }


            /* Screens Resolution : 767px
            -------------------------------------------------------------------------- */
            @media only screen and (max-width: 767px) {

                /* ---------------------------------
                1. PRIMARY STYLES
                --------------------------------- */

                p{ line-height: 1.4; }

                h1{ font-size: 2.8em; line-height: 1; }
                h2{ font-size: 2.2em; line-height: 1.1; }
                h3{ font-size: 1.8em; }



            }

            /* Screens Resolution : 479px
            -------------------------------------------------------------------------- */
            @media only screen and (max-width: 479px) {

                /* ---------------------------------
                1. PRIMARY STYLES
                --------------------------------- */

                body{ font-size: 12px; }

            }

            /* Screens Resolution : 359px
            -------------------------------------------------------------------------- */
            @media only screen and (max-width: 359px) {


            }

            /* Screens Resolution : 290px
            -------------------------------------------------------------------------- */
            @media only screen and (max-width: 290px) {


            }
        </style>

        <style>

            /* ---------------------------------
            2. COMMONS FOR PAGE DESIGN
            --------------------------------- */

            .display-table{ display: table; height: 100%; width: 100%; }

            .display-table-cell{ display: table-cell; vertical-align: middle; }


            .full-height{ height: 100%; }

            .position-static{ position: static; }


            /* ---------------------------------
            3. MAIN SECTION
            --------------------------------- */

            .main-area{ position: relative; height: 100vh; z-index: 1; padding: 0 20px; background-size: cover; }

            .main-area:after{ content:''; position: absolute; top: 0; bottom: 0;left: 0; right: 0; z-index: -1;
                opacity: .6; background: #111f1a; }

            .main-area .desc{ margin: 20px auto; max-width: 500px; }
        </style>
    @endpush
        <div class=" main-area center-text" style="background-image:url({{ asset('/img/airplane.jpg') }});">
            <div class="display-table">
                <div class="display-table-cell">
                    <div class="p-36">
                        <livewire:flights-table />
                    </div>
                </div>
            </div>
        </div>

</x-app-layout>
