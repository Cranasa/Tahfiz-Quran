@if (session()->has('success'))
  <script>
      Toastify({
        text: "{{ session('success') }}",
        duration: 3000,
        close: true,
        gravity: "top",
        position: "center",
        backgroundColor: "#198754",
      }).showToast();
  </script>
@elseif (session()->has('info'))
  <script>
      Toastify({
        text: "{{ session('info') }}",
        duration: 3000,
        close: true,
        gravity: "top",
        position: "center",
        backgroundColor: "#0dcaf0",
      }).showToast();
  </script>
@elseif (session()->has('warning'))
  <script>
      Toastify({
        text: "{{ session('warning') }}",
        duration: 3000,
        close: true,
        gravity: "top",
        position: "center",
        backgroundColor: "#ffc107",
      }).showToast();
  </script>
@elseif (session()->has('error'))
  <script>
      Toastify({
        text: "{{ session('error') }}",
        duration: 3000,
        close: true,
        gravity: "top",
        position: "center",
        backgroundColor: "#dc3545",
      }).showToast();
  </script>
@endif
