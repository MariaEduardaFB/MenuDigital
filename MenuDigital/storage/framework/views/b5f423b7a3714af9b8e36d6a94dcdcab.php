<form method="POST" action="<?php echo e(url('/login')); ?>">
    <?php echo csrf_field(); ?>
    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
    </div>

    <div>
        <label for="password">Senha:</label>
        <input type="password" id="password" name="password" required>
    </div>

    <button type="submit">Login</button>
</form>
<?php /**PATH C:\xampp\htdocs\MenuDigital\MenuDigital\resources\views/login.blade.php ENDPATH**/ ?>