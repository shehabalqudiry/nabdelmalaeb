@if (session('success'))
    <script type="text/javascript">
        new Noty({
            type: 'success',
            layout: 'topRight',
            text: "{{ session('success') }}",
            timeout: 6000 ,
            killer: true ,
        }).show();
    </script>
@endif

