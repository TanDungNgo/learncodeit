<div class="row isotope-grid">
    @foreach($posts as $key => $post)
        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
            <!-- Block2 -->
            
            <div class="block2">
                <div class="block2-pic hov-img0">
                    <img src="{{ $post->thumb }}" alt="{{ $post->name }}">
                </div>

                <div class="block2-txt flex-w flex-t p-t-14">
                    <div class="block2-txt-child1 flex-col-l ">
                        <a href="/bai-viet/{{ $post->id }}-{{ Str::slug($post->name, '-') }}.html"
                           class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                            {{ $post->name }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
