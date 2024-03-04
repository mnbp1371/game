<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar">
        <div class="side-header">
            <a class="header-brand1" href="index.html">
                <img alt="logo" class="header-brand-img desktop-logo" src="/assets/images/brand/logo.png">
                <img alt="logo" class="header-brand-img toggle-logo" src="/assets/images/brand/logo-1.png">
                <img alt="logo" class="header-brand-img light-logo" src="/assets/images/brand/logo-2.png">
                <img alt="logo" class="header-brand-img light-logo1" src="/assets/images/brand/logo-3.png">
            </a>
        </div>
        <div class="main-sidemenu">
            <div class="slide-left disabled" id="slide-left">
                <svg fill="#7b8191" height="24" viewBox="0 0 24 24" width="24"
                     xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"/>
                </svg>
            </div>
            <ul class="side-menu">
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{route('admin.dashboard')}}">
                        <i class="side-menu__icon fe fe-home"></i>
                        <span class="side-menu__label">
                            {{__('dashboard')}}
                        </span>
                    </a>
                </li>
                <li class="slide">
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{route('admin.questions.index')}}">
                        <i class="side-menu__icon fe fe-home"></i>
                        <span class="side-menu__label">
                            {{__('index_questions')}}
                        </span>
                    </a>
                    <a class="side-menu__item has-link" data-bs-toggle="slide" href="{{route('admin.questions.create')}}">
                        <i class="side-menu__icon fe fe-home"></i>
                        <span class="side-menu__label">
                            {{__('create_questions')}}
                        </span>
                    </a>
                </li>
            </ul>
            <div class="slide-right" id="slide-right">
                <svg fill="#7b8191" height="24" viewBox="0 0 24 24" width="24"
                     xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"/>
                </svg>
            </div>
        </div>
    </div>
</div>
