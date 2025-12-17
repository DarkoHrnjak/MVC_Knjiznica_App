<main>
    <div class=""form-box>
        <h2>Račun uspješno aktiviran</h2>

        <p>
            Vaš Račun je uspješno aktiviran.
            Za nekoliko sekundi bit ćete presumjereni na stranicu za prijavu.
        </p>

        <p>
            Ako se redirekcija ne dogodi automatski,
            <a href="index.php?page=login">kliknite ovdje</a>
        </p>
    </div>
</main>
<script>
    setTimeout(function (){
        window.location.href="index.php?page=login";
    },3000);
</script>