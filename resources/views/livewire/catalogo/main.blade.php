<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <x-button wire:click="set('dashModal','Categories')">CATEGORIES</x-button> 
                <x-button wire:click="set('dashModal','Suppliers')">SUPPLIERS</x-button>  
                <x-button wire:click="set('dashModal','Branches')">BRANCHES</x-button>
                <x-button wire:click="set('dashModal','Invoices')">INVOICES</x-button> 
                <x-button wire:click="set('dashModal','Products')">PRODUCTS</x-button>  
                <x-button wire:click="set('dashModal','Sales')">SALES</x-button>  
                <x-button wire:click="set('dashModal','Ticket')">TICKET</x-button>  

                @if($dashModal == 'Categories')
                    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 relative overflow-x-auto shadow-md sm:rounded-l border-cyan-500">
                        @livewire('c-r-u-d-controller', ['modelName' => 'Category'])
                    </div>
                @elseif($dashModal == 'Suppliers')
                    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 relative overflow-x-auto shadow-md sm:rounded-l border-cyan-500">
                        @livewire('c-r-u-d-controller', ['modelName' => 'Supplier'])
                    </div>
                @elseif($dashModal == 'Branches')
                    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 relative overflow-x-auto shadow-md sm:rounded-l border-cyan-500">
                        @livewire('c-r-u-d-controller', ['modelName' => 'Branch'])
                    </div>
                @elseif($dashModal == 'Invoices')
                    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 relative overflow-x-auto shadow-md sm:rounded-l border-cyan-500">
                        @livewire('c-r-u-d-controller', ['modelName' => 'Invoice'])
                    </div>
                    @elseif($dashModal == 'Products')
                    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 relative overflow-x-auto shadow-md sm:rounded-l border-cyan-500">
                        @livewire('c-r-u-d-controller', ['modelName' => 'Product'])
                    </div>
                @elseif($dashModal == 'Sales')
                    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 relative overflow-x-auto shadow-md sm:rounded-l border-cyan-500">
                        @livewire('c-r-u-d-controller', ['modelName' => 'Sale'])
                    </div>
                @elseif($dashModal == 'Ticket')
                    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 relative overflow-x-auto shadow-md sm:rounded-l border-cyan-500">
                        @livewire('c-r-u-d-controller', ['modelName' => 'Ticket'])
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
