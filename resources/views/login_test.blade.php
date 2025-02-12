<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login & Register</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @vite('resources/css/app.css')
</head>
<body class="flex items-center justify-center min-h-screen bg-[#185863] font-poppins">

{{-- container --}}
  <div class="w-full max-w-lg p-8 bg-[#E8F6F9] rounded-lg shadow-lg">
    <!-- Toggle Buttons -->
    <div class="flex justify-center mb-8">
      <button id="toggle-signup" class="px-6 py-2 text-sm font-semibold text-gray-600 bg-gray-300 bg-gray-200 rounded-l-lg focus:outline-none transition-colors duration-300" data-target="signup">
        Sign Up
      </button>
      <button id="toggle-login" class="px-6 py-2 text-sm font-semibold text-gray-600 bg-gray-200 rounded-r-lg focus:outline-none transition-colors duration-300" data-target="login">
        Log In
      </button>
    </div>

    {{-- Forms  --}}
    <div class="relative overflow-hidden">
      {{-- Sign Up Form --}}
      <form id="signup-form" action="/signup" method="POST" class="transition-all duration-500 ease-in-out transform opacity-100 translate-x-0">
        <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">Create Account</h2>
        <a
          href="#"
          class="flex items-center justify-center px-2 py-2 mb-6 text-sm text-gray-700 bg-white border border-gray-300 rounded-full hover:bg-gray-100">
          <img
            src="https://www.svgrepo.com/show/355037/google.svg"
            alt="Google Logo"
            class="w-5 h-5 mr-2"/>
          Sign up with Google
        </a>
        <div class="space-y-4">
          <div>
            <label for="signup-email" class="block text-sm font-medium text-gray-600">Email Address</label>
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
      </form>

      {{-- Login Form  --}}
      <form id="login-form" action="/login" method="POST" class="absolute top-0 left-0 w-full transition-all duration-500 ease-in-out transform opacity-0 translate-x-full">
        <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">Welcome Back</h2>
        <div class="space-y-4">
          <div>
            <label for="login-email" class="block text-sm font-medium text-gray-600">Email Address</label>
            <input type="email" id="login-email" name="email" required class="w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"/>
          </div>
          <div>
            <label for="login-password" class="block text-sm font-medium text-gray-600">Password</label>
            <input type="password" id="login-password" name="password" required class="w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"/>
          </div>
          <a
          href="#"
          class="flex items-center justify-center px-2 py-2 mb-6 text-sm text-gray-700 bg-white border border-gray-300 rounded-full hover:bg-gray-100">
          <img
            src="https://www.svgrepo.com/show/355037/google.svg"
            alt="Google Logo"
            class="w-5 h-5 mr-2"/>
          Sign up with Google
        </a>
          <button type="submit" class="w-full px-4 py-2 mt-6 text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 transition-colors duration-300">
            Log In
          </button>
        </div>
      </form>
    </div>
  </div>

  <script>
    const toggleButtons = document.querySelectorAll('[data-target]');
    const signupForm = document.getElementById('signup-form');
    const loginForm = document.getElementById('login-form');

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
  </script>
</body>
</html>
