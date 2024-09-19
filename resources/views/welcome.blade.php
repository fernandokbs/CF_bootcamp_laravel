<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="icon" type="icon" href="assets/images/favicon.png" />
    <title>Home page</title>
    @vite('resources/js/app.js')

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('build/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('build/css/styles.css') }}">


    <style>
        #img-principal {
            background-image: url('https://fastly.picsum.photos/id/1012/3973/2639.jpg?hmac=s2eybz51lnKy2ZHkE2wsgc6S81fVD1W2NKYOSh8bzDc');
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            height: 40vh;
        }
    </style>

</head>

<body>
    <!-- Header -->
    <header class="bg-gray-dark sticky top-0 z-50">
        <div class="container mx-auto flex justify-between items-center py-4">
            <!-- Left section: Logo -->
            <a href="index.html" class="flex items-center">
                <div>
                    <img src="{{ asset('build/images/template-logo-nav.jpeg') }}" alt="Logo"
                        class="h-14 w-auto mr-4">
                </div>
            </a>

            <!-- Center section: Menu -->
            <nav class="hidden lg:flex md:flex-grow justify-center">
                <ul class="flex justify-center space-x-4 text-white">
                    <li><a href="index.html" class="hover:text-secondary font-semibold">Home</a></li>

                    <!-- Men Dropdown -->
                    <li class="relative group" x-data="{ open: false }">
                        <a href="shop.html" @mouseover="open = true" @mouseleave="open = false" href="#"
                            class="hover:text-secondary font-semibold flex items-center">
                            Men
                            <i
                                :class="open ? 'fas fa-chevron-up ml-1 text-xs' : 'fas fa-chevron-down ml-1 text-xs'"></i>
                        </a>
                        <ul x-show="open" @mouseover="open = true" @mouseleave="open = false"
                            class="absolute left-0 bg-white text-black space-y-2 mt-1 p-2 rounded shadow-lg"
                            x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-100"
                            x-transition:leave-start="opacity-100 scale-100"
                            x-transition:leave-end="opacity-0 scale-90">
                            <li><a href="shop.html"
                                    class="min-w-40 block px-4 py-2 hover:bg-primary hover:text-white rounded">Men Item
                                    1</a></li>
                            <li><a href="shop.html"
                                    class="min-w-40 block px-4 py-2 hover:bg-primary hover:text-white rounded">Men Item
                                    2</a></li>
                            <li><a href="shop.html"
                                    class="min-w-40 block px-4 py-2 hover:bg-primary hover:text-white rounded">Men Item
                                    3</a></li>
                        </ul>
                    </li>

                    <!-- Women Dropdown -->
                    <li class="relative group" x-data="{ open: false }">
                        <a href="shop.html" @mouseover="open = true" @mouseleave="open = false" href="#"
                            class="hover:text-secondary font-semibold flex items-center">
                            Women
                            <i
                                :class="open ? 'fas fa-chevron-up ml-1 text-xs' : 'fas fa-chevron-down ml-1 text-xs'"></i>
                        </a>
                        <ul x-show="open" @mouseover="open = true" @mouseleave="open = false"
                            class="absolute left-0 bg-white text-black space-y-2 mt-1 p-2 rounded shadow-lg"
                            x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-100"
                            x-transition:leave-start="opacity-100 scale-100"
                            x-transition:leave-end="opacity-0 scale-90">
                            <li><a href="shop.html"
                                    class="min-w-40 block px-4 py-2 hover:bg-primary hover:text-white rounded">Women
                                    Item 1</a></li>
                            <li><a href="shop.html"
                                    class="min-w-40 block px-4 py-2 hover:bg-primary hover:text-white rounded">Women
                                    Item 2</a></li>
                            <li><a href="shop.html"
                                    class="min-w-40 block px-4 py-2 hover:bg-primary hover:text-white rounded">Women
                                    Item 3</a></li>
                        </ul>
                    </li>

                    <li><a href="shop.html" class="hover:text-secondary font-semibold">Shop</a></li>
                    <li><a href="single-product-page.html" class="hover:text-secondary font-semibold">Product</a></li>
                    <li><a href="404.html" class="hover:text-secondary font-semibold">404 page</a></li>
                    <li><a href="checkout.html" class="hover:text-secondary font-semibold">Checkout</a></li>
                </ul>
            </nav>

            <!-- Right section: Buttons (for desktop) -->
            <div class="hidden lg:flex items-center space-x-4 relative">
                <a href="register.html"
                    class="bg-primary border border-primary hover:bg-transparent text-white hover:text-primary font-semibold px-4 py-2 rounded-full inline-block">Registrar</a>
                <a href="register.html"
                    class="bg-primary border border-primary hover:bg-transparent text-white hover:text-primary font-semibold px-4 py-2 rounded-full inline-block">Ingresar</a>
                <a href="{{ route('login') }}"
                    class="bg-primary border border-primary hover:bg-transparent text-white hover:text-primary font-semibold px-4 py-2 rounded-full inline-block">Adminstrar</a>
                <div class="relative group cart-wrapper">
                    <a href="/cart.html">
                        <img src="{{ asset('build/images/cart-shopping.svg') }}" alt="Cart"
                            class="h-6 w-6 group-hover:scale-120">
                    </a>
                    <!-- Cart dropdown -->
                    <div class="absolute right-0 mt-1 w-80 bg-white shadow-lg p-4 rounded hidden group-hover:block">
                        <div class="space-y-4">
                            <!-- product item -->
                            <div class="flex items-center justify-between pb-4 border-b border-gray-line">
                                <div class="flex items-center">
                                    <img src="{{ asset('build/images/2.png') }}" alt="Product"
                                        class="h-12 w-12 object-cover rounded mr-2">
                                    <div>
                                        <p class="font-semibold">Summer black dress</p>
                                        <p class="text-sm">Quantity: 1</p>
                                    </div>
                                </div>
                                <p class="font-semibold">$25.00</p>
                            </div>
                            <!-- product item -->
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <img src="{{ asset('build/images/2.png') }}" alt="Product"
                                        class="h-12 w-12 object-cover rounded mr-2">
                                    <div>
                                        <p class="font-semibold">Black suit</p>
                                        <p class="text-sm">Quantity: 1</p>
                                    </div>
                                </div>
                                <p class="font-semibold">$125.00</p>
                            </div>
                        </div>
                        <a href="/cart.html"
                            class="block text-center mt-4 border border-primary bg-primary hover:bg-transparent text-white hover:text-primary py-2 rounded-full font-semibold">Go
                            to Cart</a>
                    </div>
                </div>
                <!-- Search field -->
                <div id="search-field"
                    class="hidden absolute top-full right-0 mt-2 w-full bg-white shadow-lg p-2 rounded">
                    <input type="text" class="w-full p-2 border border-gray-300 rounded"
                        placeholder="Search for products...">
                </div>
            </div>
        </div>
    </header>

    <!-- Slider -->
    <section id="product-slider">
        <div class="main-slider swiper-container">
            <div id="img-principal" class="swiper-wrapper main-slider">
                <!-- Slide -->
                <div class="container mx-auto px-4 py-20 rounded-lg relative bg-cover bg-center">
                    <div class="swiper-slide-content">
                        <h2 class="text-3xl md:text-7xl font-bold text-white mb-2 md:mb-4">Tienda de mascotas</h2>
                        <p class="mb-4 text-white md:text-2xl"><b>Productos disponibles para tu compañero de vida</b>
                        </p>
                        <a href="/"
                            class="bg-white hover:bg-transparent text-black hover:text-white font-semibold px-4 py-2 rounded-full inline-block border border-transparent hover:border-white">Shop
                            now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Latest product section -->
    <section id="latest-products" class="py-10">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold mb-8">Ultimos Productos</h2>
            <div class="flex flex-wrap -mx-4">
                <!-- Product 1 -->
                @foreach ($products as $product)
                    <div class="w-full sm:w-1/2 lg:w-1/4 px-4 mb-8">
                        <div class="bg-white p-3 rounded-lg shadow-lg">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="Product 1"
                                class="w-full object-cover mb-4 rounded-lg">
                            <a href="#" class="text-lg font-semibold mb-2">{{ $product->name }}</a>
                            <p class=" my-2">{{ $product->brand }}</p>
                            <div class="flex items-center mb-4">
                                <span class="text-lg font-bold text-primary">${{ $product->price }}</span>
                                <span class="text-sm line-through ml-2">${{ $product->price }}</span>
                            </div>
                            <button
                                class="bg-primary border border-transparent hover:bg-transparent hover:border-primary text-white hover:text-primary font-semibold py-2 px-4 rounded-full w-full">Add
                                to Cart</button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <div class="flex justify-center">
        {{ $products->links() }}
    </div>

    <!-- Banner section -->
    <section id="banner" class="relative my-16">
        <div class="container mx-auto px-4 py-20 rounded-lg relative bg-cover bg-center"
            style="background-image: url({{ asset('build/images/banner1.jpg') }});">
            <div class="absolute inset-0 bg-black opacity-40 rounded-lg"></div>
            <div class="relative flex flex-col items-center justify-center h-full text-center text-white py-20">
                <h2 class="text-4xl font-bold mb-4">Welcome to Our Shop</h2>
                <div class="flex space-x-4">
                    <a href="#"
                        class="bg-primary hover:bg-transparent text-white hover:text-primary border border-transparent hover:border-primary font-semibold px-4 py-2 rounded-full inline-block">Shop
                        Now</a>
                    <a href="#"
                        class="bg-primary hover:bg-transparent text-white hover:text-primary border border-transparent hover:border-primary font-semibold px-4 py-2 rounded-full inline-block">New
                        Arrivals</a>
                    <a href="#"
                        class="bg-primary hover:bg-transparent text-white hover:text-primary border border-transparent hover:border-primary font-semibold px-4 py-2 rounded-full inline-block">Sale</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Subscribe section -->
    <section id="subscribe" class="py-6 lg:py-24 bg-white border-t border-gray-line">
        <div class="container mx-auto">
            <div class="flex flex-col items-center rounded-lg p-4 sm:p-0 ">
                <div class="mb-8">
                    <h2 class="text-center text-xl font-bold sm:text-2xl lg:text-left lg:text-3xl">Join our newsletter
                        and <span class="text-primary">get $50 discount</span> for your first order
                    </h2>
                </div>
                <div class="flex flex-col items-center w-96 ">
                    <form class="flex w-full gap-2">
                        <input placeholder="Enter your email address"
                            class="w-full flex-1 rounded-full px-3 py-2 border border-gray-300 text-gray-700 placeholder-gray-500 focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary" />
                        <button
                            class="bg-primary border border-primary hover:bg-transparent hover:border-primary text-white hover:text-primary font-semibold py-2 px-4 rounded-full">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="border-t border-gray-line">
        <!-- Top part -->
        <div class="container mx-auto px-4 py-10">
            <div class="flex flex-wrap -mx-4">
                <!-- Menu 1 -->
                <div class="w-full sm:w-1/6 px-4 mb-8">
                    <h3 class="text-lg font-semibold mb-4">Shop</h3>
                    <ul>
                        <li><a href="/shop.html" class="hover:text-primary">Shop</a></li>
                        <li><a href="/single-product-page.html" class="hover:text-primary">Women</a></li>
                        <li><a href="/shop.html" class="hover:text-primary">Men</a></li>
                        <li><a href="/single-product-page.html" class="hover:text-primary">Shoes</a></li>
                        <li><a href="/single-product-page.html" class="hover:text-primary">Accessories</a></li>
                    </ul>
                </div>
                <!-- Menu 2 -->
                <div class="w-full sm:w-1/6 px-4 mb-8">
                    <h3 class="text-lg font-semibold mb-4">Pages</h3>
                    <ul>
                        <li><a href="/shop.html" class="hover:text-primary">Shop</a></li>
                        <li><a href="/single-product-page.html" class="hover:text-primary">Product</a></li>
                        <li><a href="/checkout.html" class="hover:text-primary">Checkout</a></li>
                        <li><a href="/404.html" class="hover:text-primary">404</a></li>
                    </ul>
                </div>
                <!-- Menu 3 -->
                <div class="w-full sm:w-1/6 px-4 mb-8">
                    <h3 class="text-lg font-semibold mb-4">Account</h3>
                    <ul>
                        <li><a href="/cart.html" class="hover:text-primary">Cart</a></li>
                        <li><a href="/register.html" class="hover:text-primary">Registration</a></li>
                        <li><a href="/register.html" class="hover:text-primary">Login</a></li>
                    </ul>
                </div>
                <!-- Social Media -->
                <div class="w-full sm:w-1/6 px-4 mb-8">
                    <h3 class="text-lg font-semibold mb-4">Follow Us</h3>
                    <ul>
                        <li class="flex items-center mb-2">
                            <img src="{{ asset('build/images/social_icons/facebook.svg') }}" alt="Facebook"
                                class="w-4 h-4 transition-transform transform hover:scale-110 mr-2">
                            <a href="#" class="hover:text-primary">Facebook</a>
                        </li>
                        <li class="flex items-center mb-2">
                            <img src="{{ asset('build/images/social_icons/twitter.svg') }}" alt="Twitter"
                                class="w-4 h-4 transition-transform transform hover:scale-110 mr-2">
                            <a href="#" class="hover:text-primary">Twitter</a>
                        </li>
                        <li class="flex items-center mb-2">
                            <img src="{{ asset('build/images/social_icons/instagram.svg') }}" alt="Instagram"
                                class="w-4 h-4 transition-transform transform hover:scale-110 mr-2">
                            <a href="#" class="hover:text-primary">Instagram</a>
                        </li>
                        <li class="flex items-center mb-2">
                            <img src="{{ asset('build/images/social_icons/pinterest.svg') }}" alt="Instagram"
                                class="w-4 h-4 transition-transform transform hover:scale-110 mr-2">
                            <a href="#" class="hover:text-primary">Pinterest</a>
                        </li>
                        <li class="flex items-center mb-2">
                            <img src="{{ asset('build/images/social_icons/youtube.svg') }}" alt="Instagram"
                                class="w-4 h-4 transition-transform transform hover:scale-110 mr-2">
                            <a href="#" class="hover:text-primary">YouTube</a>
                        </li>
                    </ul>
                </div>
                <!-- Contact Information -->
                <div class="w-full sm:w-2/6 px-4 mb-8">
                    <h3 class="text-lg font-semibold mb-4">Contact Us</h3>
                    <p><img src="{{ asset('build/images/template-logo.jpeg') }}" alt="Logo"
                            class="h-[60px] mb-4">
                    </p>
                    <p>123 Street Name, Paris, France</p>
                    <p class="text-xl font-bold my-4">Phone: (123) 456-7890</p>
                    <a href="mailto:info@company.com" class="underline">Email: info@company.com</a>
                </div>
            </div>
        </div>

        <!-- Bottom part -->
        <div class="py-6 border-t border-gray-line">
            <div class="container mx-auto px-4 flex flex-wrap justify-between items-center">
                <!-- Copyright and Links -->
                <div class="w-full lg:w-3/4 text-center lg:text-left mb-4 lg:mb-0">
                    <p class="mb-2 font-bold">&copy; 2024 Your Company. All rights reserved.</p>
                    <ul class="flex justify-center lg:justify-start space-x-4 mb-4 lg:mb-0">
                        <li><a href="#" class="hover:text-primary">Privacy Policy</a></li>
                        <li><a href="#" class="hover:text-primary">Terms of Service</a></li>
                        <li><a href="#" class="hover:text-primary">FAQ</a></li>
                    </ul>
                    <p class="text-sm mt-4">Your shop's description goes here. This is a brief introduction to your
                        shop and what you offer.</p>
                </div>
                <!-- Payment Icons -->
                <div class="w-full lg:w-1/4 text-center lg:text-right">
                    <img src="{{ asset('build/images/social_icons/paypal.svg') }}" alt="PayPal"
                        class="inline-block h-8 mr-2">
                    <img src="{{ asset('build/images/social_icons/stripe.svg') }}" alt="Stripe"
                        class="inline-block h-8 mr-2">
                    <img src="{{ asset('build/images/social_icons/visa.svg') }}" alt="Visa"
                        class="inline-block h-8">
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="{{ asset('build/js/script.js') }}"></script>

</body>

</html>
