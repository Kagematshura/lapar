@vite('resources/css/app.css')
<body class="flex items-center justify-center min-h-screen bg-[#185863]">

  <div class="w-full max-w-lg p-6 bg-[#E8F6F9] rounded-lg shadow-lg">

    <div class="flex justify-center mb-6">
      <button
        id="toggle-signup"
        class="px-4 py-2 text-sm font-semibold text-gray-600 bg-gray-300 rounded-l-lg focus:outline-none toggle-button"
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

      <form
        id="signup-form"
        action="/signup"
        method="POST"
        class="transition-all duration-300 transform opacity-100">
        <h2 class="text-2xl font-semibold text-center text-gray-800">Sign Up</h2>
            <a
            href="#"
            class="flex items-center justify-center px-2 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-full hover:bg-gray-100">
            <img
                src="https://www.svgrepo.com/show/355037/google.svg"
                alt="Google Logo"
                class="w-5 h-5 mr-2"/>
                Continue with Google
            </a>
        <div class="mt-6">
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

      <form
        id="login-form"
        action="/login"
        method="POST"
        class="absolute top-0 left-0 w-full transition-all duration-300 transform opacity-0 -translate-x-full">
        <h2 class="text-2xl font-semibold text-center text-gray-800">Log In</h2>
        <div class="mt-6">
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

        <div>
            <a
            href="#"
            class="flex items-center justify-center px-2 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-full hover:bg-gray-100">
            <img
                src="https://www.svgrepo.com/show/355037/google.svg"
                alt="Google Logo"
                class="w-5 h-5 mr-2"/>
                Continue with Google
            </a>
        </div>

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
    //toggle nya gk nyala bejirr
    const toggleButtons = document.querySelectorAll('.toggle-button');
    const signupForm = document.getElementById('signup-form');
    const loginForm = document.getElementById('login-form');

    toggleButtons.forEach((button) => {
      button.addEventListener('click', () => {
        const target = button.getAttribute('data-target');

        //masih sloppy
        if (target === 'signup') {
          signupForm.style.opacity = '1';
          signupForm.style.transform = 'translateX(0)';
          loginForm.style.opacity = '0';
          loginForm.style.transform = 'translateX(-100%)';
        } else {
          loginForm.style.opacity = '1';
          loginForm.style.transform = 'translateX(0)';
          signupForm.style.opacity = '0';
          signupForm.style.transform = 'translateX(100%)';
        }
      });
    });
  </script>
</body>
