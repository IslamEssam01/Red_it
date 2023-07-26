<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href={{ asset('css/general.css') }}>
    <link rel="stylesheet" href={{ asset('css/user/sidebar.css') }}>
    <link rel="stylesheet" href={{ asset('css/user/header.css') }}>

    <title>Red_it</title>
</head>

<body>
    @include('User.Includes.header')
    <div class="side-bar flex flex-col align-center ">




        <a href="#"> <img src={{ asset("storage/{$user->image}") }} alt="user image" class="user-img"></a>

        <a href="#" class="user-name">{{ $user->name }}</a>

        <div class="sidebar-posts flex flex-col ">
            <div class="flex justify-space-between">
                <p class="box-title">Recent Posts</p>
                <a href="#" class="box-link">See All</a>
            </div>

            <div class="sidebar-posts-box flex flex-col align-center">

                <div class="sidebar-post flex align-center">
                    <a href="#"><img src={{ asset('storage/images/user_img.jpg') }} alt="user image"
                            class="user-img-sm"></a>
                    <a href="#" class="sidebar-post-content">Lorem ipsum dolor, sit amet consectetur
                        adipisicing elit. Itaque
                        dicta totam nulla ea quas libero. Provident magnam animi officiis sint similique non eum
                        dolores amet repudiandae ipsum, vitae eaque consequatur?</a>
                </div>
                <div class="sidebar-post flex align-center">
                    <a href="#"><img src={{ asset('storage/images/user_img.jpg') }} alt="user image"
                            class="user-img-sm"></a>
                    <a href="#" class="sidebar-post-content">Lorem ipsum dolor, sit amet consectetur
                        adipisicing elit. Itaque
                        dicta totam nulla ea quas libero. Provident magnam animi officiis sint similique non eum
                        dolores amet repudiandae ipsum, vitae eaque consequatur?</a>
                </div>
                <div class="sidebar-post flex align-center">
                    <a href="#"><img src={{ asset('storage/images/user_img.jpg') }} alt="user image"
                            class="user-img-sm"></a>
                    <a href="#" class="sidebar-post-content">Lorem ipsum dolor, sit amet consectetur
                        adipisicing elit. Itaque
                        dicta totam nulla ea quas libero. Provident magnam animi officiis sint similique non eum
                        dolores amet repudiandae ipsum, vitae eaque consequatur?</a>
                </div>
                <div class="sidebar-post flex align-center">
                    <a href="#"><img src={{ asset('storage/images/user_img.jpg') }} alt="user image"
                            class="user-img-sm"></a>
                    <a href="#" class="sidebar-post-content">Lorem ipsum dolor, sit amet consectetur
                        adipisicing elit. Itaque
                        dicta totam nulla ea quas libero. Provident magnam animi officiis sint similique non eum
                        dolores amet repudiandae ipsum, vitae eaque consequatur?</a>
                </div>

            </div>
        </div>
        <div class="sidebar-posts flex flex-col ">
            <div class="flex justify-space-between">
                <p class="box-title">Liked Posts</p>
                <a href="#" class="box-link">See All</a>
            </div>

            <div class="sidebar-posts-box flex flex-col align-center">

                <div class="sidebar-post flex align-center">
                    <a href="#"><img src={{ asset('storage/images/user_img.jpg') }} alt="user image"
                            class="user-img-sm"></a>
                    <a href="#" class="sidebar-post-content">Lorem ipsum dolor, sit amet consectetur
                        adipisicing elit. Itaque
                        dicta totam nulla ea quas libero. Provident magnam animi officiis sint similique non eum
                        dolores amet repudiandae ipsum, vitae eaque consequatur?</a>
                </div>
                <div class="sidebar-post flex align-center">
                    <a href="#"><img src={{ asset('storage/images/user_img.jpg') }} alt="user image"
                            class="user-img-sm"></a>
                    <a href="#" class="sidebar-post-content">Lorem ipsum dolor, sit amet consectetur
                        adipisicing elit. Itaque
                        dicta totam nulla ea quas libero. Provident magnam animi officiis sint similique non eum
                        dolores amet repudiandae ipsum, vitae eaque consequatur?</a>
                </div>
                <div class="sidebar-post flex align-center">
                    <a href="#"><img src={{ asset('storage/images/user_img.jpg') }} alt="user image"
                            class="user-img-sm"></a>
                    <a href="#" class="sidebar-post-content">Lorem ipsum dolor, sit amet consectetur
                        adipisicing elit. Itaque
                        dicta totam nulla ea quas libero. Provident magnam animi officiis sint similique non eum
                        dolores amet repudiandae ipsum, vitae eaque consequatur?</a>
                </div>
                <div class="sidebar-post flex align-center">
                    <a href="#"><img src={{ asset('storage/images/user_img.jpg') }} alt="user image"
                            class="user-img-sm"></a>
                    <a href="#" class="sidebar-post-content">Lorem ipsum dolor, sit amet consectetur
                        adipisicing elit. Itaque
                        dicta totam nulla ea quas libero. Provident magnam animi officiis sint similique non eum
                        dolores amet repudiandae ipsum, vitae eaque consequatur?</a>
                </div>

            </div>
        </div>
        <div class="sidebar-posts flex flex-col ">
            <div class="flex justify-space-between">
                <p class="box-title">Your Posts</p>
                <a href="#" class="box-link">See All</a>
            </div>

            <div class="sidebar-posts-box flex flex-col align-center">

                <div class="sidebar-post flex align-center">
                    <a href="#" class="sidebar-post-content">Lorem ipsum dolor, sit amet consectetur
                        adipisicing elit. Itaque
                        dicta totam nulla ea quas libero. Provident magnam animi officiis sint similique non eum
                        dolores amet repudiandae ipsum, vitae eaque consequatur?</a>
                </div>
                <div class="sidebar-post flex align-center">
                    <a href="#" class="sidebar-post-content">Lorem ipsum dolor, sit amet consectetur
                        adipisicing elit. Itaque
                        dicta totam nulla ea quas libero. Provident magnam animi officiis sint similique non eum
                        dolores amet repudiandae ipsum, vitae eaque consequatur?</a>
                </div>
                <div class="sidebar-post flex align-center">

                    <a href="#" class="sidebar-post-content">Lorem ipsum dolor, sit amet consectetur
                        adipisicing elit. Itaque
                        dicta totam nulla ea quas libero. Provident magnam animi officiis sint similique non eum
                        dolores amet repudiandae ipsum, vitae eaque consequatur?</a>
                </div>
                <div class="sidebar-post flex align-center">

                    <a href="#" class="sidebar-post-content">Lorem ipsum dolor, sit amet consectetur
                        adipisicing elit. Itaque
                        dicta totam nulla ea quas libero. Provident magnam animi officiis sint similique non eum
                        dolores amet repudiandae ipsum, vitae eaque consequatur?</a>
                </div>

            </div>
        </div>


        <a href={{ route('logout') }}>Logout</a>


    </div>

</body>

</html>
