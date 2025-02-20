<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Login & Register</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @vite('resources/css/app.css')
</head>
<body class="flex items-center justify-center min-h-screen bg-[#185863] font-poppins">

  {{-- container --}}
  <div class="w-full max-w-lg p-8 bg-[#E8F6F9] rounded-lg shadow-lg">
    <!-- Toggle Buttons -->
    <div class="flex justify-center mb-8">
      <button id="toggle-signup" class="px-6 py-2 text-sm font-semibold text-gray-600 bg-gray-200 rounded-l-lg focus:outline-none transition-colors duration-300" data-target="signup">
        Sign Up
      </button>
      <button id="toggle-login" class="px-6 py-2 text-sm font-semibold text-gray-600 bg-gray-200 rounded-r-lg focus:outline-none transition-colors duration-300" data-target="login">
        Log In
      </button>
    </div>

    {{-- Forms --}}
    <div class="relative overflow-hidden">
      {{-- Sign Up Form --}}
      <form id="signup-form" action="/signup" method="POST" class="transition-all duration-500 ease-in-out transform opacity-100 translate-x-0">
        @csrf <!-- Add CSRF token for signup form -->
        <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">Buat Akun</h2>
        <div class="space-y-4">
          <div>
            <label for="signup-email" class="block text-sm font-medium text-gray-600">Alamat Email</label>
            <input type="email" id="signup-email" name="email" required class="w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"/>
          </div>
          <div>
            <label for="signup-password" class="block text-sm font-medium text-gray-600">Password</label>
            <input type="password" id="signup-password" name="password" required class="w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"/>
          </div>
          <button type="submit" class="w-full px-4 py-2 mt-6 text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 transition-colors duration-300">
            Sign Up
          </button>
        </div>

        {{-- Divider with OR --}}
        <div class="flex items-center my-6">
          <div class="flex-grow border-t border-gray-300"></div>
          <span class="mx-4 text-sm text-gray-600">ATAU</span>
          <div class="flex-grow border-t border-gray-300"></div>
        </div>

        {{-- Google Sign Up --}}
        <a href="#" class="flex items-center justify-center px-2 py-2 mb-6 text-sm text-gray-700 bg-white border border-gray-300 rounded-full hover:bg-gray-100">
          <img src="https://www.svgrepo.com/show/355037/google.svg" alt="Google Logo" class="w-5 h-5 mr-2"/>
          Sign up dengan Google
        </a>
      </form>

      {{-- Login Form --}}
      <form id="login-form" action="/login" method="POST" class="absolute top-0 left-0 w-full transition-all duration-500 ease-in-out transform opacity-0 translate-x-full">
        @csrf <!-- Add CSRF token for login form -->
        <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">Selamat Datang Kembali</h2>
        <div class="space-y-4">
          <div>
            <label for="login-email" class="block text-sm font-medium text-gray-600">Alamat Email</label>
            <input type="email" id="login-email" name="email" required class="w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"/>
          </div>
          <div>
            <label for="login-password" class="block text-sm font-medium text-gray-600">Password</label>
            <input type="password" id="login-password" name="password" required class="w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"/>
          </div>
          <button type="submit" class="w-full px-4 py-2 mt-6 text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 transition-colors duration-300">
            Log In
          </button>
        </div>

        {{-- Divider with OR --}}
        <div class="flex items-center my-6">
          <div class="flex-grow border-t border-gray-300"></div>
          <span class="mx-4 text-sm text-gray-600">ATAU</span>
          <div class="flex-grow border-t border-gray-300"></div>
        </div>

        {{-- Google Login --}}
        <a href="#" class="flex items-center justify-center px-2 py-2 mb-6 text-sm text-gray-700 bg-white border border-gray-300 rounded-full hover:bg-gray-100">
          <img src="https://www.svgrepo.com/show/355037/google.svg" alt="Google Logo" class="w-5 h-5 mr-2"/>
          Log in dengan Google
        </a>
      </form>
    </div>
  </div>

  <script>
    const toggleButtons = document.querySelectorAll('[data-target]');
    const signupForm = document.getElementById('signup-form');
    const loginForm = document.getElementById('login-form');
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    // Toggle between Sign Up and Log In forms
    toggleButtons.forEach(button => {
      button.addEventListener('click', () => {
        const target = button.getAttribute('data-target');

        if (target === 'signup') {
          signupForm.classList.remove('opacity-0', 'translate-x-full');
          signupForm.classList.add('opacity-100', 'translate-x-0');
          loginForm.classList.remove('opacity-100', 'translate-x-0');
          loginForm.classList.add('opacity-0', 'translate-x-full');
          toggleButtons[0].classList.add('bg-gray-300');
          toggleButtons[1].classList.remove('bg-gray-300');
        } else {
          loginForm.classList.remove('opacity-0', 'translate-x-full');
          loginForm.classList.add('opacity-100', 'translate-x-0');
          signupForm.classList.remove('opacity-100', 'translate-x-0');
          signupForm.classList.add('opacity-0', 'translate-x-full');
          toggleButtons[1].classList.add('bg-gray-300');
          toggleButtons[0].classList.remove('bg-gray-300');
        }
      });
    });

    // Login Form Submission
    loginForm.addEventListener('submit', async function(event) {
      event.preventDefault();

      const email = document.getElementById('login-email').value.trim();
      const password = document.getElementById('login-password').value.trim();

      // Validation
      if (!email || !password) {
        Swal.fire({
          title: 'Gagal!',
          text: 'Email dan password diperlukan.',
          icon: 'error',
          confirmButtonText: 'OK',
        });
        return;
      }

      try {
        const response = await fetch('/login', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
          },
          body: JSON.stringify({ email, password }),
        });

        if (!response.ok) {
          const errorData = await response.json();
          Swal.fire({
            title: 'Login Gagal!',
            text: errorData.message || 'Email atau password tidak valid.',
            icon: 'error',
            confirmButtonText: 'OK',
          });
        } else {
          Swal.fire({
            title: 'Berhasil!',
            text: 'Login berhasil. Mengalihkan...',
            icon: 'success',
            confirmButtonText: 'OK',
          }).then(() => {
            window.location.href = '/main_page';
          });
        }
      } catch (error) {
        Swal.fire({
          title: 'Gagal!',
          text: 'Error tak terduga terjadi. Coba lagi nanti.',
          icon: 'error',
          confirmButtonText: 'OK',
        });
      }
    });

    // Signup Form Submission
    signupForm.addEventListener('submit', async function(event) {
      event.preventDefault();

      const email = document.getElementById('signup-email').value.trim();
      const password = document.getElementById('signup-password').value.trim();

      // Validation
      if (!email || !password) {
        Swal.fire({
          title: 'Gagal!',
          text: 'Email dan password diperlukan.',
          icon: 'error',
          confirmButtonText: 'OK',
        });
        return;
      }

      try {
        const response = await fetch('/signup', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
          },
          body: JSON.stringify({ email, password }),
        });

        if (!response.ok) {
          const errorData = await response.json();
          Swal.fire({
            title: 'Signup Gagal!',
            text: errorData.message || 'Tidak bisa membuat akun.',
            icon: 'error',
            confirmButtonText: 'OK',
          });
        } else {
          Swal.fire({
            title: 'Berhasil!',
            text: 'Signup berhasil. Mengalihkan...',
            icon: 'success',
            confirmButtonText: 'OK',
          }).then(() => {
            window.location.href = '/login_page';
          });
        }
      } catch (error) {
        Swal.fire({
          title: 'Gagal!',
          text: 'Error tak terduga terjadi. Coba lagi nanti.',
          icon: 'error',
          confirmButtonText: 'OK',
        });
      }
    });
  </script>
</body>
</html>
