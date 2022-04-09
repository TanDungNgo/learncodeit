<header>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<div class="container-menu-desktop">
    <!-- Topbar -->
	<div class="top-bar">
        <div class="content-topbar flex-sb-m h-full container">
            @if (Auth::check())
                <div class="right-top-bar flex-w h-full">
                    <a href="/admin/" class="flex-c-m trans-04 p-lr-25">
                        <i class="fas fa-user"></i>
                        @php
                        $name = Auth::user()->name;
                        @endphp
                        {{$name}}
                    </a>
                </div>
            @else
            <div class="right-top-bar flex-w h-full">
            	<a href="/admin/users/login" class="flex-c-m trans-04 p-lr-25">
                    <i class="fas fa-user"></i>
					Đăng nhập
				</a>
			</div>
            @endif
            <table>
                <th> Search </th>
                <th>
                    <form action="">
                        <input type="search" name="q" placeholder="Tìm kiếm bài viết" >
                    </form>
                </th>
                <th>
                    <i class="fas fa-search"></i>
                </th>
            </table>
		</div>
	</div>

    <div class="wrap-menu-desktop">
        <nav class="limiter-menu-desktop container">

            <!-- Logo desktop -->
            <a href="#" class="logo">
                <img src="/template/images/icons/logo.png" alt="IMG-LOGO">
            </a>

            <!-- Menu desktop -->
            <div class="menu-desktop">
                <ul class="main-menu">
                    <li class="active-menu"><a href="/">Trang Chủ</a> </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
</header>
