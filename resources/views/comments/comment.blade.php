@if(Auth::check())
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{ route('comments.store') }}" class="mb-0">
                @csrf

                <div class="mt-4" id="comment">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="article_id" value="{{ $article->id }}">
                    <textarea id="comment" type="text" name="comment" class="form-control @error('comment') is-invalid @enderror" rows="3" placeholder="コメントを入力できます ※100文字以内">{{ old('comment') }}</textarea>
                    @error('comment')
                    <span class="invalid-feedback" role="alert">
                        <strong>
                            {{ $message }}
                        </strong>
                    </span>
                    @enderror
                </div>
                <div class="mt-2">
                    <button class="btn btn-block deep-orange lighten-1 rounded-pill mt-4 text-white shadow-none" title="更新" type="submit">
                        コメント投稿
                        <i class="fas fa-arrow-right text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="mb-2">
                <div class="border-bottom mt-3 deep-orange-text" id="comment-list" style="font-size: 16px;">
                    <i class="fas fa-comment mr-1"></i>
                    コメント
                </div>

                @forelse($article->comments as $comment)

                <div class="d-flex">
                    <span>
                        <a class="dropdown-item text-dark px-0 d-flex align-items-center" href="{{ route('users.show', ['name' => $comment->user->name]) }}" style="text-decoration: none;">
                            @if (!empty($comment->user->avatar_file_name))
                            <img src="{{ asset('https://portfolio-s3-backe.s3.ap-northeast-1.amazonaws.com/avatars/' . $comment->user->avatar_file_name) }}" class="rounded-circle" style="object-fit: cover; width: 20px; height: 20px;">
                            @else
                            <img src="/images/avatar-default.svg" class="rounded-circle" style="object-fit: cover; width: 20px; height: 20px;">
                            @endif
                        </a>
                    </span>
                    <a class="text-dark d-flex align-items-center ml-1" href="{{ route('users.show', ['name' => $comment->user->name]) }}" style="text-decoration: none;">
                        {{ $comment->user->name }}
                    </a>
                    <span class="small d-flex align-items-center ml-2 grey-text" style="text-decoration: none;">
                        {{ $comment->created_at->format('Y/m/d H:i') }}
                    </span>

                    @if( Auth::id() === $comment->user_id )

                    <div class="ml-auto d-flex align-items-center card-text">
                        <form method="POST" class="mb-0" action="{{ route('comments.destroy', ['comment' => $comment] )}}">
                            @csrf
                            @method('DELETE')

                            <button class="btn text-danger rounded-pill shadow-none border-0 m-0 p-1" type="submit">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </div>
                    @endif

                </div>
                <div class="text-dark">
                    {!! nl2br(e( $comment->comment )) !!}
                </div>
                <hr class="mb-0 mt-2">

                @empty
                <div class="text-dark">コメントはありません</div>

                @endforelse

            </div>
        </div>
    </div>
</div>
