<?php if(count($erreur) > 0): ?>

    <div class="exception">
        <?php foreach ($erreur as $erreurs): ?>
            <p><?php echo $erreurs; ?></p>
        <?php endforeach ?>
    </div>
    
<?php endif ?>