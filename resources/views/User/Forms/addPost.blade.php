@extends('Layouts.user')

@section('content')
    <div class="form-box flex flex-col container">
        <form action={{ route('addPost') }} class="form flex flex-col" method="POST">
            @csrf
            <h1 class="form-header">Add Post</h1>
            <textarea name="content" name="content" id="content" cols="50" rows="15" required></textarea>

            <button class="add-post-btn">Add Post</button>

        </form>
    </div>
@endsection
