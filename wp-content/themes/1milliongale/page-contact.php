<?php
/*
* Template name: page no sidebar
*/
?>
<?php get_header(); /*get the header*/ ?>
<main class="container nosidebar">
    <div class="main-content">
        <p> Prueba de que estas en page-contact</p>

        <form action="procesaFormulario.php" method="post">
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="message">Mensaje:</label>
            <textarea id="message" name="message" rows="5" required></textarea>
            
            <button type="submit">Enviar</button>
        </form>
        
    </div>
</main>
<?php get_footer() /*get the footer*/ ?>