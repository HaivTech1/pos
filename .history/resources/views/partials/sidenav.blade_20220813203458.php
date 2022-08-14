<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                @admin
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span key="t-ecommerce">Site Management</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('setting.index') }}" key="t-products">Setting</a></li>
                        <li><a href="{{ route('user.index') }}" key="t-products">Users</a></li>
                        <li><a href="{{ route('teams.index') }}" key="t-products">Team</a></li>
                        <li><a href="{{ route('task.index') }}" key="t-products">Task</a></li>
                    </ul>
                </li>
                @endadmin
                @staff
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span key="t-ecommerce">Cashier</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('property.create') }}" key="t-add-product">Sell</a></li>
                    </ul>
                </li>
                @endstaff
                @manager
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span key="t-ecommerce">Ecommerce</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('product.create') }}" key="t-add-product">Add Product</a></li>
                        <li><a href="{{ route('product.index') }}" key="t-products">Products</a></li>
                        <li><a href="{{ route('order.index') }}" key="t-orders">Orders</a></li>
                    </ul>
                </li>
                @endmanager
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>