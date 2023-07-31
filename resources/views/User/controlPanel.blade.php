@extends('Layouts.main')

@section('content')
    <main>
        <div class="flex flex-col container panel">
            <div class="flex info panel-section">
                <form id="info-form" action={{ route('userEdit.updateInfo', $user->id) }} method="POST"
                    class="form form-info flex margin-right-md">
                    @csrf
                    @method('PUT')
                    <input type="email" name="email" id="email" value="{{ $user->email }}" class="disabled" disabled
                        required>
                    <input type="text" name="name" id="name" value="{{ $user->name }}" class="disabled"
                        disabled required>

                </form>
                <button form="info-form" class="save-btn hide margin-right-md">Save</button>
                <button class="enable-btn">Edit Information</button>
            </div>

            <div class="flex password-change panel-section">

                <button class="change-password-btn margin-right-md">Change Password</button>

                <div class="flex password-change-hidden hide">
                    <form id="change-password-form" class="form form-change-password flex "
                        action={{ route('userEdit.updatePassword', $user->id) }} method="POST">
                        @csrf
                        @method('PUT')
                        <input type="password" name="password" id="passwordChange" placeholder="New Password"
                            class="control-panel-input" required>

                    </form>

                    <button form="change-password-form" class="confirm-password confirm-btn ">Confirm</button>
                    <button class="cancel-password-change cancel-btn ">Cancel</button>
                </div>
            </div>

            <div class="flex change-img panel-section align-center">
                <img class="showUserImg margin-right-md" src="{{ asset("storage/{$user->image}") }}" alt="your image" />
                <form action={{ route('userEdit.updateImage', $user->id) }} id="change-img-form"
                    enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')
                    <label for="img" class="change-img-btn">Change image</label>
                    <input type="file" name="image" id="img" class="user-img display-none control-panel-input">
                </form>

                <button form="change-img-form" class="confirm-img-change confirm-btn hide">Confirm</button>
                <button class="cancel-img-change cancel-btn hide">Cancel</button>
            </div>


            <form action={{ route('userEdit.delete', $user->id) }} method="POST" class="delete-account-form"
                onsubmit="return confirm('Are you sure you want to delete the account? this cannot be undone')">
                @csrf
                @method('DELETE')
                <button class="delete-account-btn">Delete Account</button>
            </form>

            <a href={{ route('logout') }} class="logout-btn">Logout</a>
        </div>

    </main>
    {{-- <script src={{ asset('js/searchModal.js') }}></script> --}}
    <script src={{ asset('js/controlPanel.js') }}></script>
@endsection
