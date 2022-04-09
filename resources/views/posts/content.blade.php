@extends('main')
@section('content')
    <div class="container p-t-80">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
            <a href="/" class="stext-109 cl8 hov-cl1 trans-04">
                Home
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <a href="/danh-muc/{{ $post->menu->id }}-{{ Str::slug($post->menu->name) }}.html"
               class="stext-109 cl8 hov-cl1 trans-04">
                {{ $post->menu->name }}
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="stext-109 cl4">
				{{ $title }}
			</span>
        </div>
    </div>

    <section class="sec-post-detail bg0 p-t-65 p-b-60">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-7 p-b-30">
                    <div class="p-l-25 p-r-30 p-lr-0-lg">
                        <div class="wrap-slick3 flex-sb flex-w">
                            <div class="wrap-slick3-dots">
                                <ul class="slick3-dots" style="" role="tablist">
                                    <li class="slick-active" role="presentation">
                                        <img src="{{ $post->thumb }}">
                                        <div class="slick3-dot-overlay"></div>
                                    </li>
                                </ul>
                            </div>
                            <div class="wrap-slick3-arrows flex-sb-m flex-w">
                                <button class="arrow-slick3 prev-slick3 slick-arrow" style=""><i
                                        class="fa fa-angle-left" aria-hidden="true"></i></button>
                                <button class="arrow-slick3 next-slick3 slick-arrow" style=""><i
                                        class="fa fa-angle-right" aria-hidden="true"></i></button>
                            </div>

                            <div class="slick3 gallery-lb slick-initialized slick-slider slick-dotted">
                                <div class="slick-list draggable">
                                    <div class="slick-track" style="opacity: 1; width: 1539px;">
                                        <div class="item-slick3 slick-slide slick-current slick-active"
                                             data-thumb="images/product-detail-01.jpg" data-slick-index="0"
                                             aria-hidden="false"
                                             style="width: 513px; position: relative; left: 0px; top: 0px; z-index: 999; opacity: 1;"
                                             tabindex="0" role="tabpanel" id="slick-slide10"
                                             aria-describedby="slick-slide-control10">
                                            <div class="wrap-pic-w pos-relative">
                                                <img src="{{ $post->thumb }}" alt="IMG-PRODUCT">

                                                <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                                   href="images/product-detail-01.jpg" tabindex="0">
                                                    <i class="fa fa-expand"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-5 p-b-30">
                    <div class="p-r-50 p-t-5 p-lr-0-lg">

                        @include('admin.alert')

                        <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                            {{ $title }}
                        </h4>

                        <p class="stext-102 cl3 p-t-23">
                            {{ $post->description }}
                        </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bor10 m-t-50 p-t-43 p-b-40">
                <!-- Tab01 -->
                <div class="tab01">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item p-b-10">
                            <a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content p-t-43">
                        <!-- - -->
                        <div class="tab-pane fade show active" id="description" role="tabpanel">
                            <div class="how-pos2 p-lr-15-md">
                                <p class="stext-102 cl6">
                                    {!! $post->content !!}
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">

            <span class="stext-107 cl6 p-lr-25">
				Categories: {{ $post->menu->name }}
			</span>
        </div>
    </section>

    <section class="sec-relate-product bg0 p-t-45 p-b-105">
        <div class="container">
            <div class="p-b-45">
                <h3 class="ltext-106 cl5 txt-center">
                    Related Posts
                </h3>
            </div>

            @include('posts.list')
        </div>
    </section>



    @extends('layouts.app')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form action="{{route('posts.rating')}}" method="POST">
                            {{ csrf_field() }}
                            <div class="card">
                                <div class="container-fliud">
                                    <div class="wrapper row">
                                        <div class="details col-md-6">
                                            <h3 class="product-title">{{ $post->menu->name }}</h3>
                                            <div class="rating">
                                                <input id="input-1" name="rating" class="rating rating-loading" data-min="0" data-max="5" data-step="1" value="{{ $post->userAverageRating }}" data-size="xs">
                                                <input type="hidden" name="id" required="" value="{{ $post->id }}">
                                                <br/>
                                                <button class="btn btn-success">Submit Review</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




<table border="2">
    <h4>BÌNH LUẬN</h4>
    @include('posts.comments', [
        'comments' => $post->comments,
        'post_id' => $post->id,
        'users' => $users = App\Models\User::get(),
        ])
    <form action="{{route('comment.store')}}" method="post">
        @csrf
            <div class="form-group">
                <textarea class="form-control" name=body placeholder="Nhập bình luận"></textarea>
                <input type=hidden name=post_id value="{{ $post->id }}" />
            </div>
            <div class="form-group">
                <input type=submit class="btn btn-success" value="Bình luận"/>
            </div>
    </form>
</table>
<script type="text/javascript">
    $("#input-id").rating();
</script>
@endsection
