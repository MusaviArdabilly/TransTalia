@if (session('success'))
    <script>
        toastr.success('{{ session('success') }}', { timeOut: 9500 }, { positionClass: 'toast-bottom-right' });
    </script>
@endif