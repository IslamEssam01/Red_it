@extends('Layouts.guest')



@section('content')
    <main style="width: 100vw;" class="main ">

        <div class="posts flex flex-col container ">
            @foreach ($posts->reverse() as $key => $post)
                <div class="post-box">
                    <div class="user-info flex align-center">
                        <a href="#"><img src={{ asset("storage/{$post->user->image}") }} alt="user image"
                                class="post-user-img"></a>
                        <div class="post-details flex flex-col">
                            <a href="#">
                                <p class="post-user-name">{{ $post->user->name }}</p>
                            </a>
                            <p class="created-at">Created at : {{ $post->created_at }}</p>
                        </div>
                    </div>
                    <div class="dropdown-box">
                        <div class="dropdown">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6 post-ellipsis">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                            </svg>
                            <div class="dropdown-content display-none">
                                <button class="dropdown-btn copy-post-btn">copy post</button>
                                <button class="dropdown-btn">copy link</button>
                            </div>
                        </div>
                    </div>
                    <div class="content-box">

                        @if (preg_match('/\p{Arabic}/u', mb_substr($post->content, 0, 1)))
                            <p dir="rtl" class="content">{{ $post->content }}</p>
                        @else
                            <p dir="ltr" class="content">{{ $post->content }}</p>
                        @endif
                    </div>

                    <div class="post-actions flex">

                        <form action={{ route('post.likeGuest', $post->id) }} method="GET" class="display-none"
                            id="like-form{{ $key }}">
                            @csrf
                        </form>
                        <button form="like-form{{ $key }}" title="like" class="like-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6 action-icon ">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6.633 10.5c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 012.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 00.322-1.672V3a.75.75 0 01.75-.75A2.25 2.25 0 0116.5 4.5c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 01-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 00-1.423-.23H5.904M14.25 9h2.25M5.904 18.75c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 01-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 10.203 4.167 9.75 5 9.75h1.053c.472 0 .745.556.5.96a8.958 8.958 0 00-1.302 4.665c0 1.194.232 2.333.654 3.375z" />
                            </svg>

                        </button>
                        <form action="{{ route('post.dislikeGuest', $post->id) }} "method="GET" class="display-none"
                            id="dislike-form{{ $key }}">
                            @csrf
                        </form>
                        <button form="dislike-form{{ $key }}" title="dislike" class="dislike-btn"><svg
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6 action-icon ">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M7.5 15h2.25m8.024-9.75c.011.05.028.1.052.148.591 1.2.924 2.55.924 3.977a8.96 8.96 0 01-.999 4.125m.023-8.25c-.076-.365.183-.75.575-.75h.908c.889 0 1.713.518 1.972 1.368.339 1.11.521 2.287.521 3.507 0 1.553-.295 3.036-.831 4.398C20.613 14.547 19.833 15 19 15h-1.053c-.472 0-.745-.556-.5-.96a8.95 8.95 0 00.303-.54m.023-8.25H16.48a4.5 4.5 0 01-1.423-.23l-3.114-1.04a4.5 4.5 0 00-1.423-.23H6.504c-.618 0-1.217.247-1.605.729A11.95 11.95 0 002.25 12c0 .434.023.863.068 1.285C2.427 14.306 3.346 15 4.372 15h3.126c.618 0 .991.724.725 1.282A7.471 7.471 0 007.5 19.5a2.25 2.25 0 002.25 2.25.75.75 0 00.75-.75v-.633c0-.573.11-1.14.322-1.672.304-.76.93-1.33 1.653-1.715a9.04 9.04 0 002.86-2.4c.498-.634 1.226-1.08 2.032-1.08h.384" />
                            </svg>
                        </button>
                        <button title="comments" class="comments-btn"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 action-icon">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                            </svg>
                        </button>
                    </div>

                </div>
                <div class="comments-modal-box flex flex-col display-none">
                    <div class="comments-modal flex flex-col ">

                        <div class="comments flex flex-col">
                            @foreach ($post->comments as $comment)
                                <div class="comment flex align-center">
                                    <a href="#" class="comment-user-link"><img
                                            src={{ asset("storage/{$comment->user->image}") }} alt="user image"
                                            class="comment-user-img"></a>
                                    <div class="comment-box flex flex-col">
                                        <a href="#" class="commenter-name">{{ $comment->user->name }}</a>

                                        @if (preg_match('/\p{Arabic}/u', mb_substr($comment->content, 0, 1)))
                                            <p dir="rtl" class="comment-content">{{ $comment->content }}</p>
                                        @else
                                            <p dir="ltr" class="comment-content">{{ $comment->content }}</p>
                                        @endif
                                    </div>
                                    <div class="comment-ellipsis dropdown">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor"
                                            class="w-6 h-6 comment-ellipsis-icon display-none">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                        </svg>
                                        <div class="dropdown-content comment-dropdown display-none">
                                            <button class="dropdown-btn copy-comment-btn">copy comment</button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                    </div>

                    <form action={{ route('post.addComment', $post->id) }} id="comment-form{{ $key }}"
                        class="flex comment-form" method="GET">
                        @csrf
                        <input type="text" name="content" id="comment" class="comment-input"
                            placeholder="Enter Comment" required>
                        <button class="add-comment-btn">Add Comment</button>
                    </form>
                </div>
            @endforeach
        </div>
    </main>

    <script src={{ asset('js/post.js') }}></script>
@endsection
