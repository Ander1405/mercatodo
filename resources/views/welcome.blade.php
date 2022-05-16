<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mercatodo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                }
            }
        }
    </script>
</head>
<body class="bg-gray-200">
<div class="grid grid-cols-1 md:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7">
    <div class="mt-8 px-6">
        <img src="https://cdn2.iconfinder.com/data/icons/cashless-payment-society/291/cashless-payment-005-256.png" alt="" class="w-14 h-14 mr-8 rounded-lg">
    </div>
    <div class="px-52">
    <h1 class="mt-8 font-semibold text-4xl">Mercatodo</h1>
    </div>
    <div class="mt-8 flow-root flex gap-8">
        <a href="{{ route('register') }}" class="float-right"><img src="https://cdn0.iconfinder.com/data/icons/cosmetic-store/25/Register-256.png" alt="" class="w-12 h-12 mr-8 rounded-lg"></a>
        <a href="{{ route('login') }}" class="float-right "><img src="https://cdn1.iconfinder.com/data/icons/materia-arrows-symbols-vol-8/24/018_319_door_enter_login_signin-512.png" alt="" class=" w-12 h-12 mr-4 rounded-lg"></a>
    </div>
</div>

<div id="carouselExampleCaptions" class="mt-6 carousel slide relative" data-bs-ride="carousel">
    <div class="carousel-indicators absolute right-0 bottom-0 left-0 flex justify-center p-0 mb-4">
        <button
            type="button"
            data-bs-target="#carouselExampleCaptions"
            data-bs-slide-to="0"
            class="active"
            aria-current="true"
            aria-label="Slide 1"
        ></button>
        <button
            type="button"
            data-bs-target="#carouselExampleCaptions"
            data-bs-slide-to="1"
            aria-label="Slide 2"
        ></button>
        <button
            type="button"
            data-bs-target="#carouselExampleCaptions"
            data-bs-slide-to="2"
            aria-label="Slide 3"
        ></button>
        <button
            type="button"
            data-bs-target="#carouselExampleCaptions"
            data-bs-slide-to="3"
            aria-label="Slide 4"
        ></button>
    </div>
    <div class="px-6 carousel-inner relative w-full overflow-hidden">
        <div class="carousel-item active relative float-left w-full">
            <img
                src="https://s3.amazonaws.com/businessinsider.mx/wp-content/uploads/2021/12/08164547/Comparacio%CC%81n-de-consolas.jpg"
                class="block w-full"
                alt="..."
            />
            <div class="carousel-caption hidden md:block absolute text-center">
                <h5 class="text-xl">Consolas</h5>
                <p>Sumergete en el mundo de las consolas y video juegos</p>
            </div>
        </div>
        <div class="carousel-item relative float-left w-full">
            <img
                src="https://www.globbit.com/wp-content/uploads/2019/06/MacBook-Pro-15.jpg"
                class="block w-full"
                alt="..."
            />
            <div class="carousel-caption hidden md:block absolute text-center">
                <h5 class="text-xl">Ordenadores</h5>
                <p>Todo acerca de portatiles y Pc´s de mesa</p>
            </div>
        </div>
        <div class="carousel-item relative float-left w-full">
            <img
                src="https://i0.wp.com/hipertextual.com/wp-content/uploads/2021/03/iphone-13-2.png?fit=1200%2C580&quality=50&strip=all&ssl=1"
                class="block w-full"
                alt="..."
            />
            <div class="carousel-caption hidden md:block absolute text-center">
                <h5 class="text-xl">Telefonos celulares</h5>
                <p>Vive una experiencia unica con la variedad de moviles que tenemos para tí</p>
            </div>
        </div>
        <div class="carousel-item relative float-left w-full">
            <img
                src="https://cloudfront-us-east-1.images.arcpublishing.com/infobae/Q5KFDOELN5BLVEXTEKERKZPTWE.jpg"
                class="block w-full"
                alt="..."
            />
            <div class="carousel-caption hidden md:block absolute text-center">
                <h5 class="text-xl">Accesorios tecnologicos</h5>
                <p>Manejamos todo tipo de accesorios para tus equipos</p>
            </div>
        </div>
    </div>
    <button
        class="carousel-control-prev absolute top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline left-0"
        type="button"
        data-bs-target="#carouselExampleCaptions"
        data-bs-slide="prev"
    >
        <span class="carousel-control-prev-icon inline-block bg-no-repeat" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button
        class="carousel-control-next absolute top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline right-0"
        type="button"
        data-bs-target="#carouselExampleCaptions"
        data-bs-slide="next"
    >
        <span class="carousel-control-next-icon inline-block bg-no-repeat" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<div class="mt-6 text-center">
    <h1 class="font-semibold text-4xl">Acerca de nosotros</h1>
    <br>
    <p class="text-2xl">Somos una compañia lider en el mercado tecnologico donde nuestra intension es darle la mejor experiencia de calidad y de compra a nuestros clientes
        <br>
        ya que nuestros clientes son nuestra mayor prioridad, Encuentra con Nosotros PC Gamers, Accesorios,Celulares y Portatiles, y todo para todo tipo de publico,
        <br>
        trabajamos a nivel nacional para entregar lo mejor en rendimiento del Pais y con el mejor conocimiento y soporte avanzado. </p>

</div>
<div class="px-6 mt-12">
    <div class="grid gap-4 grid-cols-3">
        <div class="transition duration-300 bg-gray-300 hover:bg-gray-500 rounded-lg bg-gray-300" >
            <h1 class="text-2xl text-center font-semibold">
                Contacto:
            </h1>
            <p class="text-2xl text-center">soporte@mercatodo.com
                <br>
            3042264578</p>
        </div>
        <div class="transition duration-300 bg-gray-300 hover:bg-gray-500 rounded-lg bg-gray-300">
            <h1 class=" text-2xl text-center font-semibold">Siguenos en redes:</h1>
            <div class="flex justify-center ">
                <div>
                    <img src="https://cdn0.iconfinder.com/data/icons/social-media-2349/69/Asset_25-256.png" alt="" class="w-12 h-12 mr-4 rounded-full">
                </div>
                <div>
                    <img src="https://cdn0.iconfinder.com/data/icons/social-flat-rounded-rects/512/facebook-256.png" alt="" class="w-12 h-12 mr-4 rounded-full">
                </div>
                <div>
                    <img src="https://cdn0.iconfinder.com/data/icons/social-media-circle-6/1024/instagram-256.png" alt="" class="w-12 h-12 rounded-full">
                </div>
            </div>
        </div>
        <div class="transition duration-300 bg-gray-300 hover:bg-gray-500 rounded-lg bg-gray-300">
            <h1 class="text-2xl text-center font-semibold">Sedes Medellín</h1>
            <p class="text-2xl text-center">Cra. 43 B # 12 - 107
                <br>
                Cra. 48 #10-45
            </p>
        </div>
    </div>
</div>
<div class="mt-12">
    <h3 class="text-sm text-center">Copyright &copy; Anderson Cardona Ortiz 2022</h3>
</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>

</html>

