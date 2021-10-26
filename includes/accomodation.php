<?php

echo "<div class='selected-tab-container'>";
echo "<div class='item'>
            <h4 class='item-heading'>{$_POST['h_name']}</h4>
            <div class='container'>
                <p class='item-desrcription'>
                    Address & Contact <br>
                    {$_POST['h_address']}<br>
                    ☎ {$_POST['h_contact']}<br>
                </p>
            </div>
        </div>";

echo "<div class='item'>
            <h4 class='item-heading'>Description</h4>
            <div class='container'>
                <p class='item-desrcription'>
                    {$_POST['h_description']}
                </p>
            </div>
        </div>";
echo " <div class='item'>
            <h4 class='item-heading'>Photo</h4>
            <div class='container'>
                <p class='item-desrcription'>
                <div class='row justify-content-center'>
                    <div class='col-12 col-lg-8 '>
                        <img class='img-thumbnail' src='../uploads/{$_POST['h_image']}'>
                    </div>
                </div>
                </p>
            </div>
        </div>";
echo "</div>"


?>