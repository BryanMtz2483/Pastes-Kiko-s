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
                Precio: ${{ $product['price'] }} - Merm: ${{ $product['merm'] }}<br>
                Cantidad: {{ $product['quantity'] }}<br>
                Subtotal: ${{ ($product['price'] - $product['merm']) * $product['quantity'] }}
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
