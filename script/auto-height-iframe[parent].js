// JavaScript source code
<script>
window.addEventListener('message', function(event) {
    var iframe = document.getElementById('indexIframe');
    if (event.origin !== "http://localhost/quanan/source/menu.php") // replace with the origin of index.php
        return;
    iframe.style.height = event.data + 'px';
}, false);
</script>
