<?php ?>
<main class="home-page">
  <section class="hero-section">
    <h1 class="hero-title">Welcome to FoodFusion</h1>
    <h2 class="hero-subtitle">Bringing People Together Through Food</h2>
    <p class="hero-description">
      FoodFusion is a vibrant online culinary platform designed to inspire home cooking, celebrate cultural diversity, and connect food lovers from around the world.
      Whether you are a beginner in the kitchen or an experienced home chef, FoodFusion provides the tools, recipes, and community support to help you explore your culinary creativity.
    </p>
  </section>


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


  <section class="mission-section">
    <h2 class="section-title">Our Mission</h2>
    <p>
      At FoodFusion, our mission is to encourage healthy, creative, and enjoyable home cooking while building a supportive food community.
      We aim to make cooking accessible to everyone by sharing easy-to-follow recipes, practical cooking tips, and educational culinary resources.
    </p>
  </section>

  <section class="featured-section">
    <h2 class="section-title">What's Cooking at FoodFusion?</h2>

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

    <p class="featured-description">
      Discover our latest featured recipes and trending culinary ideas from around the world.
      From traditional comfort foods to modern fusion dishes, our curated content highlights seasonal ingredients, popular food trends, and community favourites.
    </p>
  </section>





  <!-- Section: Recipe of the Day -->
  <section class="recipe-section">
    <div class="recipe-card">
      <div class="recipe-image">
        <img id="mealImage" src="" alt="Meal Image" />
      </div>
      <div class="recipe-content">
        <h3 class="recipe-title">Recipe of the day</h3>
        <p class="recipe-description" id="mealDescription">Please wait while we fetch a delicious recipe!</p>
        <h4><strong id="mealTitle">Loading...</strong></h4>
        <button type="button" class="btn-primary" id="readMoreBtn">Read more</button>
      </div>
    </div>
  </section>






  <section class="trends-section">
    <h2 class="section-title">Current Culinary Trends</h2>
    <ul class="trends-list">
      <li>Trending international cuisines</li>
      <li>Healthy and dietary-friendly recipes</li>
      <li>Easy desserts and baking ideas</li>
    </ul>
    <p class="trends-note">Stay up to date with what's new in the FoodFusion kitchen!</p>
  </section>

  <section class="community-section">
    <h2 class="section-title">Join the FoodFusion Community Today!</h2>
    <p>Sign up to become part of a growing community of food lovers. As a member, you can:</p>
    <ul class="benefits-list">
      <li>Save your favourite recipes</li>
      <li>Share your own dishes and cooking tips</li>
      <li>Participate in community discussions</li>
      <li>Access exclusive culinary resources</li>
    </ul>
    <p>Sign up now and start your FoodFusion journey!</p>
    <!-- Join Now button opens the modal -->
    <button type="button" class="join-btn" data-bs-toggle="modal" data-bs-target="#joinModal">Join Now!!</button>
  </section>

  <!-- Registration Modal Section -->
  <div class="modal fade" id="joinModal" tabindex="-1" aria-labelledby="joinModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="joinModalLabel">Welcome to FoodFusion!</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Become part of our growing community.</p>
          <form action="#" method="POST" id="join-form" class="join-form">
            <div class="mb-3">
              <label for="first_name" class="form-label">First Name:</label>
              <input type="text" class="form-control" id="first_name" name="first_name" required>
            </div>
            <div class="mb-3">
              <label for="last_name" class="form-label">Last Name:</label>
              <input type="text" class="form-control" id="last_name" name="last_name" required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email:</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password:</label>
              <input type="password" class="form-control" id="password" name="password" required minlength="8">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" form="join-form" name="submitted" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </div>
  </div>
</main>