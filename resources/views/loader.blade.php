<div id="loader" class="loader">
    <!-- Contenido del loader, como un spinner o una animación -->
    Cargando...
</div>

<style>
    /* Estilos CSS para el loader */
    .loader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.844);
        z-index: 9999;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #fff;
        font-size: 20px;
        transition: all 0.5s linear;
    }
</style>

<script>
    // Script para ocultar el loader una vez que la página haya cargado
    window.addEventListener('load', function () {
        var loader = document.getElementById('loader');
        loader.style.display = 'none';
    });
</script>