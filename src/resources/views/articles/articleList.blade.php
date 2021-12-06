<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card mt-3 shadow-none" style="border-radius: 1rem">
            <div class="card-body d-flex pt-3 pb-3 pl-3 pr-3 border-bottom">
                <a class="mr-1 d-flex align-items-center" href="{{ route('users.show', ['name' => $article->user->name]) }}" style="text-decoration: none;">
                    @if (!empty($article->user->avatar_file_name))
                    <img src=" /storage/avatars/{{$article->user->avatar_file_name}}" class="rounded-circle" style="object-fit: cover; width: 33px; height: 33px;">
                    @else
                    <img src="/images/avatar-default.svg" class="rounded-circle" style="object-fit: cover; width: 33px; height: 33px;">
                    @endif
                </a>

                <div class="font-weight-bold text-dark d-flex align-items-center ml-2" style="font-size: 16px">
                    {{ $article->user->name }}
                </div>

                @if( Auth::id() === $article->user_id )
                <!-- dropdown -->
                <div class="ml-auto d-flex align-items-center card-text">
                    <div class="dropdown">

                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <button type="button" class="btn btn-link text-muted m-0 p-2">
                                <i class="fas fa-ellipsis-h"></i>
                            </button>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item text-dark" href="{{ route('articles.edit', ['article' => $article]) }}">
                                <i class="fas fa-edit mr-2"></i>投稿を編集する
                            </a>

                            <div class="dropdown-divider"></div>

                            <a class="dropdown-item text-danger" data-toggle="modal" data-target="#modal-delete-{{ $article->id }}">
                                <i class="fas fa-trash-alt mr-2"></i>投稿を削除する
                            </a>
                        </div>
                    </div>
                </div>
                <!-- dropdown -->

                <!-- modal -->
                <div id="modal-delete-{{ $article->id }}" class="modal fade" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header font-weight-bold deep-orange lighten-1 text-center pb-3 pt-3">

                                <span class="text-white" style="font-size: 18px">
                                    <i class="fas fa-trash-alt text-white mr-1" style="font-size: 20px"></i>
                                    DELETE POST
                                </span>

                                <button type=" button" class="close text-white" data-dismiss="modal" aria-label="閉じる">
                                    <span aria-hidden="true">&times;</span>
                                </button>

                            </div>

                            <form method="POST" action="{{ route('articles.destroy', ['article' => $article]) }}">
                                @csrf
                                @method('DELETE')

                                <div class="modal-body">
                                    {{ $article->title }}
                                </div>

                                <div class="modal-body text-danger">
                                    <i class="far fa-hand-point-up mr-1" style="font-size: 18px"></i>
                                    本当に削除してもよろしいですか？
                                </div>

                                <div class="modal-footer justify-content-between btn-group">
                                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">
                                        <i class="fas fa-backspace mr-1"></i>
                                        キャンセル
                                    </button>

                                    <button type="submit" class="btn btn-outline-danger">
                                        <i class="fas fa-trash-alt mr-1"></i>
                                        削除する
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                @endif
                <!-- modal -->

            </div>
            <div class="jumbotron jumbotron-fluid shadow-none p-0 m-0">
                @if (!empty($article->image_file_name))
                <img src="/storage/article_img/{{$article->image_file_name}}" class="" width="100%">
                @else
                <img src="/images/image-default.png" class="" width="100%">
                @endif
            </div>

            <div class="col-md-12 p-3">

                @include('articles.articleTag')

                <div class="text-truncate" style="max-width: 250px;">
                    <a class="text-dark card-title h5 mb-3" style="text-decoration: none;" href="{{ route('articles.show', ['article' => $article]) }}">
                        {{ $article->title }}
                    </a>
                </div>

                <div class="font-weight-lighter grey-text small">
                    <span>
                        {{ $article->category->prefecture }}
                    </span>

                    <span class="ml-1">
                        {{ $article->created_at->format('Y/m/d H:i') }}
                    </span>
                </div>

                <div class="text-truncate text-muted mt-2" style="max-width: 300px;">
                    {{ $article->summary }}
                </div>

                @include('articles.like')

                <details class="mt-2">
                    <summary class="deep-orange-text" style="font-size:18px;">
                        Comment
                    </summary>
                    @include('comments.comment')
                </details>

            </div>
        </div>
    </div>
</div>
