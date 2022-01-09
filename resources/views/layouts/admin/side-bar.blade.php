<aside class="navbar-aside" id="offcanvas_aside">
    <div class="aside-top">
        <a href="index.html" class="brand-wrap">
            <img src="{{asset('/assets/admin/imgs/brands/logo-main.png')}}" class="logo" alt="Nest Dashboard" />
        </a>
        <div>
            <button class="btn btn-icon btn-aside-minimize"><i class="text-muted material-icons md-menu_open"></i></button>
        </div>
    </div>
    <nav>
        <ul class="menu-aside">
            <li class="menu-item {{ Request::is('admin/dashboard*') ? 'active' : '' }} ">
                <a class="menu-link" href="{{route('dashboard')}}">
                    <i class="icon material-icons md-home"></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li class="menu-item {{ Request::is('admin/statistics*') ? 'active' : '' }}">
                <a class="menu-link" disabled href="#">
                    <i class="icon material-icons md-pie_chart"></i>
                    <span class="text">Statistics</span>
                </a>
            </li>
            <li class="menu-item {{ Request::is('admin/categories*') ? 'active' : '' }}">
                <a class="menu-link" href="{{route('categories.index')}}">
                    <i class="icon material-icons md-category"></i>
                    <span class="text">Category</span>
                </a>
            </li>
            <li class="menu-item {{ Request::is('admin/sub-categories*') ? 'active' : '' }}">
                <a class="menu-link" href="{{route('sub-categories.index')}}">
                    <i class="icon material-icons md-category"></i>
                    <span class="text">Sub Category</span>
                </a>
            </li>
            <li class="menu-item {{ Request::is('admin/sub-sub-categories*') ? 'active' : '' }}">
                <a class="menu-link" href="{{route('sub-sub-categories.index')}}">
                    <i class="icon material-icons md-category"></i>
                    <span class="text">Sub Sub Category</span>
                </a>
            </li>
            <li class="menu-item {{ Request::is('admin/products*') ? 'active' : '' }}">
                <a class="menu-link" href="{{route('products.index')}}">
                    <i class="icon material-icons md-shopping_bag"></i>
                    <span class="text">Products</span>
                </a>
            </li>

            <li class="menu-item {{ Request::is('admin/orders*') ? 'active' : '' }}">
                <a class="menu-link" href="page-orders-1.html">
                    <i class="icon material-icons md-shopping_cart"></i>
                    <span class="text">Orders</span>
                </a>
            </li>

            <li class="menu-item {{ Request::is('admin/transactions*') ? 'active' : '' }}">
                <a class="menu-link" href="page-transactions-1.html">
                    <i class="icon material-icons md-monetization_on"></i>
                    <span class="text">Transactions</span>
                </a>
            </li>

            <li class="menu-item {{ Request::is('admin/manufacturing-companies*') ? 'active' : '' }}">
                <a class="menu-link" href="{{route('manufacturing-companies.index')}}">
                    <i class="icon material-icons md-apartment"></i>
                    <span class="text">manufacturing companies</span>
                </a>
            </li>
            <li class="menu-item {{ Request::is('admin/customers*') ? 'active' : '' }}">
                <a class="menu-link" href="{{route('customers.index')}}">
                    <i class="icon material-icons md-groups"></i>
                    <span class="text">Customers</span>
                </a>
            </li>
            <li class="menu-item {{ Request::is('admin/reviews*') ? 'active' : '' }}">
                <a class="menu-link" href="page-reviews.html">
                    <i class="icon material-icons md-comment"></i>
                    <span class="text">Reviews</span>
                </a>
            </li>

            <li class="menu-item {{ Request::is('admin/accounts*') ? 'active' : '' }}">
                <a class="menu-link" href="#">
                    <i class="icon material-icons md-person"></i>
                    <span class="text">Account</span>
                </a>
            </li>

            <li class="menu-item {{ Request::is('admin/pages*') ? 'active' : '' }}">
                <a class="menu-link" href="{{route('pages.index')}}">
                    <i class="icon material-icons md-layers"></i>
                    <span class="text">Pages</span>
                </a>
            </li>

        </ul>
        <hr />
{{--        <ul class="menu-aside">--}}
{{--            <li class="menu-item has-submenu">--}}
{{--                <a class="menu-link" href="#">--}}
{{--                    <i class="icon material-icons md-settings"></i>--}}
{{--                    <span class="text">Settings</span>--}}
{{--                </a>--}}
{{--                <div class="submenu">--}}
{{--                    <a href="page-settings-1.html">Setting sample 1</a>--}}
{{--                    <a href="page-settings-2.html">Setting sample 2</a>--}}
{{--                </div>--}}
{{--            </li>--}}
{{--        </ul>--}}
        <ul class="menu-aside">
            <li class="menu-item has-submenu">
                <a class="menu-link" href="#">
                    <i class="icon material-icons md-drag_indicator"></i>
                    <span class="text">Others</span>
                </a>
                <div class="submenu">
                    <a href="{{route('units.index')}}">Units</a>
                    <a href="{{route('tax.index')}}">Tax</a>
                    <a href="{{route('sell-types.index')}}">Sell Types</a>
                    <a href="{{route('product-flags.index')}}">Product Flags</a>
                    <a href="{{route('delivery-times.index')}}">Delivery Times</a>
                    <a href="{{route('countries.index')}}">Countries</a>
                    <a href="{{route('tags.index')}}">Tags</a>
                </div>
            </li>
        </ul>
        <br />
        <br />
    </nav>
</aside>
