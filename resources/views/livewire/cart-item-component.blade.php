<tr>
    <td class="py-4">
        <div class="flex items-center">
            <img class="h-16 w-16 mr-4 rounded-full"
                src="https://www.jesmondfruitbarn.com.au/wp-content/uploads/2016/10/Jesmond-Fruit-Barn-White-Radish.jpg"
                alt="{{ $cartItem->name }}">
            <span class="font-semibold">{{ $cartItem->name }}</span>
        </div>
    </td>
    <td class="py-4">{{ Cknow\Money\Money::RWF($cartItem->price) }}
        / <small>{{ $product->measurement }}</td>
    <td class="py-4">
        <div class="flex items-center">
            <button class="border rounded-md py-2 px-4 mr-2">-</button>
            <span class="text-center w-8">1</span>
            <button class="border rounded-md py-2 px-4 ml-2">+</button>
        </div>
    </td>
    <td class="py-4">{{ Cknow\Money\Money::RWF($cartItem->price * $cartItem->quantity) }}</td>
    <td>
        <button type="button" wire:click="removeFromCart('{{ $cartItem['id'] }}')"
            class="inline-flex items-center text-sm font-medium text-red-600 hover:text-red-900">
            <svg class="me-1.5 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M6 18 17.94 6M18 18 6.06 6" />
            </svg>
            Remove
        </button>
    </td>
</tr>
