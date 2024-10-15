<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSC356 | Martian Safari </title>
    <link rel="stylesheet" href="style/main.css">
</head>
<body>
    <!-- Name Generate by chat-gpt -->
    <h1>Martian Safari</h1>
    <div class="logoDiv">
        <img src="assets/placeholder-logo.png">
    </div>

    <main>
        <section class="description">
            <h2>About Our Company</h2>
            <p>
            In this tour, you will embark on an unforgettable journey to discover the wonders of the Red Planet, Mars. As you explore the rocky terrain, you'll be captivated by the breathtaking views that stretch across the horizon, showcasing the planet's unique landscapes. Our luxury hotel provides the perfect retreat after a day of adventure, allowing you to relax in comfort while soaking in the incredible Martian scenery. Here on Mars, the possibilities are truly endless; whether you're hiking through ancient riverbeds, marveling at towering volcanoes, or stargazing under the pristine skies, each moment is filled with discovery and awe. Get ready for an experience that will ignite your imagination and leave you with memories to cherish for a lifetime!
            </p>
            <h2>Cost</h2>
            <P>
                For only the low low price of 
                <span class="price">
                    <span>$</span><span>9</span><span>9</span><span>9</span><span>.</span><span>9</span><span>9</span><span>M</span><span>i</span><span>l</span><span>l</span><span>i</span><span>o</span><span>n</span>
                </span>
                you too can visit mars and enjoy its wonders! (Also aviable for 365 payments $2.73 Million)
            </P>
        </section>
        <section class="application">
            <h2>Pilot Application</h2>
            <form id="application" action="result.php" method="post">
                <div>
                    <label for="fName">First Name</label>
                    <input name="fName" id="fName" type="text" required>
                </div>
                <div>
                    <label for="lName">Last Name</label>
                    <input name="lName" id="lName" type="text">
                </div>
                <div>
                    <label for="age">Age</label>
                    <input name="age" id="age" type="text" required>
                </div>
                <div>
                    <label for="experince">Expereince</label>
                    <input name="experince" type="range" min="1" max="5" id="experince" required>
                </div>
                <div>
                    <label for="agreement">TOS Agreement</label>
                    <input name="agreement" type="checkbox" id="agreement" required>
                </div>
                <input type="submit">
            </form>
        </section>
    </main>
    <script src="script/main.js"></script>
</body>
</html>