<html>

<body>
    <style>
        #ref {
            background-color: beige;
            border: 1px solid black;
            padding: 10px;
        }
        #ref a {
            padding: 20px;
        }
    </style>
    <h1>Eiriks Prøver 24.10.22</h1>
    <div>
        <div id="ref"><?php
                //finn alle directories og put dem i en array
                $directories = glob('./*', GLOB_ONLYDIR);
                
                //gå igjennom alle elementer og print et a element som linker til directorien
                foreach ($directories as $dir) {
                    if($dir != "./media"){
                        echo ("<a target='john' href='" . $dir . "/index.php' >" . ltrim($dir,"./") . "</a>");
                    }
                }
                ?>
        </div>
    </div>
    <iframe src="" name="john" frameborder="2" width="800" height="400"></iframe>
</body>

</html>