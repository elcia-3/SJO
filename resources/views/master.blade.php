<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title')</title>
        <link href="{{ asset('css/master.css') }}" rel="stylesheet" type="text/css">
        @yield('css')
    </head>

    <body>
        <div class="wrapper">
            <header>
                <div id="search-off">
                    <div class ="header-layout">
                        <a href="{{ route('course.allCourses') }}"><strong>super授業リンクくん-online-</strong></a>
                        <div class="search-layout-pc">
                            <form action="{{ route('course.searchCourses') }}" class="search-box" method="post">
                                @csrf
                                <input name="str" type="search" inputmode="search" placeholder="      キーワードで探す">
                                <button type="submit" class="magnifying-glass">
                                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="12.000000pt" height="12.000000pt" viewBox="0 0 1280.000000 1230.000000" preserveAspectRatio="xMidYMid meet">
                                    <g transform="translate(0.000000,1230.000000) scale(0.100000,-0.100000)" fill="#ffffff" stroke="none">
                                    <path d="M4970 12294 c-25 -2 -106 -8 -180 -14 -1181 -95 -2334 -616 -3184 -1440 -317 -307 -568 -614 -792 -967 -449 -708 -709 -1478 -796 -2358 -17 -173 -17 -720 0 -900 69 -738 273 -1425 604 -2040 500 -928 1256 -1675 2189 -2164 919 -481 1996 -677 3049 -555 868 100 1728 430 2427 931 56 40 104 73 108 73 3 0 641 -588 1418 -1307 776 -718 1437 -1326 1467 -1350 72 -58 235 -138 335 -165 116 -31 355 -31 470 0 600 165 884 837 581 1375 -78 138 76 -8 -1913 1831 l-1080 998 84 142 c167 280 340 657 449 978 403 1187 368 2487 -98 3656 -388 976 -1074 1820 -1949 2402 -726 482 -1517 764 -2399 855 -144 15 -682 28 -790 19z m614 -1879 c656 -70 1247 -314 1771 -731 141 -112 406 -377 519 -519 594 -744 844 -1668 705 -2608 -183 -1239 -1087 -2308 -2284 -2700 -389 -128 -707 -174 -1138 -164 -268 6 -406 22 -632 72 -950 213 -1757 815 -2233 1666 -373 666 -506 1454 -372 2209 160 909 697 1723 1475 2236 455 300 954 479 1498 538 169 19 520 19 691 1z"/>
                                    </g>
                                    </svg>

                                </button>
                            </form>
                        </div>   

                        <div class="position-right-sp"> 
                            <div class="start-search" id="start-search">
                                <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
                                width="20" height="20" viewBox="0 0 1280.000000 1230.000000"
                                preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,1230.000000) scale(0.100000,-0.100000)"
                                fill="#000000" stroke="none">
                                <path d="M4970 12294 c-25 -2 -106 -8 -180 -14 -1181 -95 -2334 -616 -3184
                                -1440 -317 -307 -568 -614 -792 -967 -449 -708 -709 -1478 -796 -2358 -17
                                -173 -17 -720 0 -900 69 -738 273 -1425 604 -2040 500 -928 1256 -1675 2189
                                -2164 919 -481 1996 -677 3049 -555 868 100 1728 430 2427 931 56 40 104 73
                                108 73 3 0 641 -588 1418 -1307 776 -718 1437 -1326 1467 -1350 72 -58 235
                                -138 335 -165 116 -31 355 -31 470 0 600 165 884 837 581 1375 -78 138 76 -8
                                -1913 1831 l-1080 998 84 142 c167 280 340 657 449 978 403 1187 368 2487 -98
                                3656 -388 976 -1074 1820 -1949 2402 -726 482 -1517 764 -2399 855 -144 15
                                -682 28 -790 19z m614 -1879 c656 -70 1247 -314 1771 -731 141 -112 406 -377
                                519 -519 594 -744 844 -1668 705 -2608 -183 -1239 -1087 -2308 -2284 -2700
                                -389 -128 -707 -174 -1138 -164 -268 6 -406 22 -632 72 -950 213 -1757 815
                                -2233 1666 -373 666 -506 1454 -372 2209 160 909 697 1723 1475 2236 455 300
                                954 479 1498 538 169 19 520 19 691 1z"/>
                                </g>
                                </svg>
                            </div>
                            <div id="Hamburger" class="hamburger">
                                <div></div>
                                <div></div>
                                <div></div>
                                <p>menu</p>
                            </div>
                        </div>
                        <nav id="Header-nav" class="header-nav">
                        @if(Auth::check())
                        <a href="{{ route('course.allFavorites') }}" class="header-list">お気に入り</a>
                        <a href="{{ route('course.makeCourse') }}" class="header-list">授業登録</a>
                        <a href="{{ route('user.signout') }}" class="header-list">ログアウト</a>
                        @else
                        <a href="{{ route('user.signup') }}" class="header-list">会員登録</a>
                        <a href="{{ route('user.signin') }}" class="header-list">ログイン</a>
                        @endif
                        </nav>

                    </div>
                </div>
                <div class="search-on" id="search-on">

                    <form action="{{ route('course.searchCourses') }}" class="search-sp" method="post">
                        @csrf
                        <input type="button" value="←" id="stop-search" class="stop-search">
                        <input name="str" type="search" inputmode="search" placeholder="キーワードで探す">
                                <button type="submit" class="magnifying-glass">
                                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="12.000000pt" height="12.000000pt" viewBox="0 0 1280.000000 1230.000000" preserveAspectRatio="xMidYMid meet">
                                    <g transform="translate(0.000000,1230.000000) scale(0.100000,-0.100000)" fill="#ffffff" stroke="none">
                                    <path d="M4970 12294 c-25 -2 -106 -8 -180 -14 -1181 -95 -2334 -616 -3184 -1440 -317 -307 -568 -614 -792 -967 -449 -708 -709 -1478 -796 -2358 -17 -173 -17 -720 0 -900 69 -738 273 -1425 604 -2040 500 -928 1256 -1675 2189 -2164 919 -481 1996 -677 3049 -555 868 100 1728 430 2427 931 56 40 104 73 108 73 3 0 641 -588 1418 -1307 776 -718 1437 -1326 1467 -1350 72 -58 235 -138 335 -165 116 -31 355 -31 470 0 600 165 884 837 581 1375 -78 138 76 -8 -1913 1831 l-1080 998 84 142 c167 280 340 657 449 978 403 1187 368 2487 -98 3656 -388 976 -1074 1820 -1949 2402 -726 482 -1517 764 -2399 855 -144 15 -682 28 -790 19z m614 -1879 c656 -70 1247 -314 1771 -731 141 -112 406 -377 519 -519 594 -744 844 -1668 705 -2608 -183 -1239 -1087 -2308 -2284 -2700 -389 -128 -707 -174 -1138 -164 -268 6 -406 22 -632 72 -950 213 -1757 815 -2233 1666 -373 666 -506 1454 -372 2209 160 909 697 1723 1475 2236 455 300 954 479 1498 538 169 19 520 19 691 1z"/>
                                    </g>
                                    </svg>
                                </button>

                </form> 
                </div>

                
            </header>
                <hr class="hr-style">
            <main>
            @yield('content')
            </main>

            <footer>
                <p>Copyright &copy; 2021 super授業リンクくん-online-</p>
            </footer>
        </div>

        <script type="text/javascript" src="{{ asset('js/master.js') }}"></script>
        @yield('js')
    </body>
</html>