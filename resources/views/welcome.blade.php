@vite('resources/css/app.css')
<body class="flex items-center justify-center min-h-screen bg-[#185863] font-poppins">
  <div class="text-center">
    <h1 class="text-white text-5xl font-bold mb-4">Permudah dengan LAPAR</h1>
    <p class="text-white text-2xl mb-8">Atur kalori, kendalikan diri</p>

    <a href="#" id="getStartedButton"
      class="px-6 py-3 text-lg font-semibold text-[#185863] bg-white rounded-lg shadow-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-400">
      Mulai Sekarang
    </a>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    document.getElementById("getStartedButton").addEventListener("click", function(event) {
      event.preventDefault();
      Swal.fire({
        title: "Apakah anda ingin login?",
        icon: "question",
        showCancelButton: true,
        confirmButtonText: "Login",
        cancelButtonText: "Lanjutkan Tanpa Login"
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = "{{route('login.page')}}";
        } else {
          window.location.href = "{{route('main.main_page')}}";
        }
      });
    });
  </script>
</body>
