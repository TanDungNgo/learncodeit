@extends('main')

@section('content')

    <div class="sec-banner bg0 p-t-80 p-b-50">
    </div>

    <!-- Post -->
    <section class="bg0 p-t-23 p-b-140">
        <div class="container">
            <div class="p-b-10">
                <h3 class="ltext-103 cl5">
                    All Posts
                </h3>
            </div>
            <div id="loadProduct">
                @include('posts.list')
            </div>
        </div>
    </section>


    <!-- category -->
    <div class="sec-banner bg0 p-t-80 p-b-50">
        <div class="container">
            <div class="p-b-10">
                <h3 class="ltext-103 cl5">
                    All Category
                </h3>
            </div>
            <div class="row">
                @foreach($menus as $menu)
                    <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
                        <!-- Block1 -->
                        <div class="block1 wrap-pic-w">
                            <img src="/template/images/icons/icon-danhmuc.png" alt="IMG-BANNER">

                            <a href="/danh-muc/{{ $menu->id }}-{{ \Str::slug($menu->name, '-') }}.html" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                                <div class="block1-txt-child1 flex-col-l">
                            <span class="block1-name ltext-102 trans-04 p-b-8">
                                {{ $menu->name }}
                            </span>
                                </div>

                                <div class="block1-txt-child2 p-b-4 trans-05">
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
