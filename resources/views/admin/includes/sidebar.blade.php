
<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
              <!-- Main -->
            <li class="nav-item active"><a href="{{route('dashboard')}}"><i class="la la-mouse-pointer"></i><span
                        class="menu-title" data-i18n="nav.add_on_drag_drop.main">الرئيسية </span></a>
            </li>
            <!-- End Main -->
            
            <!-- Main Cateegories -->
            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">الاقسام الرئيسيه </span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">{{App\Models\MainCategory::active()->count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('admin.maincategories')}}"
                                          data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.maincategories.create')}}" data-i18n="nav.dash.crypto">أضافة
                             قسم جديد </a>
                    </li>
                </ul>
            </li>
            <!-- End Main Cateegories -->

            
            
            <!-- SubCategories -->
            <li class="nav-item"><a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">الاقسام الفرعية  </span>
                    <span
                        class="badge badge badge-warning  badge-pill float-right mr-2">{{App\Models\SubCategory::active()->count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('admin.sub_categories')}}"
                                          data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.sub_categories.create')}}" data-i18n="nav.dash.crypto">أضافة
                            قسم فرعي </a>
                    </li>
                </ul>
            </li>
            <!-- End SubCategories -->
            
             <!-- Start Vendors -->
             <li class="nav-item"><a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> التجار   </span>
                    <span
                        class="badge badge badge-success badge-pill float-right mr-2">{{App\Models\Vendor::active()->count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('admin.vendors')}}"
                                          data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.vendors.create')}}" data-i18n="nav.dash.crypto">أضافة
                             تاجر جديد </a>
                    </li>
                </ul>
            </li>
            <!-- End Vendors -->
             <!-- Start offers -->
            <li class="nav-item"><a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">عروض  </span>
                    <span
                        class="badge badge badge-success badge-pill float-right mr-2">{{App\Models\Offers::active()->count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('admin.offers')}}"
                                          data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.offers.create')}}" data-i18n="nav.dash.crypto">أضافة
                            عرض  </a>
                    </li>
                </ul>
            </li>
             <!-- End offers -->

             <!-- start Branches -->
            <li class="nav-item">
                <a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">فروع المحلات   </span>
                    <span
                        class="badge badge badge-danger  badge-pill float-right mr-2">{{App\Models\Branch::active()->count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('admin.branches')}}"
                                          data-i18n="nav.dash.ecommerce"> عرض الكل  </a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.branches.create')}}" data-i18n="nav.dash.crypto">أضافة
                    فرع جديد  </a>
                    </li>
                </ul>
            </li>
             <!-- End Branches -->

              <!-- start products -->
            <li class="nav-item">
                <a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">المنتجات   </span>
                    <span
                        class="badge badge badge-danger  badge-pill float-right mr-2">{{App\Models\Products::active()->count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('admin.products')}}"
                                          data-i18n="nav.dash.ecommerce"> عرض الكل  </a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.products.create')}}" data-i18n="nav.dash.crypto">أضافة
                    منتج جديد  </a>
                    </li>
                </ul>
            </li>
             <!-- End products -->

              <!-- Start customers -->
              <li class="nav-item"><a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main"> العملاء   </span>
                    <span
                        class="badge badge badge-success badge-pill float-right mr-2">{{App\Models\Customer::active()->count()}}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('admin.customers')}}"
                                          data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.customers.create')}}" data-i18n="nav.dash.crypto">أضافة
                             عميل جديد </a>
                    </li>
                </ul>
            </li>
            <!-- End customers -->

             <!-- Start delivery -->
             <li class="nav-item"><a href=""><i class="la la-male"></i>
                     <span class="menu-title" data-i18n="nav.dash.main">دليفريا  </span>
                     <span
                            class="badge badge badge-success badge-pill float-right mr-2">{{App\Models\Delivery::count()}}</span>
                     </a>
                     <ul class="menu-content">
                     <li class="active"><a class="menu-item" href="{{route('admin.delivery')}}"
                                                 data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                     </li>
                     <li><a class="menu-item" href="{{route('admin.delivery.create')}}" data-i18n="nav.dash.crypto">أضافة
                                   دليفري  </a>
                     </li>
                     </ul>
              </li>
             <!-- End delivery -->

               <!-- Start deliveries -->
               <li class="nav-item"><a href=""><i class="la la-male"></i>
                <span class="menu-title" data-i18n="nav.dash.main">اختار الدليفري  </span>
                <span
                       class="badge badge badge-success badge-pill float-right mr-2">{{App\Models\Delivery::count()}}</span>
                </a>
                <ul class="menu-content">
                <li class="active"><a class="menu-item" href="{{route('admin.choose-delivery')}}"
                                            data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                </li>
              
                </ul>
         </li>
        <!-- End deliveries -->
              <!-- Start orders -->
              <li class="nav-item"><a href=""><i class="la la-male"></i>
                     <span class="menu-title" data-i18n="nav.dash.main">طلبات  </span>
                     <span
                            class="badge badge badge-success badge-pill float-right mr-2">{{App\Models\Order::count()}}</span>
                     </a>
                     <ul class="menu-content">
                     <li class="active"><a class="menu-item" href="{{route('admin.orders')}}"
                                                 data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                     </li>
                     
                     </ul>
              </li>
             <!-- End orders -->

            
             
        </ul>
    </div>
</div>
