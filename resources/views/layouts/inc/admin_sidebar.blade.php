<div class="sidebar" data-color="purple" data-image="{{asset('admin/img/sidebar-4.jpg')}}">

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="/dashboard" class="simple-text">
                    
                    <img style="height:70px;width:180px; margin-left:10px;" src="{{asset('images/logo.png')}}" alt="">

                </a>
            </div>

            <ul class="nav">
                <li class="{{request()->is('dashboard') ? 'active' : ''}}">
                    <a href="/dashboard">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="{{request()->is('dashbord/user/{$id}') ? 'active' : ''}}">
                    <a href="/dashbord/user/{{Auth::user()->id}}">
                        <i class="pe-7s-user"></i>
                        <p>User Profile</p>
                    </a>
                </li>
                @if(Auth::user()->role_as == 1)
                <li class="{{request()->is('dashbord/users') ? 'active' : ''}}">
                    <a href="/dashbord/users">
                        <i class="pe-7s-users"></i>
                        <p>Users List</p>
                    </a>
                </li>
                @endif
                <li class="{{request()->is('categories') ? 'active' : ''}}">
                    <a href="/categories">
                        <i class="pe-7s-car"></i>
                        <p>Categories</p>
                    </a>
                </li>
                <li class="{{request()->is('categories/create') ? 'active' : ''}}">
                    <a href="/categories/create">
                        <i class="pe-7s-car"></i>
                        <p>Add Categories</p>
                    </a>
                </li>
                <li class="{{request()->is('products') ? 'active' : ''}}">
                    <a href="/products">
                        <i class="pe-7s-car"></i>
                        <p>Products</p>
                    </a>
                </li><li class="{{request()->is('products/create') ? 'active' : ''}}">
                    <a href="/products/create">
                        <i class="pe-7s-car"></i>
                        <p>Add Products</p>
                    </a>
                </li>
               
            </ul>
    	</div>
    </div>