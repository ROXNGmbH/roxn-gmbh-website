@extends('layouts.user.app')
@section('page-title','Filter Product')

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-xl-4 primary-sidebar sticky-sidebar mt-30"
                 style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
                <div class="theiaStickySidebar"
                     style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none;">
                    <div class="sidebar-widget widget-category-2 mb-30">
                        <h5 class="section-title style-1 mb-30">Category</h5>
                        <ul>
                            <li>
                                <a href="shop-grid-right.html"> <img src="assets/imgs/theme/icons/category-1.svg"
                                                                     alt="">Milks &amp; Dairies</a><span class="count">30</span>
                            </li>
                            <li>
                                <a href="shop-grid-right.html"> <img src="assets/imgs/theme/icons/category-2.svg"
                                                                     alt="">Clothing</a><span class="count">35</span>
                            </li>
                            <li>
                                <a href="shop-grid-right.html"> <img src="assets/imgs/theme/icons/category-3.svg"
                                                                     alt="">Pet Foods </a><span class="count">42</span>
                            </li>
                            <li>
                                <a href="shop-grid-right.html"> <img src="assets/imgs/theme/icons/category-4.svg"
                                                                     alt="">Baking material</a><span
                                    class="count">68</span>
                            </li>
                            <li>
                                <a href="shop-grid-right.html"> <img src="assets/imgs/theme/icons/category-5.svg"
                                                                     alt="">Fresh Fruit</a><span class="count">87</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
