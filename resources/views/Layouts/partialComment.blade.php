<div class="comment flex align-center">
    <a href="#" class="comment-user-link"><img src={{ asset("storage/{$user->image}") }} alt="user image"
            class="comment-user-img"></a>
    <div class="comment-box flex flex-col">
        <a href="#" class="commenter-name">{{ $user->name }}</a>

        @if (preg_match('/\p{Arabic}/u', mb_substr($commentContent, 0, 1)))
            <p dir="rtl" class="comment-content">{{ $commentContent }}</p>
        @else
            <p dir="ltr" class="comment-content">{{ $commentContent }}</p>
        @endif
    </div>
    <div class="comment-ellipsis dropdown">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="w-6 h-6 comment-ellipsis-icon display-none">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
        </svg>
        <div class="dropdown-content comment-dropdown display-none">
            <button class="dropdown-btn copy-comment-btn">copy comment</button>

            <button onclick="return alert('Cannot delete a comment you just made')" class="dropdown-btn">Delete
                comment</button>
        </div>
    </div>
</div>
