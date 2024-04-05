<!-- Menu -->
@php
    function isActive($child)
    {
        foreach ($child as $item) {
            if (url()->current() == route($item['route'])) {
                return true;
            }
        }
    }
    $menu = [
        [
            'name' => 'Tổng quan',
            'classIcon' => 'menu-icon tf-icons bx bx-home-circle',
            'route' => 'dashboard.index',
            'children' => [],
        ],
        [
            'name' => 'Slider',
            'classIcon' => 'menu-icon tf-icons bx bx-slider-alt',
            'route' => 'dashboard.sliders.index',
            'children' => [],
        ],
        [
            'name' => 'Danh mục sản phẩm',
            'classIcon' => 'menu-icon tf-icons bx bx-category-alt',
            'route' => 'dashboard.category.index',
            'children' => [],
        ],
        [
            'name' => 'Bài viết',
            'classIcon' => 'menu-icon tf-icons bx bx-news',
            'route' => 'dashboard.post.index',
            'children' => [],
        ],
        // [
        //     'name' => 'Tags',
        //     'classIcon' => 'menu-icon tf-icons bx bx-purchase-tag-alt',
        //     'route' => 'dashboard.tag.index',
        //     'children' => [],
        // ],
        [
            'name' => 'Sản phẩm',
            'classIcon' => 'menu-icon tf-icons bx bx-cube',
            'route' => 'dashboard.product.index',
            'children' => [],
        ],
        [
            'name' => 'Đối tác',
            'classIcon' => 'menu-icon tf-icons bx bx-buildings',
            'route' => 'dashboard.partners.index',
            'children' => [],
        ],

        [
            'name' => 'Đại lý',
            'classIcon' => 'menu-icon tf-icons bx bx-store-alt',
            'route' => 'dashboard.agency.index',
            'children' => [],
        ],
   
     
        [
            'name' => 'Tài khoản',
            'classIcon' => 'menu-icon tf-icons bx bxs-user-account',
            'route' => 'dashboard.user.index',
            'children' => [],
        ],
        [
            'name' => 'Media',
            'classIcon' => 'menu-icon tf-icons bx bxs-folder-open',
            'route' => 'dashboard.media',
            'children' => [],
        ],
        [
            'name' => 'Cài đặt',
            'classIcon' => 'menu-icon tf-icons bx bx-cog',
            'route' => 'dashboard.setting.index',
            'children' => [],
        ],
    ];

@endphp
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('dashboard.index') }}" class="app-brand-link">

            <span class="app-brand-text demo menu-text fw-bolder ms-2" style="text-transform: uppercase">Dashboard</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>


    <ul class="menu-inner py-1">
        @foreach ($menu as $item)
            @if (empty($item['children']))
                <li class="menu-item {{ url()->current() == route($item['route']) ? 'active' : '' }}">
                    <a href="{{ url()->current() == route($item['route']) ? 'javascript:void(0)' : route($item['route']) }}"
                        class="menu-link">
                        <i class="{{ $item['classIcon'] }}"></i>
                        <div data-i18n="{{ $item['name'] }}">{{ $item['name'] }}</div>
                    </a>
                </li>
            @else
                <li class="menu-item {{ isActive($item['children']) ? 'active open' : '' }} ">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="{{ $item['classIcon'] }}"></i>
                        <div data-i18n="{{ $item['name'] }}">{{ $item['name'] }} </div>
                    </a>
                    <ul class="menu-sub">
                        @foreach ($item['children'] as $children)
                            <li class="menu-item {{ url()->current() == route($children['route']) ? 'active' : '' }}">
                                <a href="{{ url()->current() == route($children['route']) ? 'javascript:void(0)' : route($children['route']) }}"
                                    class="menu-link">
                                    <div data-i18n="{{ $children['name'] }}">{{ $children['name'] }}</div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endif
        @endforeach

    </ul>
</aside>
<!-- / Menu -->
