<?php
/* replace all \n with <br> */
$flight = str_replace("\n", "<br>", $_POST["i_flight"]);
$hotel = $_POST["h_name"];
$meal = str_replace("\n", "<br>", $_POST["i_meals"]);
$tours = str_replace("\n", "<br>", $_POST["i_tours"]);
$guide = $_POST["i_guide"];
$insurance = $_POST["i_insurance"];

echo "<div class='selected-tab-container'>";
echo "  <div class='item'>
            <h4 class='item-heading'>Flight</h4>
                <div class='container'>
                    <p class='item-desrcription'>
                    {$flight}
                    </p>
                </div>
            </div>
        </div>";
echo "  <div class='item'>
            <h4 class='item-heading'>Hotel</h4>
            <div class='container'>
                <p class='item-desrcription'>
                    {$hotel}
                </p>
            </div>
        </div>";
echo "  <div class='item'>
        <h4 class='item-heading'>Meal</h4>
        <div class='container'>
            <p class='item-desrcription'>
                3 Breakfast at the hotel and 1 Breakfast at the local restaurant<br>
                3 Lunch at the local restaurant<br>
                2 Dinner at the local restaurant<br>
            </p>
        </div>";
echo "  <div class='item'>
            <h4 class='item-heading'>Tour</h4>
            <div class='container'>
                <p class='item-desrcription'>
                {$tours}
                </p>
            </div>
        </div>";
echo "  <div class='item'>
            <h4 class='item-heading'>Giude</h4>
            <div class='container'>
                <p class='item-desrcription'>
                   {$guide}
                </p>
            </div>
        </div>";
echo "  <div class='item'>
            <h4 class='item-heading'>Insurance</h4>
            <div class='container'>
                <p class='item-desrcription'>
                    {$insurance}
                </p>
            </div>
        </div>";  
echo "</div>";
