<?php
namespace App\Livewire;
use Livewire\Component;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;

class ProductView extends Component
{
    public $cart = [];
    public $modal = false;

    public function addToCart($productId)
    {
        $product = Product::find($productId);

        if (!$product || $product->stock <= 0) {
            session()->flash('error', 'Producto no disponible o sin stock.');
            return;
        }

        if (isset($this->cart[$productId])) {
            $this->cart[$productId]['quantity']++;
        } else {
            $this->cart[$productId] = [
                'id' => $product->id,
                'name' => $product->name,
                'description' => $product->description,
                'price' => $product->price,
                'merm' => $product->merm,
                'quantity' => 1,
            ];
        }

        $product->stock -= 1;
        $product->save();
    }

    public function subtractFromCart($productId)
    {
        if (isset($this->cart[$productId])) {
            $this->cart[$productId]['quantity']--;

            if ($this->cart[$productId]['quantity'] <= 0) {
                unset($this->cart[$productId]);
            } else {
                $product = Product::find($productId);
                $product->stock += 1;
                $product->save();
            }
        }
    }

    public function removeFromCart($productId)
    {
        if (isset($this->cart[$productId])) {
            $product = Product::find($productId);
            $product->stock += $this->cart[$productId]['quantity'];
            $product->save();
            unset($this->cart[$productId]);
        }
    }

    public function clearCart()
    {
        foreach ($this->cart as $item) {
            $product = Product::find($item['id']);
            $product->stock += $item['quantity'];
            $product->save();
        }
        $this->cart = [];
    }

    public function getTotalProperty()
    {
        return array_reduce($this->cart, function ($total, $item) {
            return $total + $item['price'] * $item['quantity'];
        }, 0);
    }

    public function getReport()
    {
        $pdf = Pdf::loadView('pdf.invoice');
        return $pdf->download('invoice.pdf');
    }

    public function render()
    {
        $products = Product::all();
        return view('livewire.product-view', ['products' => $products]);
    }
}
