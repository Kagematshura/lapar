<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login & Register</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @vite('resources/css/app.css')
</head>
<body class="flex items-center justify-center min-h-screen bg-[#185863]">

  <div class="w-full h-4/5 max-w-lg p-6 bg-[#E8F6F9] rounded-lg shadow-lg">

    <div class="flex justify-center mb-6">
      <button
        id="toggle-signup"
        class="px-4 py-2 text-sm font-semibold text-gray-600 bg-gray-300 bg-gray-200 rounded-l-lg focus:outline-none toggle-button"
        data-target="signup">
        Sign Up
      </button>
      <button
        id="toggle-login"
        class="px-4 py-2 text-sm font-semibold text-gray-600 bg-gray-200 rounded-r-lg focus:outline-none toggle-button"
        data-target="login">
        Log In
      </button>
    </div>

    <div class="relative">

      <!-- Sign Up Form -->
      <form
        id="signup-form"
        action="/signup"
        method="POST"
        class="transition-all duration-300 transform opacity-100">
        <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">Sign Up</h2>
        <a
          href="#"
          class="flex items-center justify-center px-2 py-2 mb-6 text-sm text-gray-700 bg-white border border-gray-300 rounded-full hover:bg-gray-100">
          <img
            src="https://www.svgrepo.com/show/355037/google.svg"
            alt="Google Logo"
            class="w-5 h-5 mr-2"/>
          Continue with Google
        </a>
        <div class="mt-4">
          <label for="signup-email" class="block text-sm font-medium text-gray-600">Email Address</label>
          <input
            type="email"
            id="signup-email"
            name="email"
            required
            class="w-full px-4 py-2 mt-2 text-gray-700 bg-gray-100 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"/>
        </div>
        <div class="mt-4">
          <label for="signup-password" class="block text-sm font-medium text-gray-600">Password</label>
          <input
            type="password"
            id="signup-password"
            name="password"
            required
            class="w-full px-4 py-2 mt-2 text-gray-700 bg-gray-100 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"/>
        </div>
        <button
          type="submit"
          class="w-full px-4 py-2 mt-6 text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
          Sign Up
        </button>
      </form>

      <!-- Login Form -->
      <form
        id="login-form"
        action="/login"
        method="POST"
        class="absolute top-0 left-0 w-full transition-all duration-300 transform opacity-0 -translate-x-full">
        <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">Log In</h2>
        <div class="mt-4">
          <label for="login-email" class="block text-sm font-medium text-gray-600">Email Address</label>
          <input
            type="email"
            id="login-email"
            name="email"
            required
            class="w-full px-4 py-2 mt-2 text-gray-700 bg-gray-100 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"/>
        </div>
        <div class="mt-4">
          <label for="login-password" class="block text-sm font-medium text-gray-600">Password</label>
          <input
            type="password"
            id="login-password"
            name="password"
            required
            class="w-full px-4 py-2 mt-2 text-gray-700 bg-gray-100 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"/>
        </div>
        <a
          href="#"
          class="flex items-center justify-center px-2 py-2 mb-6 text-sm text-gray-700 bg-white border border-gray-300 rounded-full hover:bg-gray-100">
          <img
            src="https://www.svgrepo.com/show/355037/google.svg"
            alt="Google Logo"
            class="w-5 h-5 mr-2"/>
          Continue with Google
        </a>
        <div class="flex items-center justify-between mt-4">
          <label class="inline-flex items-center">
            <input
              type="checkbox"
              class="form-checkbox text-blue-500"
              name="remember"/>
            <span class="ml-2 text-sm text-gray-600">Remember me</span>
          </label>
          <a href="#" class="text-sm text-blue-500 hover:underline">Forgot Password?</a>
        </div>
        <button
          type="submit"
          class="w-full px-4 py-2 mt-6 text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
          Log In
        </button>
      </form>
    </div>
  </div>

  <script>
    const toggleButtons = document.querySelectorAll('.toggle-button');
    const signupForm = document.getElementById('signup-form');
    const loginForm = document.getElementById('login-form');
    
    toggleButtons.forEach((button) => {
      button.addEventListener('click', () => {
        const target = button.getAttribute('data-target');

        if (target === 'signup') {
          signupForm.style.opacity = '1';
          signupForm.style.transform = 'translateX(0)';
          signupForm.style.zIndex = '1';

          loginForm.style.opacity = '0';
          loginForm.style.transform = 'translateX(-100%)';
          loginForm.style.zIndex = '-1';

          toggleButtons[0].classList.add('bg-gray-300');
          toggleButtons[1].classList.remove('bg-gray-300');
        } else {
          loginForm.style.opacity = '1';
          loginForm.style.transform = 'translateX(0)';
          loginForm.style.zIndex = '1';

          signupForm.style.opacity = '0';
          signupForm.style.transform = 'translateX(100%)';
          signupForm.style.zIndex = '-1';

          toggleButtons[1].classList.add('bg-gray-300');
          toggleButtons[0].classList.remove('bg-gray-300');
        }
      });
    });

    loginForm.addEventListener('submit', async function(event) {
      event.preventDefault();

      const email = document.getElementById('login-email').value;
      const password = document.getElementById('login-password').value;
      if (!email || !password) {
        Swal.fire({
          title: 'Error!',
          text: 'Email and password are required.',
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
          },
          body: JSON.stringify({ email, password }),
        });

        if (!response.ok) {
          const errorData = await response.json();
          Swal.fire({
            title: 'Login Failed!',
            text: errorData.message || 'Invalid email or password.',
            icon: 'error',
            confirmButtonText: 'OK',
          });
        } else {
          Swal.fire({
            title: 'Success!',
            text: 'Login successful. Redirecting...',
            icon: 'success',
            confirmButtonText: 'OK',
          }).then(() => {
            window.location.href = '/main_page';
          });
        }
      } catch (error) {
        Swal.fire({
          title: 'Error!',
          text: 'An unexpected error occurred. Please try again later.',
          icon: 'error',
          confirmButtonText: 'OK',
        });
      }
    });

    signupForm.addEventListener('submit', async function(event) {
      event.preventDefault();

      const email = document.getElementById('signup-email').value;
      const password = document.getElementById('signup-password').value;

      if (!email || !password) {
        Swal.fire({
          title: 'Error!',
          text: 'Email and password are required for signing up.',
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
          },
          body: JSON.stringify({ email, password }),
        });

        if (!response.ok) {
          const errorData = await response.json();
          Swal.fire({
            title: 'Sign Up Failed!',
            text: errorData.message || 'Unable to create account.',
            icon: 'error',
            confirmButtonText: 'OK',
          });
        } else {
          Swal.fire({
            title: 'Success!',
            text: 'Sign-up successful. Redirecting...',
            icon: 'success',
            confirmButtonText: 'OK',
          }).then(() => {
            window.location.href = '/main_page';
          });
        }
      } catch (error) {
        Swal.fire({
          title: 'Error!',
          text: 'An unexpected error occurred. Please try again later.',
          icon: 'error',
          confirmButtonText: 'OK',
        });
      }
    });
  </script>
  <script src="sweetalert2.all.min.js"></script>
</body>
</html>
