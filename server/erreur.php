
<?php if(count($_SESSION['error']) > 0): ?>

    <?php $errors = $_SESSION['error']; ?>

    <p>ok ça marche</p>
    <div class="exception">
        <?php foreach ($errors as $values): ?>
            <p><?php echo $values; ?></p>
        <?php endforeach ?>
    </div>
    
<?php endif ?>
