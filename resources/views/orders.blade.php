<x-app-layout>
  <x-slot name="title">Orders</x-slot>
  <x-slot name="header">
    <h2 class="font-bold text-2xl text-hkcolor leading-tight">
      {{ __('Your Orders') }}
    </h2>
  </x-slot>
  {{-- {{ $order->find(1738) }} --}}
  {{-- @foreach ($orders as $order)
{{ $order->updated_at }} - {{ $order->user->loc_num }} - {{ $order->name }} - {{ $order->confirmation }}<br>
  @endforeach --}}

  <livewire:orders :orders="$orders" />
</x-app-layout>
