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
                        <input type="search" name="q" placeholder="Tìm kiếm bài viết" value="">
                    </form>
                </th>
                <th>
                    <i class="fas fa-search"></i>
                </th>
            </table>
            @if (Auth::check())
                <div class="right-top-bar flex-w h-full">
                    <form action="{{route('bookmark.index')}}" method="POST" class="flex-c-m trans-04 p-lr-25">
                        {{ csrf_field() }}
                        @php
                            $title = 'Bookmark ' . Auth::user()->name;
                        @endphp
                        <input type="hidden" name="title" value="{{$title}}"/>
                            <button style="background-color:aliceblue">
                                <i class="fas fa-book"></i>
                                Bookmark
                            </button>
                        </a>
                    </form>
                </div>
                <div class="right-top-bar flex-w h-full">
                    <a href="{{route('logout')}}" class="flex-c-m trans-04 p-lr-25">
                        <i class="fas fa-remove"></i>
                        Đăng xuất
                    </a>
                </div>
            @endif
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
