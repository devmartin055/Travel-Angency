<!-- inclusion, itenerary, accomodation tab -->

<?php
if (isset($_POST["it_destination"]) && isset($_POST["it_description"])) {
    $destination = explode("/-breakhear-/", $_POST["it_destination"]);
    $description = explode("/-breakhear-/", $_POST["it_description"]);

    $itenary = array_combine($destination, $description);
    $i = 1;
    echo "<div class='selected-tab-container'>";

    foreach ($itenary as $key => $value) {
        echo "  <div class='item'>
                    <h4 class='item-heading'>Day {$i}</h4>
                    <div class='container'>
                        <p class='item-desrcription'>
                            {$key}
                        </p>
                        <p class='item-desrcription'>
                            {$value}
                        </p>
                    </div>
                </div>";
                $i++;
    }
    echo "</div>";
}


?>


<!-- <div class='selected-tab-container'>
    <div class='item'>
        <h4 class='item-heading'>Day 1</h4>
        <div class='container'>
            <p class='item-desrcription'>
                <b> Manila Airport</b><br>
                Arrive 3 hours before the departure time <br>
                Fly to Incheon, South Korea (About 4 hours)<br>
                Meals on-board<br>
            </p>
        </div>
    </div>
    <div class='item'>
        <h4 class='item-heading'>Day 2</h4>
        <div class='container'>
            <p class='item-desrcription'>
                <b> Incheon International Airport</b><br>
                Meet your local tour guide and transfer for breakfast.<br>
                Breakfast at the local restaurant (Osam Bulgogi)<br>
                Travel to Nami Island by bus (About 2 hours & 30 mins) and ferry<br>
                (About 5-10 mins)<br>
                <b> GANGWON, SOUTH KOREA</b><br>
                <br>
                <b> Nami Island</b><br>
                A man-made and a half moon shaped island known as the filming location of famous
                Korean Dramas. This is the shooting place of “Winter Sonata”, a popular Korean
                television series. It is also the filming location of the first-ever Filipino-Korean romantic
                comedy series “My Korean Jagiya” aired in year 2017 starred by Heart Evangelista and
                Alexander Lee. A short ferry boat ride will bring you to this scenic island that has
                beautiful tree lanes, riverside walks, woodlands and a picture-perfect scenery. (Stay for
                about 1 hour)
                <br>
                Lunch at the local restaurant (Chicken BBQ)<br>
                Travel to Petite France by bus<br>
                <br>
                <b>GYEONGGI, SOUTH KOREA</b><br>
                <br>
                <b>Petite France</b><br>
                This French cultural village contains 16 French-style buildings, where visitors can
                experience French food, clothing, and household culture. The village has a memorial
                hall for the author of Le Petite Prince – Saint-Exupery, thus having it called as Little
                Prince Theme Park. There is also a gallery and shop for varied experiences.
                <br>
                Travel to Seoul by bus (About 1 hour)<br>
                <br>
                <b>SEOUL, SOUTH KOREA</b><br>
                <br>
                N Seoul Tower and Lovelock Deck<br>
                This is the iconic symbol of Seoul that sits atop Namsan Mountain which offers
                panoramic views of the city. Visit Lovelock located at the foot of the tower where you
                can see thousands of padlocks hang around the fence and railings surrounding the
                view deck. The couples inscribed their sweetheart names, initials or dates etc. in the
                padlock and its key is thrown away to symbolize unbreakable love.<br>
                <br>
                Dinner at the local restaurant (Korean Bulgogi)<br>
                Check in at hotel<br>

                <b>Hotel </b><br>
                SEOUL - Stanford Hotel Seoul, 4 Star (1 night<br>

                <b> Meal </b><br>
                1 Breakfast<br>
                1 Lunch<br>
                1 Dinner<br>
            </p>
        </div>

    </div>
    
   <div class='item'>
            <h4 class='item-heading'>Day 1</h4>
            <div class='container'>
                <p class='item-desrcription'>
                    <b> Manila Airport</b>
                    Arrive 3 hours before the departure time <br>
                    Fly to Incheon, South Korea (About 4 hours)<br>
                    Meals on-board<br>
                </p>
            </div>

        </div> 
</div> -->