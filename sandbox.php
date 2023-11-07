<div class=" d-flex justify-content-center p-5">
    <div>
        <h1 class="text-center mb-5 fw-bold">Probando cosas</h1>
        <div class="row mb-5 d-flex align-items-center">
            <div class="col">
                <?PHP
                echo "<pre>";
                print_r($_SESSION);
                echo "<pre>";
                
                echo "Su HASH ES: " .password_hash("123", PASSWORD_DEFAULT);
                //(new Autenticacion)->log_in("jorpesta", "1234password");

                ?>
            </div>
        </div>
    </div>
</div>