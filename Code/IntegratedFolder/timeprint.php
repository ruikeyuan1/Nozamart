
    <?php
        require 'Carbon-2.57.0/autoload.php';

        use Carbon\Carbon;
        
        $current = Carbon::now();

        
        printf("Now: %s", Carbon::now());
    ?>
