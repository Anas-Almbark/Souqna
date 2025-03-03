@if (session()->has('success'))
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            toastr.success("{{ session('success') }}", "نجاح!", {
                closeButton: true,
                progressBar: true,
                positionClass: "toast-top-right",
                timeOut: 3000
            });
        });
    </script>
@endif