<header class="gradient-animation text-white text-center text-2xl font-bold py-4 px-8 sticky top-0 z-50 flex items-center justify-between">
    @if (auth()->user()->isAdmin())
        <div class="flex-1 text-center">
            {{ ($title ?? 'Dashboard Admin') }}
        </div>
    @else
        <div class="flex-1 text-center">
            {{ ($title ?? 'Dashboard') }}
        </div>
    @endif
    <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Yakin ingin keluar?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="hover:bg-blue-200 text-white font-bold py-2 px-4 rounded">
            Logout
        </button>
    </form>
</header>

{{-- <form action="{{ route('logout') }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Logout</button>
</form> --}}
