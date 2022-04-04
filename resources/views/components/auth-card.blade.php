
<section class="flex md:flex-row h-screen items-center">
    <div class="bg-purple-600 hidden md:block w-full md:w-1/2 lg:w-2/3 h-screen">
        <img src="https://www.bycomercial.com/wp-content/uploads/2020/02/posts-Byc-36.jpg" alt="" class="w-full h-full object-cover">
    </div>

    <div class="bg-white w-full md:max-w-md lg:max-w-full md:mx-auto md:mx-0 md:w-1/2 lg:w-1/3 h-screen px-6 lg:px-16 xl:px-12
        flex items-center justify-center">
        <div class="w-full h-100">
            {{ $slot }}
        </div>
    </div>
</section>
