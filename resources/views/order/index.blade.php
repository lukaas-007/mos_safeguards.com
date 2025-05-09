<?php
/** @var \Illuminate\Database\Eloquent\Collection $orders */
?>

<x-app-layout>
    <div class="container p-5 mx-auto lg:w-2/3">
        <h1 class="mb-2 text-3xl font-bold">My Orders</h1>
        <div class="p-3 overflow-x-auto bg-white rounded-lg">
            <table class="w-full table-auto">
                <thead>
                    <tr class="border-b-2">
                        <th class="p-2 text-left">Order #</th>
                        <th class="p-2 text-left">Date</th>
                        <th class="p-2 text-left">Status</th>
                        <th class="p-2 text-left">SubTotal</th>
                        <th class="p-2 text-left">Items</th>
                        <th class="p-2 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr class="border-b">
                            <td class="px-2 py-1">
                                <a
                                    href="{{ route('order.view', $order) }}"
                                    class="text-purple-600 hover:text-purple-500">
                                    #{{$order->id}}
                                </a>
                            </td>
                            <td class="px-2 py-1 whitespace-nowrap">{{$order->created_at}}</td>
                            <td class="px-2 py-1">
                                <small class="text-white py-1 px-2 rounded
                                    {{$order->isPaid() ? 'bg-emerald-500' : 'bg-gray-400' }}">
                                    {{$order->status}}
                                </small>
                            </td>
                            <td class="px-2 py-1">${{$order->total_price}}</td>
                            <td class="px-2 py-1 whitespace-nowrap">{{$order->items_count}} item(s)</td>
                            <td class="py-1 px-2 flex gap-2 w-[100px]">
                                @if (!$order->isPaid())
                                    <form action="{{ route('cart.checkout-order', $order) }}"
                                        method="POST">
                                        @csrf
                                        <button
                                            class="flex items-center py-1 btn-primary whitespace-nowrap">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="w-5 h-5"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                                stroke-width="2">
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                            </svg>
                                            Pay
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            {{ $orders->links() }}
        </div>
    </div>
</x-app-layout>
