<header class="header">
    <h5 class="header__introduction">We Make Your Feel Comfortable</h5>
    <nav class="header__nav">
        <div class="header__nav__ctn-left">
            <div class="header__nav__ctn-left__ctn-img">
                <img class="header__nav__ctn-left__ctn-img__img header__nav__ctn-left__ctn-img__img__hamburger"
                    id="header__nav__ctn-left__ctn-img__img__hamburger" src="{{ asset('media/icon/hamburger.png') }}">
                <img class="header__nav__ctn-left__ctn-img__img header__nav__ctn-left__ctn-img__img__X"
                    id="header__nav__ctn-left__ctn-img__img__X" src="{{ asset('media/icon/X.png') }}">
            </div>
            <a class="header__nav__ctn-left__ctn-returnHome" href="{{ url('/') }}">
                <h4 class="header__nav__ctn-left__ctn-returnHome__icon-H">H</h4>
                <h5 class="header__nav__ctn-left__ctn-returnHome__title"><b>Hotel</b><br />Miranda</h5>
            </a>
        </div>
        <div class="header__nav__ctn-middle">
            <ul class="header__nav__ctn-middle__menu" id="header__nav__ctn-middle__menu">
                <li><a class="header__nav__ctn-middle__menu__option" href="{{ url('about') }}">About Us</a></li>
                <li><a class="header__nav__ctn-middle__menu__option" href="{{ url('rooms') }}">Rooms</a></li>
                <li><a class="header__nav__ctn-middle__menu__option" href="{{ url('offers') }}">Offers</a></li>
                <li><a class="header__nav__ctn-middle__menu__option" href="{{ url('contact') }}">Contact</a></li>
            </ul>
        </div>
        <div class="header__nav__ctn-right">
            <img class="header__nav__ctn-right__img" src="{{ asset('media/icon/personProfile.png') }}">
            <img class="header__nav__ctn-right__img" src="{{ asset('media/icon/magnifyingGlass.png') }}">
        </div>
    </nav>
</header>