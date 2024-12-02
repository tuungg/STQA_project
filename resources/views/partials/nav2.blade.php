<style>
    .navbar {
        transition: padding-top 0.5s ease;
        z-index: 500;
    }
    </style>

    <header class="fixed z-[1000] w-screen opacity-90 px-4">
    <nav class="w-full md:w-[75vw] mx-auto bg-transparent  border-b-2 border-gray-100 border-opacity-50 dark:bg-gray-900 navbar  font-dm px-5 pt-10 pb-5">
        <div class="max-w-screen-2xl flex flex-wrap items-center justify-between mx-auto 2xl:max-w-[90vw]">
            <a href="" class="flex items-center space-x-4 rtl:space-x-reverse">
                <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
            </a>
            <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 hamburger"
                aria-controls="navbar-default" aria-expanded="true">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto md:mb-0" id="navbar-default">
                <ul
                    class="bg-blue my-3 md:my-0 font-medium flex flex-col md:p-0 border md:text-sm border-gray-100 rounded-lg  md:flex-row sm:space-x-2 lg:space-x-1 rtl:space-x-reverse md:mt-0 md:border-0">
                    <li></li>
                    <li >
                        <a href="#"
                            class="nav-text lg:text-lg  lg:mx-5 mx-1 block py-2 px-3 text-gray-900 md:text-white rounded hover:bg-sky-100 md:hover:bg-transparent md:border-0 md:p-0 hover:underline  {{ $title == 'Home' ? '' : '' }}">Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    </header>

    <script>
    $(document).ready(function() {
        $(window).on('scroll', function() {
        if ($(window).scrollTop() > 50) {
            $('header').addClass('bg-white shadow-md');
            $('.nav-text').addClass('!text-gray-900');
            $('.moka-logo').attr('src', '{{ asset('img/moka-blue.png') }}');
            $('nav').removeClass('pt-10 pb-5').addClass('py-4');


        } else {
            $('header').removeClass('bg-white shadow-md');
            $('.nav-text').removeClass('!text-gray-900');
            $('.moka-logo').attr('src', '{{ asset('img/moka-white.png') }}');
            $('nav').removeClass('py-3').addClass('pt-10 pb-5');
        }
        });

        $('.hamburger').click(function() {
        if ($('#navbar-default').is(':visible')) {
            $('#navbar-default').hide();
            $('header').removeClass('bg-white');
            $('.moka-logo').attr('src', '{{ asset('img/moka-white.png') }}');
        } else {
            $('#navbar-default').show();
            $('header').addClass('bg-white');
            $('.moka-logo').attr('src', '{{ asset('img/moka-blue.png') }}');

        }
        });

        $(window).resize(function() {
            if ($(window).width() > 768) {
                $('#navbar-default').css('display', 'block');

            } else {
                $('#navbar-default').css('display', 'none');
            }
        });
    });
    </script>
