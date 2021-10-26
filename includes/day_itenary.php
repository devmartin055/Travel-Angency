<?php
if (isset($_SESSION["addPackage"]["day"])) {
    for ($i = 0; $i < $_SESSION["addPackage"]["day"]; $i++) {
        echo "
                <div class='row mb-3 bg-skyblue rounded p-lg-3'>
                    <div class='container-fluid'>
                        <div class='row mb-3'>
                            <div class='col'>
                                <span class='h3'>Day " . ($i + 1) . " </span>
                            </div>
                        </div>
                        <div class='row justify-content-center mb-3'>
                            <div class='col-12 col-lg-3 text-lg-right'>
                                <label for='destination" . ($i + 1) . "'>Destination <span class='text-danger'>*</span></label>
                            </div>
                            <div class='col-12 col-lg-8'>
                                <input value='"; if (isset($_SESSION["addPackage"]["itenary"]["destination"][$i])) {
                                                echo $_SESSION["addPackage"]["itenary"]["destination"][$i];}
                                                echo "' name='destination[{$i}]' id='destination" . ($i + 1) . "' type='text' class='form-control'>
                            </div>
                        </div>
                        <div class='row justify-content-center mb-3 '>
                            <div class='col-12 col-lg-3  text-lg-right'>
                                <label for='description" . ($i + 1) . "'>Description <span class='text-danger'>*</span></label>
                            </div>
                            <div class='col-12 col-lg-8'>
                                <textarea name='description[{$i}]' class='form-control' id='description1' cols='30' rows='5'>";if (isset($_SESSION["addPackage"]["itenary"]["description"][$i])) {
                                    echo $_SESSION["addPackage"]["itenary"]["description"][$i];
                                    }
                                    echo "</textarea>
                            </div>
                        </div>
                    </div>
                </div>";
    }

    if (isset($_SESSION["addPackage"]["itenary"]["destination"]) && count($_SESSION["addPackage"]["itenary"]["destination"]) > $_SESSION["addPackage"]["day"]) {
        $size = count($_SESSION["addPackage"]["itenary"]["destination"]);

        for ($i = $_SESSION["addPackage"]["day"]; $i < $size; $i++) {
            unset($_SESSION["addPackage"]["itenary"]["destination"]);
            unset($_SESSION["addPackage"]["itenary"]["description"]);
        }
    }
}
