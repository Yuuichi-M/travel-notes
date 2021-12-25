<nav class="navbar navbar-expand border-bottom fixed-top bg-white shadow-none">

    <div class="container">

        <a class="navbar-brand font-weight-bold deep-orange-text navbar-logo" title="ホーム" href="/">
            <i class="fas fa-shoe-prints mr-1"></i>
            {{ config('app.name') }}
        </a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">

                @guest
                <li class="nav-item">
                    <a class="nav-link deep-orange-text" href="{{ route('register') }}" role="button" title="アカウント登録">
                        <i class="fas fa-user-alt deep-orange-text text-center navbar-icon">
                            <div class="small mt-1">
                                アカウント登録
                            </div>
                        </i>
                    </a>
                </li>

                <li class=" nav-item">
                    <a class="nav-link deep-orange-text" href="{{ route('login') }}" role="button" title="ログイン">
                        <i class="fas fa-sign-in-alt deep-orange-text text-center navbar-icon">
                            <div class="small mt-1">
                                ログイン
                            </div>
                        </i>
                    </a>
                </li>

                <!-- <li class="nav-item">
                    <a class="nav-link deep-orange-text" href="{{ route('login.guest') }}" role="button" title="ゲストログイン">
                        <i class="fas fa-user-tie deep-orange-text text-center navbar-icon">
                            <div class="small mt-1">
                                ゲストログイン
                            </div>
                        </i>
                    </a>
                </li> -->
                @else

                <!-- dropdown menu -->
                <li class="nav-item dropdown ml-2">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle deep-orange-text" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        @if (!empty(Auth::user()->avatar_file_name))
                        <img src="{{ asset('https://portfolio-sns-backet.s3.ap-northeast-1.amazonaws.com/avatars/' . Auth::user()->avatar_file_name) }}" class="rounded-circle" style="object-fit: cover; width: 31px; height: 31px;">
                        @else
                        <img src="/images/avatar-default.svg" class="rounded-circle" style="object-fit: cover; width: 31px; height: 31px;">
                        @endif
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text-dark" href="{{ route("users.show", ["name" => Auth::user()->name]) }}">
                            @if (!empty(Auth::user()->avatar_file_name))
                            <img src="{{ asset('https://portfolio-sns-backet.s3.ap-northeast-1.amazonaws.com/avatars/' . Auth::user()->avatar_file_name) }}" class="rounded-circle mr-1" style="object-fit: cover; width: 22px; height: 22px;">
                            @else
                            <img src="/images/avatar-default.svg" class="rounded-circle mr-1" style="object-fit: cover; width: 22px; height: 22px;">
                            @endif
                            マイページ
                        </a>

                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item text-dark" href="{{ route('articles.create') }}">
                            <i class="fas fa-paper-plane mr-2"></i>
                            投稿する
                        </a>

                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-button').submit();">
                            <i class="fas fa-sign-out-alt mr-2"></i>
                            ログアウト
                        </a>
                        <form id="logout-button" method="POST" action="{{ route('logout') }}" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                <!-- dropdown menu -->

                @endguest
            </ul>

        </div>
    </div>

</nav>
