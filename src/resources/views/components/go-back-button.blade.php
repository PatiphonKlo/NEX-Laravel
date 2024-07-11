<script>
    function goBack() {
      window.history.back();
    }
</script>

<button onclick="goBack()" class="{{ $class ?? '' }} {{ $attributes }}>
    {{ $slot }}
</button>
