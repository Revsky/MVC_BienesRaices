<footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <div class="navegacion">
                <a href="nosotros.php">Nosotros</a>
                <a href="anuncios.php">Anuncios</a>
                <a href="blog.php">Blog</a>
                <a href="contacto.php">Contacto</a>
            </div>
        </div>

        <?php 
            $fecha = date('Y'); /* Obtenemos el año actual para actualizarlo en automatico */
        ?>
        <p class="copyright">Todos los Derechos Reservados <?php echo $fecha ?> &copy;</p>

    </footer>

    <script src="/build/js/bundle.js"></script>

</body>
</html>