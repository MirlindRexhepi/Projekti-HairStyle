<?php
if (isset($_POST['login'])) {
    login($_POST['email'], $_POST['fjalekalimi']);
}
?>
<aside id="sidebar">
    <?php
    if(!isset($_SESSION['antari'])){
    ?>
    <form id="login" class="boxx" method="POST">
        <legend>Forma për hyrje</legend>
        <fieldset>
            <label>Email: </label>
            <input type="email" id="email" name="email">
        </fieldset>
        <fieldset>
            <label>Fjalekalimi: </label>
            <input type="password" id="fjalekalimi" name="fjalekalimi">
        </fieldset>
        <input type="submit" name="login" id="login" value="Kycu">
    </form>
    <?php }
    ?>
    
    <script src="jquery-3.6.0.js"></script>
    <script src="slick.min.js"></script>
    <script src="jquery.validate.min.js"></script>
    <script>
            $("#login").validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    fjalekalimi: {
                        required: true,
                    }
                },
                messages: {

                    fjalekalimi: {
                        required: "Ju lutem shkruani fjalekalimin",
                    },
                    email: {
                        required: "Ju lutem shkruani emailin",
                    }
                }

            });
            </script>
</html>
