<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="user-bookings">
        <h3>Danh sách đơn hàng</h3>
        <hr>
        @if($bookings->isEmpty())
            <p>Không có đơn hàng nào.</p>
        @else
            <ul>
                @foreach($bookings as $booking)
                <img src="{{ $booking->car ? asset('storage/' . $booking->car->image_url) : asset('default-image.png') }}" alt="{{ $booking->car->name ?? 'No car assigned' }}">
                    <li>
                        <strong>Hãng xe: </strong> {{ $booking->car?->trademark ?? 'Không xác định' }},
                        <strong>Xe:</strong> {{ $booking->car->name ?? 'N/A' }},
                        <strong>Tổng giá thuê:</strong> {{ number_format($booking->total_price) }} VND,
                        <br>
                        <strong>trạng thái: </strong>
                        @if ($booking->browsing_status)
                            Đã được duyệt
                        @else
                            Chưa được duyệt
                        @endif
                    </li>
                    <a href="{{Route('booking.edit',$booking->id)}}">sửa</a>
                    <form action="{{route('booking.destroy', $booking->id)}}" method="POST" onsubmit="return confirm('Ban co chac muon xoa don thue xe nay?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                    <hr>
                @endforeach
            </ul>
        @endif
    </div> --}}
</div>
</x-app-layout>

