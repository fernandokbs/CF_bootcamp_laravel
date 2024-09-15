<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/js/app.js')
</head>

<body>
    <div class="container">
        <div class="row">

            <div>
                <div class="w-full">
                    <img src="https://fastly.picsum.photos/id/1012/3973/2639.jpg?hmac=s2eybz51lnKy2ZHkE2wsgc6S81fVD1W2NKYOSh8bzDc"
                        alt="Descripción de la imagen">
                </div>

                <h1
                    class="text-center mb-6 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl">
                    Productos disponibles para tu compañero de vida</h1>
            </div>

            <div class="grid grid-cols-4 gap-4">

                @foreach ($products as $product)
                    <div class="max-w-sm rounded overflow-hidden shadow-lg">
                        <img class="w-full" src="{{ asset('storage/' . $product->image) }}"
                            alt="Sunset in the mountains">
                        <div class="px-6 py-4">
                            <p class="text-sm text-gray-600 flex items-center">{{ $product->brand }}</p>
                            <div class="font-bold text-xl mb-2">{{ $product->name }}</div>
                            <p class="text-gray-700 text-base">
                                {{ $product->description }}
                            </p>
                            <p>{{ $product->price }}</p>
                        </div>
                        <div class="px-6 pt-4 pb-2">
                            <button type="button"
                                class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"><svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 576 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path
                                        d="M0 24C0 10.7 10.7 0 24 0L69.5 0c22 0 41.5 12.8 50.6 32l411 0c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3l-288.5 0 5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5L488 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-288.3 0c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5L24 48C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
                                </svg></button>
                        </div>
                    </div>
                @endforeach
            </div>

            <nav class="flex items-center flex-column flex-wrap md:flex-row justify-between my-16"
                aria-label="Table navigation">
                {{ $products->links() }}
            </nav>

















        </div>
    </div>


</body>

</html>
