<script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <script>
        function onSubmit(onSubmit) {
        document.getElementById("{{ $slot }}").submit();
        }
</script>
