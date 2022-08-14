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
                @manager
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span key="t-ecommerce">Store</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('product.create') }}" key="t-add-product">Add Product</a></li>
                        <li><a href="{{ route('product.index') }}" key="t-products">Products</a></li>
                    </ul>
                </li>
                @endmanager
                @staff
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span key="t-ecommerce">Cashier</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="" key="t-add-product">Cashier</a></li>
                    </ul>
                </li>
                @endstaff

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>