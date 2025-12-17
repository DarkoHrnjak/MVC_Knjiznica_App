<main>
    <div class="form-box">
        <h2>Aktivacija računa</h2>

        <p>Kliknite ispod na link za aktivaciju računa</p>

        <p>
            <a href="index.php?page=activate&key=<?= $_SESSION['activation']['key'] ?>">Aktiviraj račun</a>
        </p>

        <form method="POST">
            <?php
                $recivername = $reciveremail = "";
                if(isset($_SESSION['activation']['ime']) && isset($_SESSION['activation']['prezime'])){
                    $recivername = $_SESSION['activation']['ime']." ".$_SESSION['activation']['prezime'];
                    $reciveremail = $_SESSION['activation']['email'];
                }
            ?>
            <input type="hidden" name="recivername" value="<?= $recivername ?>">
            <input type="hidden" name="email" value="<?= $reciveremail ?>">
            <button name="sendMail">Pošalji mail</button>
        </form>
    </div>
</main>