<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="nama" :value="old('nama')" required autofocus />
            <x-input-error :messages="$errors->get('nama')" class="mt-2" />
        </div>
    </div>

<script>
    function togglePasswordVisibility() {
      const passwordInput = document.getElementById('password');
      const eyeClosed = document.getElementById('eyeClosed');
      const eyeOpen = document.getElementById('eyeOpen');

      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeClosed.classList.add('hidden'); // Sembunyikan ikon mata tertutup
        eyeOpen.classList.remove('hidden'); // Tampilkan ikon mata terbuka
      } else {
        passwordInput.type = 'password';
        eyeClosed.classList.remove('hidden'); // Tampilkan ikon mata tertutup
        eyeOpen.classList.add('hidden'); // Sembunyikan ikon mata terbuka
      }

        // <!-- Role Dropdown -->
        // <div class="mt-4">
        //     <x-input-label for="role" :value="__('Role')" />
        //     <select id="role" name="role" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
        //         <option value="user">User</option>
        //         <option value="admin">Admin</option>
        //     </select>
        //     <x-input-error :messages="$errors->get('role')" class="mt-2" />
        // </div>

      if(passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeClosed1.classList.add('hidden'); // Sembunyikan ikon mata tertutup
        eyeOpen1.classList.remove('hidden'); // Tampilkan ikon mata terbuka
      } else {
        passwordInput.type = 'password';
        eyeClosed1.classList.remove('hidden'); // Tampilkan ikon mata tertutup
        eyeOpen1.classList.add('hidden'); // Sembunyikan ikon mata terbuka
      }

    }

</script>
</x-guest-layout>
