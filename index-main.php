<?php ?>
<main>
  <h1>Welcome to FoodFusion</h1>
  <h2>Bringing People Together Through Food</h2>

  <p>
    FoodFusion is a vibrant online culinary platform designed to inspire home cooking, celebrate cultural diversity, and connect food lovers from around the world.
    Whether you are a beginner in the kitchen or an experienced home chef, FoodFusion provides the tools, recipes, and community support to help you explore your culinary creativity.
  </p>


  <!--   <section id="news-feed">
    <h2>Featured Recipes and Culinary Trends</h2>
    <ul>
      <?php
      // RSS feed URL
      /* $rss = simplexml_load_file('https://caribbeanpot.com/feed/');
      if ($rss === false) {
        echo "<li>Unable to load news feed.</li>";
      } else {
        // Loop through first 5 items
        $count = 0;
        foreach ($rss->channel->item as $item) {
          if ($count >= 5) break;
          $title = htmlspecialchars($item->title);
          $link = htmlspecialchars($item->link);
          $desc = htmlspecialchars(strip_tags($item->description));
          echo "<li>
                    <a href='$link' target='_blank          <small>$desc</small>
                  </li>";
          $count++;
        }
      } */
      ?>
    </ul>
  </section> -->


  <h2>Our Mission</h2>
  <p>
    At FoodFusion, our mission is to encourage healthy, creative, and enjoyable home cooking while building a supportive food community.
    We aim to make cooking accessible to everyone by sharing easy-to-follow recipes, practical cooking tips, and educational culinary resources.
  </p>

  <h2>What’s Cooking at FoodFusion?</h2>

  <!-- Slideshow Section -->
  <div class="slideshow-container">
    <div class="mySlides fade">
      <div class="numbertext">1 / 3</div>
      <img src="pics/fresh-vegetable-salad-with-grilled-chicken-breast.jpg" alt="Grilled Chicken Breast">
      <div class="text">Grilled Chicken Breast</div>
    </div>

    <div class="mySlides fade">
      <div class="numbertext">2 / 3</div>
      <img src="pics/hot-spicy-stew-eggplant-sweet-pepper-olives-capers-with-basil-leaves.jpg" alt="Stew eggplant">
      <div class="text">Stew eggplant</div>
    </div>

    <div class="mySlides fade">
      <div class="numbertext">3 / 3</div>
      <img src="pics/penne-pasta-tomato-sauce-with-chicken-tomatoes-wooden-table.jpg" alt="Pene Pasta">
      <div class="text">Penne-pasta</div>
    </div>

    <!-- Slideshow Buttons Next/Previous -->
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
  </div>

  <!-- Dots for the slide navigation -->
  <div class="dots" style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
  </div>

  <div class="clearfloat"></div>

  <p>
    Discover our latest featured recipes and trending culinary ideas from around the world.
    From traditional comfort foods to modern fusion dishes, our curated content highlights seasonal ingredients, popular food trends, and community favourites.
  </p>




  <!-- Meal of the Day card -->
  <div id="mealCard" class="card meal-card shadow-sm">
    <img id="mealImg" src="" class="card-img-top" alt="Meal image">
    <div class="card-body">
      <span class="badge text-bg-danger mb-2">Meal of the Day</span>
      <h5 id="mealTitle" class="card-title">Loading...</h5>
      <p id="mealPreview" class="card-text">Fetching a delicious recipe...</p>
      <a href="#" id="viewBtn" class="btn btn-primary">View Recipe</a>
    </div>
  </div>


  <!-- Details Modal -->
  <div class="modal fade" id="mealModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 id="modalTitle" class="modal-title">Recipe</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"
            aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <img id="modalImg" src="" class="img-fluid rounded mb-3" alt="">
          <p class="mb-2">
            <span class="badge text-bg-info me-1" id="modalCategory"></span>
            <span class="badge text-bg-secondary" id="modalArea"></span>
          </p>
          <h6>Ingredients</h6>
          <ul id="modalIngredients" class="mb-3"></ul>
          <h6>Instructions</h6>
          <p id="modalInstructions" class="mb-3"></p>
          <div id="youtubeWrap" class="ratio ratio-16x9 d-none">
            <iframe id="modalYoutube" src="" title="Recipe Video" allowfullscreen></iframe>
          </div>
        </div>
        <div class="modal-footer">
          <a id="modalSource" class="btn btn-outline-secondary d-none" target="_blank">Source</a>
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


  ``


  <ul>
    <li>Trending international cuisines</li>
    <li>Healthy and dietary-friendly recipes</li>
    <li>Easy desserts and baking ideas</li>
  </ul>

  <p>Stay up to date with what’s new in the FoodFusion kitchen!</p>

  <h2>Join the FoodFusion Community Today!</h2>
  <p>Sign up to become part of a growing community of food lovers. As a member, you can:</p>

  <ul>
    <li>Save your favourite recipes</li>
    <li>Share your own dishes and cooking tips</li>
    <li>Participate in community discussions</li>
    <li>Access exclusive culinary resources</li>
  </ul>

  <p>Sign up now and start your FoodFusion journey!</p>

  <!-- Join Now button opens the modal -->
  <button id="myBtn" type="button">Join Now!!</button>

  <!-- Registration Modal Section -->
  <div id="myModal" class="modal" role="dialog" aria-modal="true" aria-labelledby="joinModalTitle">
    <div class="modal-content">
      <button class="close" type="button" aria-label="Close">&times;</button>

      <h2 id="joinModalTitle">Welcome to FoodFusion!</h2>
      <p>Become part of our growing community.</p>
      <form action="#" method="POST">
        <label for="first_name">First Name:</label>
        <input id="first_name" type="text" name="first_name" required><br>

        <label for="last_name">Last Name:</label>
        <input id="last_name" type="text" name="last_name" required><br>

        <label for="email">Email:</label>
        <input id="email" type="email" name="email" required><br>

        <label for="password">Password:</label>
        <input id="password" type="password" name="password" required minlength="8"><br>

        <button name="submitted" type="submit">Submit</button>
      </form>

    </div>
  </div>

  </div>
</main>