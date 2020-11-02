<?php if(count($_SESSION[$erreur]) > 0): ?>

    <div class="exception">
        <?php foreach ($_SESSION[$erreur] as $erreurs): ?>
            <p><?php echo $erreurs; ?></p>
        <?php endforeach ?>
    </div>
    
<?php endif ?>