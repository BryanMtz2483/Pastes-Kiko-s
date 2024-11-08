<div class="p-10 bg-gradient-to-r from-gray-800 via-black to-gray-900 min-h-screen">
    <button wire:click="set('modal',true)" class="mt-8 bg-gradient-to-r from-blue-500 to-red-500 hover:from-red-500 hover:to-blue-500 text-white font-bold py-3 px-6 rounded-full shadow-lg transform transition-transform duration-300 ease-in-out hover:scale-105 focus:outline-none">
        Ver Carrito
    </button>
    <button wire:click="set('modal',false)" class="mt-8 bg-gradient-to-r from-blue-500 to-red-500 hover:from-red-500 hover:to-blue-500 text-white font-bold py-3 px-6 rounded-full shadow-lg transform transition-transform duration-300 ease-in-out hover:scale-105 focus:outline-none">
        Ver Productos
    </button>
    @if($modal == false)
    <div class="max-w-6xl mx-auto">
        <h2 class="text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-red-500 to-blue-500 mb-12 text-center tracking-wider uppercase">Lista de Productos</h2>
        <ul class="grid gap-12 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
            @foreach($products as $product)
                <li class="bg-gradient-to-br from-gray-800 to-gray-700 text-white rounded-3xl shadow-xl hover:shadow-2xl transform hover:-translate-y-3 transition-all duration-300 p-8">
                    <div class="flex flex-col items-center">
                        <div class="relative w-28 h-28 rounded-full overflow-hidden mb-6 border-8 border-gradient-to-r from-red-500 to-blue-500 shadow-lg">
                            <img src="https://www.pasteskikos.com/img/salados/salchicha-jamon-y-queso.png" class="w-full h-full object-cover transform transition-transform duration-300 hover:scale-110" alt="Imagen del producto">
                        </div>
                        <div class="text-center">
                            <h3 class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-red-300 to-blue-300">{{ $product->name }}</h3>
                            <h4 class="text-lg font-semibold text-blue-200 mt-2">{{ $product->price }} MXN</h4>
                        </div>
                        <p class="text-gray-300 text-center text-sm mt-4 px-6">{{ $product->description }}</p>
                        <button wire:click="addToCart({{ $product->id }})" class="mt-8 bg-gradient-to-r from-blue-500 to-red-500 hover:from-red-500 hover:to-blue-500 text-white font-bold py-3 px-6 rounded-full shadow-lg transform transition-transform duration-300 ease-in-out hover:scale-105 focus:outline-none">
                            Agregar al Carrito
                        </button>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    @endif
    @if($modal)
    <div>
        <h2>Carrito de Compras</h2>
        @if (session()->has('error'))
            <div style="color: red;">{{ session('error') }}</div>
        @endif
        <!-- Lista de productos en el carrito -->
        <ul>
            @foreach($cart as $product)
                <li>
                    <strong>{{ $product['name'] }}</strong><br>
                    Descripción: {{ $product['description'] }}<br>
                    Precio: ${{ $product['price'] }}<br>
                    Cantidad: 
                    <button wire:click="subtractFromCart({{ $product['id'] }})">-</button>
                    {{ $product['quantity'] }}
                    <button wire:click="addToCart({{ $product['id'] }})">+</button><br>
                    Subtotal: ${{ $product['price'] * $product['quantity'] }}
                    <button wire:click="removeFromCart({{ $product['id'] }})">Eliminar</button>
                </li>
            @endforeach
        </ul>
        <!-- Total del carrito -->
        <div>
            <strong>Total: ${{ $this->total }}</strong>
        </div>
        <!-- Botón para vaciar el carrito -->
        <button wire:click="clearCart">Vaciar Carrito</button>
    </div>
    @endif
</div>




