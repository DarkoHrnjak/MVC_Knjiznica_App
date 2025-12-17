<main>
    <div class="form-box">
        <h2>Prijava</h2>
        <?php if(!empty($error)): ?>
            <p style="color:red"><?= $error ?></p>
        <?php endif; ?>
        <form action="POST">
            <label>Koriničko ime</label>
            <input type="text" name="korime">

            <label>Lozinka</label>
            <input type="password" name="sifra">

            <button type="submit">Prijavi se</button>
        </form>
    </div>
</main>