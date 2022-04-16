<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"></script>

@foreach($comments as $comment)
    <table border="1" width="100%">
        <th width="20%">
            @foreach ($users as $user)
                @if ($user->id === $comment->user_id )
                    {{ $user->name }}
                @endif
            @endforeach
        </th>
        <th>
            {{ $comment->body }}
            <br>
            <table>
                @php
                    $sum = 0;
                    foreach ($likes as $key => $like) {

                            if ($like->like == 0 && $like->comment_id == $comment->id) {
                                $sum = $sum + 1;
                            }
                            if ($like->like == 1 && $like->comment_id == $comment->id){
                                $sum = $sum - 1;
                            }
                    }
                    echo $sum;
                @endphp
                <tr>
                    <form action="{{ route('comments.like') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <i class="fa-solid fa-thumbs-up"></i>
                        <button  name ="like" value="0"> Up </button>
                    </form>
                    <form action="{{ route('comments.dislike') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <i class="fa-solid fa-thumbs-down"></i>
                        <button  name ="like" value="1"> Down </button>
                    </form>
                </tr>
            </table>

        </th>
    </table>
@endforeach


