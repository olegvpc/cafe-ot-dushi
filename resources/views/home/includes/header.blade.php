<div class="tm-left">
    <div class="tm-left-inner">
        <div class="tm-site-header">
            <a href="{{ route('home') }}">
                <img src="../img/sheff-logo.png" alt="sheff-logo" class="tm-site-logo">
            </a>
            <h1 class="tm-site-name">Кафе "От души"</h1>
        </div>
        <nav class="tm-site-nav">
            <ul class="tm-site-nav-ul">
                <li class="tm-page-nav-item">
                    <a href="{{ route('home.russian-menu') }}" class="tm-page-link {{ active_link('home.russian-menu') }}">
                        <span>{{__('Russian cuisine') }}</span>
                        <span>อาหารรัสเซีย</span>
                    </a>
                </li>
                <li class="tm-page-nav-item">
                    <a href="{{ route('home.thai-menu') }}" class="tm-page-link {{ active_link('home.thai-menu') }}">
                        <span>{{__('Thai cuisine') }}</span>
                        <span>อาหารไทย</span>
                    </a>
                </li>
                <li class="tm-page-nav-item">
                    <a href="{{ route('home.special-menu') }}" class="tm-page-link {{ active_link('home.special-menu') }}">
                        <span>{{__('Special proposal') }}</span>
                        <span>ชุดอาหารกลางวัน</span>
                    </a>
                </li>
                <li class="tm-page-nav-item tm-page-nav-item-login">
                    <a href="{{ Auth::check() ? route('user.menus.index') : route('home.login') }}" class="tm-page-link {{ active_link('home.login') }}">
                        <span> {{ Auth::user() ? Auth::user()->name : 'Login' }}</span>
                        <span>{{ Auth::user() ? '' : 'เข้าสู่ระบบ' }}</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
