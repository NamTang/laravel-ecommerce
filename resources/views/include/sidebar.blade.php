<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Orders</li>
            <li class="nav-item">
                <a href="{{route('dashboard')}}" class="nav-link"><i class="fas fa-fire"></i><span>List</span></a>
            </li>
            <li class="menu-header">Product</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Category</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{route('category')}}">List Category</a></li>
                    <li><a class="nav-link" href="{{route('add_category')}}">Add Category</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Product</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{route('product')}}">List Product</a></li>
                    <li><a class="nav-link" href="{{route('add_product')}}">Add Product</a></li>
                </ul>
            </li>
        </ul>
    </aside>
</div>
