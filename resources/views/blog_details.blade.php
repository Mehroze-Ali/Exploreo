@extends('layouts.app')

@section('title', 'Blog Post')

@section('content')
    <header id="page-hero">
      <img
        src="https://picsum.photos/seed/blog-details-hero/1920/800"
        alt="Hero Image"
        id="blogHeroImage"
      />
      <h1 class="hero-banner-title" id="blogHeroTitle">LOADING...</h1>
    </header>
    <main class="py-5">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-10">
            <!-- Article Header -->
            <div class="mb-4">
              <span class="badge mb-2" id="blogPostCategoryBadge">Loading...</span>
              <h2
                class="display-5 fw-bold text-deep-navy mb-3"
                id="blogPostTitle"
              >
                Loading Title...
              </h2>
              <div class="d-flex align-items-center text-muted small">
                <span class="me-3" id="blogPostDate"
                  ><i class="fas fa-calendar-alt"></i> ...</span
                >
                <span id="blogPostAuthor"><i class="fas fa-user"></i> ...</span>
              </div>
            </div>

            <!-- Article Content -->
            <div
              class="article-content text-deep-navy"
              id="blogPostContent"
              style="line-height: 1.8; font-size: 1.1rem"
            >
              <p>Loading content...</p>
            </div>

            <hr class="my-5" />

             <!-- Comments Section -->
            <div class="mt-5">
              <h3 class="fw-bold text-deep-navy mb-4" id="commentsCount">0 Comments</h3>

              <!-- Comment Form -->
              <div class="card mb-4 bg-light border-0">
                  <div class="card-body">
                      <h5 class="card-title fw-bold mb-3">Leave a Comment</h5>
                      <form id="commentForm">
                          <div class="mb-3">
                              <input type="text" class="form-control" placeholder="Your Name" required>
                          </div>
                          <div class="mb-3">
                              <textarea class="form-control" rows="3" placeholder="Join the discussion..." required></textarea>
                          </div>
                          <button type="submit" class="btn btn-primary-custom">Post Comment</button>
                      </form>
                  </div>
              </div>

               <!-- Comments List -->
              <div id="commentList">
                  <!-- Comments injected by JS (or static placeholders) -->
                  <div class="comment-box border-bottom pb-3 mb-3">
                      <p class="mb-0 comment-author fw-bold">Traveler101 <span class="comment-date text-muted fw-normal small">| 2 days ago</span></p>
                      <p class="small mt-1 mb-0">Great tips! I'm planning a trip there next summer.</p>
                  </div>
              </div>
            </div>

            <div class="text-center mt-5">
                <a href="{{ route('blog') }}" class="btn btn-outline-dark"><i class="fas fa-arrow-left me-2"></i>Back to Blog</a>
            </div>

          </div>
        </div>
      </div>
    </main>
@endsection

@push('scripts')
<script>
      // --- MOCK BLOG DATA ---
      const blogPosts = [
        {
          id: "1",
          title: "The Ultimate 48-Hour Guide to Paris",
          category: "City Breaks",
          categoryBadgeClass: "bg-primary-custom",
          date: "May 1, 2025",
          author: "Jane Doe",
          heroImage: "https://picsum.photos/seed/paris-blog-hero/1920/800",
          content: `
                    <p>Ah, Paris! The City of Lights, romance, and unparalleled culture. While a lifetime isn't enough to explore its every nook, 48 hours can be a magical sprint through its highlights. This guide is crafted for the intrepid traveler looking to soak in as much Parisian charm as possible without feeling rushed.</p>
                    <img src="https://picsum.photos/seed/eiffel-blog/800/500" alt="Eiffel Tower at sunset" class="img-fluid rounded my-4">
                    <h2>Day 1: Iconic Landmarks & Artistic Flair</h2>
                    <p>Start your morning bright and early at the Eiffel Tower. Pre-book your tickets online to avoid long queues. Ascend to the summit for breathtaking panoramic views of the city as it awakens. After descending, take a leisurely stroll along the Champ de Mars, perhaps grabbing a croissant from a nearby boulangerie.</p>
                    <p>Next, make your way to the Louvre Museum. Even if you're not an art aficionado, a quick visit to see the Mona Lisa and the Venus de Milo is essential. Remember, the Louvre is vast; prioritize what you want to see. For lunch, explore the charming Latin Quarter with its narrow streets and diverse eateries. Enjoy a crêpe or a traditional French sandwich.</p>
                    <p>The afternoon calls for a journey to Notre Dame Cathedral (viewable from outside during its restoration) and a walk along the Seine River. Consider a Bateaux-Mouches river cruise for a different perspective of the city's architecture. As evening approaches, immerse yourself in the bohemian spirit of Montmartre. Visit Sacré-Cœur Basilica, enjoy the street artists at Place du Tertre, and finish your day with a delicious French dinner.</p>
                    <h2>Day 2: Culture, Shopping & Hidden Gems</h2>
                    <p>Begin your second day with a visit to the Musée d'Orsay, housed in a magnificent former railway station, famous for its impressionist masterpieces. Afterward, indulge in some window shopping (or actual shopping!) along the Champs-Élysées, leading up to the majestic Arc de Triomphe. You can climb to the top for another fantastic view, especially good for sunset.</p>
                    <img src="https://picsum.photos/seed/champs-blog/800/500" alt="Champs-Élysées with Arc de Triomphe" class="img-fluid rounded my-4">
                    <p>For a taste of local Paris, head to Le Marais district in the afternoon. This historic neighborhood boasts beautiful architecture, trendy boutiques, art galleries, and charming cafes. Explore Place des Vosges, one of Paris's oldest planned squares, and grab a falafel, a local favorite in this area.</p>
                    <p>Before dinner, consider a visit to a patisserie for some exquisite macarons or éclairs. For your final Parisian evening, perhaps a classical concert, an opera at Palais Garnier, or simply enjoying the ambiance of a cozy bistro in Saint-Germain-des-Prés. Reflect on your whirlwind adventure and start planning your return.</p>
                    <p>Paris in 48 hours is ambitious but entirely rewarding. With a little planning and a lot of energy, you'll capture the essence of this incredible city. <em>Bon voyage!</em></p>
                `,
        },
        {
          id: "2",
          title: "Trekking the Dolomites: A Beginner's Guide",
          category: "Nature & Hiking",
          categoryBadgeClass: "bg-danger",
          date: "April 20, 2025",
          author: "Alex Smith",
          heroImage: "https://picsum.photos/seed/dolomites-blog-hero/1920/800",
          content: `
                    <p>The Dolomites, a UNESCO World Heritage site in northeastern Italy, offer some of the most stunning mountain landscapes on Earth. With their dramatic jagged peaks, lush alpine meadows, and crystal-clear lakes, they are a hiker's paradise. If you're new to trekking or just new to this region, this guide will help you plan an unforgettable adventure.</p>
                    <img src="https://picsum.photos/seed/dolomites-trail/800/500" alt="Hiking trail in the Dolomites" class="img-fluid rounded my-4">
                    <h2>Getting Started: When to Go & Where to Stay</h2>
                    <p>The best time for hiking in the Dolomites is from late June to late September. Outside of this, snow can make many trails impassable. Popular bases include Cortina d'Ampezzo, Ortisei, Selva di Val Gardena, and Canazei. These towns offer a range of accommodations from cozy guesthouses to luxury hotels, and provide easy access to cable cars that whisk you up to higher elevations.</p>
                    <p>For beginners, it's advisable to start with well-marked trails that aren't too steep or long. Many trails are accessible directly from towns or via cable car. Look for "family-friendly" routes or those labeled "easy" to "moderate." Consider guided tours if you're nervous about navigating on your own.</p>
                    <p>LOREM TEXT 1: Vestibulum eu arcu varius, posuere tortor non, pharetra massa. Nam placerat, urna id pulvinar ultrices, odio diam tincidunt odio, nec lacinia nulla justo quis elit. Fusce in justo eu ipsum dapibus pharetra vitae nec ligula. Ut quis ex in nulla facilisis placerat. Donec eget enim ut velit sollicitudin tincidunt. Nulla a eros quis ligula facilisis tristique. Phasellus vitae ipsum ut est efficitur tincidunt.</p>
                    <h2>Essential Gear & Safety Tips</h2>
                    <p>Even on easier trails, proper gear is crucial. You'll need sturdy hiking boots with good ankle support, layered clothing (weather can change rapidly), a rain jacket, a backpack with plenty of water and snacks, sun protection (hat, sunglasses, sunscreen), and a first-aid kit. A hiking map and compass (or a reliable GPS app) are also essential.</p>
                    <p>Always tell someone your route and expected return time. Check the weather forecast before you set out and be prepared to turn back if conditions worsen. Stick to marked trails to avoid getting lost or disturbing the fragile alpine environment.</p>
                    <img src="https://picsum.photos/seed/dolomites-view/800/500" alt="Panoramic view of Dolomites mountains" class="img-fluid rounded my-4">
                    <h2>Recommended Beginner Trails</h2>
                    <ul>
                        <li><strong>Seceda Ridgeline Walk (Ortisei):</strong> Take the cable car up for incredible views and a relatively flat, easy walk along a stunning ridgeline.</li>
                        <li><strong>Lago di Braies (Pragser Wildsee):</strong> A beautiful, flat loop around one of the most iconic lakes in the Dolomites. You can also rent rowboats.</li>
                        <li><strong>Tre Cime di Lavaredo Loop (near Cortina):</strong> While a bit longer, the classic loop around these famous three peaks is mostly flat once you reach the Rifugio Auronzo via toll road, offering spectacular views without extreme elevation gain.</li>
                    </ul>
                    <p>The Dolomites are an adventure unlike any other. Embrace the challenge, marvel at the landscapes, and enjoy the fresh mountain air.</p>
                `,
        },
        {
          id: "3",
          title: "Street Food Tour of Bangkok: Best Eats",
          category: "Food & Culture",
          categoryBadgeClass: "bg-success",
          date: "March 15, 2025",
          author: "Maria K.",
          heroImage: "https://picsum.photos/seed/bangkok-blog-hero/1920/800",
          content: `
                    <p>Bangkok is a city that truly comes alive at night, and nowhere is this more evident than in its vibrant street food scene. From bustling markets to humble roadside stalls, the culinary offerings are endless and incredibly delicious. Prepare your taste buds for an adventure!</p>
                    <img src="https://picsum.photos/seed/bangkok-street-food/800/500" alt="Variety of Thai street food dishes" class="img-fluid rounded my-4">
                    <h2>Must-Try Dishes for Every Palate</h2>
                    <p>You can't go to Bangkok without trying **Pad Thai**. Look for stalls where it's cooked fresh to order, often with shrimp or chicken, perfectly balanced between sweet, sour, and savory flavors. Another staple is **Som Tum** (Green Papaya Salad), spicy, tangy, and refreshing – a perfect counterpoint to richer dishes. For something heartier, try **Khao Man Gai** (Hainanese Chicken Rice), tender poached chicken served over fragrant rice cooked in chicken broth, with a savory dipping sauce.</p>
                    <p>Don't shy away from **Moo Ping** (Grilled Pork Skewers), marinated in soy sauce, garlic, and sugar, then grilled to smoky perfection. They are a popular snack any time of day. And for dessert? **Mango Sticky Rice** (Khao Niao Mamuang) is a seasonal favorite, sweet ripe mango served with sticky rice bathed in coconut milk. Simply divine.</p>
                    <p>LOREM IPSUM: Etiam in quam aliquet, fermentum magna in, feugiat ligula. Vestibulum eu arcu varius, posuere tortor non, pharetra massa. Nam placerat, urna id pulvinar ultrices, odio diam tincidunt odio.</p>
                    <h2>Where to Find the Best Street Food</h2>
                    <ul>
                        <li><strong>Yaowarat (Chinatown):</strong> A legendary spot for street food, especially after sunset. Expect crowds and an incredible array of dishes from seafood to noodles.</li>
                        <li><strong>Charoenkrung Road:</strong> One of Bangkok's oldest roads, offering a mix of traditional Thai and fusion dishes.</li>
                        <li><strong>Or Tor Kor Market:</strong> While technically a fresh market, it has an excellent food court with high-quality, pre-prepared Thai dishes. It's a great daytime option.</li>
                        <li><strong>Victory Monument:</strong> A hub for mini-vans and public transport, also famous for its boat noodle alleys where you can sample small bowls of delicious noodle soup.</li>
                    </ul>
                    <img src="https://picsum.photos/seed/thai-dessert/800/500" alt="Mango Sticky Rice dessert" class="img-fluid rounded my-4">
                    <h2>Tips for Your Street Food Adventure</h2>
                    <p><strong>Be adventurous:</strong> Don't be afraid to try something new. Point to what looks good or learn a few basic Thai phrases like "Aroi mak" (delicious!).</p>
                    <p><strong>Look for queues:</strong> A long line of locals usually indicates good food.</p>
                    <p><strong>Hygiene:</strong> Opt for stalls with high turnover, where food is cooked fresh in front of you. Bottled water is always a good idea.</p>
                    <p><strong>Carry cash:</strong> Most street vendors operate on a cash-only basis.</p>
                `,
        },
        {
          id: "4",
          title: "A Local's Guide to Hidden London Pubs",
          category: "City Breaks",
          categoryBadgeClass: "bg-primary-custom",
          date: "March 1, 2025",
          author: "David L.",
          heroImage: "https://picsum.photos/seed/london-pub-hero/1920/800",
          content: `
                    <p>London's pub scene is legendary, but beyond the well-trodden tourist spots lie a treasure trove of hidden gems. These are the pubs where history seeps from the walls, where locals gather, and where a perfect pint is always on offer. Forget the flashy new bars; embrace the cozy charm of these traditional watering holes.</p>
                    <img src="https://picsum.photos/seed/hidden-london-pub/800/500" alt="Cozy interior of a traditional London pub" class="img-fluid rounded my-4">
                    <h2>The Churchill Arms (Kensington)</h2>
                    <p>Famous for its spectacular floral displays (it often wins awards for its hanging baskets!) and incredible Christmas decorations, The Churchill Arms is a feast for the eyes before you even step inside. Beyond the facade, you'll find a snug interior packed with Churchill memorabilia and a Thai kitchen serving authentic, delicious food – an unexpected but delightful pairing.</p>
                    <p>Ye Olde Cheshire Cheese (Fleet Street): Step back in time at this historic pub rebuilt after the Great Fire of London in 1666. Dickens, Conan Doyle, and Chesterton were all regulars. Its labyrinthine passages, low ceilings, and smoky atmosphere transport you to another era. It's a bit hidden down an alley off Fleet Street, making its discovery all the more rewarding.</p>
                    <p>LOREM TEXT 1: Vestibulum eu arcu varius, posuere tortor non, pharetra massa. Nam placerat, urna id pulvinar ultrices, odio diam tincidunt odio, nec lacinia nulla justo quis elit.</p>
                    <h2>The Eagle (Farringdon)</h2>
                    <p>Often credited as London's first gastropub, The Eagle helped kickstart a revolution in pub food. It maintains a simple, daily changing menu focusing on fresh, seasonal ingredients served in a relaxed, no-frills setting. A true pioneer and still a fantastic place for an authentic, high-quality pub lunch or dinner.</p>
                    <img src="https://picsum.photos/seed/churchill-arms/800/500" alt="Exterior of The Churchill Arms pub covered in flowers" class="img-fluid rounded my-4">
                    <h2>The Grenadier (Belgravia)</h2>
                    <p>A tiny, charming pub hidden in a cobbled mews in Belgravia, The Grenadier is steeped in history and ghost stories. Legend has it a soldier named Cedric was flogged to death for cheating at cards and now haunts the cellar. Patrons often leave money on the ceiling as an offering to appease his spirit. It's a truly unique London experience.</p>
                `,
        },
        {
          id: "5",
          title: "Chasing the Aurora: Iceland in Winter",
          category: "Nature & Hiking",
          categoryBadgeClass: "bg-danger",
          date: "Feb 10, 2025",
          author: "Sara W.",
          heroImage: "https://picsum.photos/seed/iceland-aurora-hero/1920/800",
          content: `
                    <p>Iceland in winter is a land transformed. Snow-dusted landscapes, frozen waterfalls, and the ethereal dance of the Northern Lights create a truly magical experience. Chasing the Aurora Borealis is often the primary goal, but Iceland offers so much more in its coldest months.</p>
                    <img src="https://picsum.photos/seed/aurora-iceland/800/500" alt="Northern Lights over an Icelandic landscape" class="img-fluid rounded my-4">
                    <h2>Best Time for Aurora Hunting</h2>
                    <p>The best time to see the Northern Lights in Iceland is from late September to late March. You need clear, dark skies, and solar activity. Away from city lights is key, so consider staying in rural accommodations or booking a dedicated Northern Lights tour. Patience is crucial, as the lights can appear and disappear quickly.</p>
                    <p>LOREM TEXT 1: Vestibulum eu arcu varius, posuere tortor non, pharetra massa. Nam placerat, urna id pulvinar ultrices, odio diam tincidunt odio.</p>
                    <h2>Winter Wonders Beyond the Lights</h2>
                    <p>While the Aurora is a highlight, don't miss Iceland's other winter attractions. Visit the stunning Golden Circle, where Gullfoss waterfall often partially freezes into magnificent ice sculptures, and the Geysir geothermal area sends steam high into the crisp air. The black sand beaches of Reynisfjara near Vik are even more dramatic with a dusting of snow.</p>
                    <p>A visit to the Blue Lagoon or one of Iceland's many natural hot springs is a must for a surreal bathing experience amidst the cold. Ice cave tours in Vatnajökull National Park offer an unparalleled opportunity to explore sparkling blue glacial ice formations – a truly otherworldly experience.</p>
                    <img src="https://picsum.photos/seed/iceland-waterfall-winter/800/500" alt="Frozen waterfall in Iceland winter" class="img-fluid rounded my-4">
                    <h2>Practical Tips for Winter Travel</h2>
                    <ul>
                        <li><strong>Dress warmly:</strong> Layers are your best friend. Thermal base layers, fleece, a waterproof and windproof outer shell, warm hat, gloves, and waterproof boots are essential.</li>
                        <li><strong>Rent a 4x4:</strong> If driving yourself, a 4x4 vehicle is highly recommended for navigating potentially icy or snowy roads. Always check road conditions before you drive.</li>
                        <li><strong>Book tours in advance:</strong> Especially for popular activities like ice caving or Northern Lights tours, spots fill up quickly.</li>
                        <li><strong>Be flexible:</strong> Icelandic weather is notoriously unpredictable. Be prepared for changes in plans due to storms or bad driving conditions.</li>
                    </ul>
                    <p>Iceland in winter is an adventure unlike any other. Embrace the cold, marvel at the landscapes, and with a bit of luck, witness the spectacular dance of the Northern Lights.</p>
                `,
        },
        {
          id: "6",
          title: "Mastering Pasta Making in Bologna",
          category: "Food & Culture",
          categoryBadgeClass: "bg-success",
          date: "Jan 5, 2025",
          author: "Chef Remo",
          heroImage: "https://picsum.photos/seed/bologna-pasta-hero/1920/800",
          content: `
                    <p>Bologna, often called "La Grassa" (The Fat One), is the undisputed culinary capital of Italy. It's a city where food is not just sustenance, but a way of life, and at its heart lies the art of pasta making. Learning to craft fresh pasta here is an immersive experience into Italian tradition.</p>
                    <img src="https://picsum.photos/seed/bologna-pasta-making/800/500" alt="Hands making fresh pasta dough" class="img-fluid rounded my-4">
                    <h2>The Essentials: Ingredients & Tools</h2>
                    <p>At its core, Bolognese pasta requires just two ingredients: flour (typically '00' flour for its fine texture) and eggs. The ratio is key, often one egg per 100g of flour, though this can vary. You'll need a large, clean wooden work surface (traditionally a 'tagliere'), a rolling pin ('mattarello'), and a sharp knife for cutting. No fancy machines needed for authentic, handmade pasta!</p>
                    <p>LOREM TEXT 1: Vestibulum eu arcu varius, posuere tortor non, pharetra massa. Nam placerat, urna id pulvinar ultrices, odio diam tincidunt odio, nec lacinia nulla justo quis elit.</p>
                    <h2>The Process: From Dough to Delight</h2>
                    <p><strong>Step 1: The Volcano.</strong> Mound the flour on your work surface and create a well in the center. Crack the eggs into the well.</p>
                    <p><strong>Step 2: Mixing.</strong> Gently whisk the eggs with a fork, gradually incorporating flour from the inner walls of the volcano until a shaggy dough forms. Then, bring it all together with your hands.</p>
                    <p><strong>Step 3: Kneading.</strong> This is where the magic happens. Knead the dough vigorously for 10-15 minutes until it's smooth, elastic, and no longer sticky. It should feel like a baby's bottom.</p>
                    <p><strong>Step 4: Resting.</strong> Wrap the dough tightly in plastic wrap and let it rest at room temperature for at least 30 minutes. This relaxes the gluten, making it easier to roll.</p>
                    <img src="https://picsum.photos/seed/bologna-tagliatelle/800/500" alt="Fresh tagliatelle pasta drying" class="img-fluid rounded my-4">
                    <p><strong>Step 5: Rolling.</strong> Using your mattarello, roll the dough out very thinly. The goal is transparency – you should almost be able to read a newspaper through it. This requires patience and technique, rolling from the center outwards, turning the dough frequently.</p>
                    <p><strong>Step 6: Cutting.</strong> For classics like tagliatelle or fettuccine, fold the rolled-out dough into a loose cylinder, then slice to your desired width. Unfurl the strands and let them dry slightly on a floured surface.</p>
                    <h2>Popular Bolognese Pasta Shapes</h2>
                    <ul>
                        <li><strong>Tagliatelle:</strong> The most famous, often served with a rich Ragu alla Bolognese.</li>
                        <li><strong>Tortellini:</strong> Small, navel-shaped filled pasta, typically served in broth.</li>
                        <li><strong>Lasagne:</strong> Layers of thin pasta sheets, ragu, and béchamel sauce.</li>
                        <li><strong>Gramigna:</strong> A short, curly pasta, great with sausage sauce.</li>
                    </ul>
                    <p>Learning pasta making in Bologna isn't just about cooking; it's about connecting with a culinary heritage. It's a delicious, rewarding experience that you'll carry with you long after you leave "La Grassa."</p>
                `,
        },
      ];

      function loadBlogPost(postId) {
        const post = blogPosts.find((p) => p.id === postId);

        if (post) {
          $("#blogHeroImage").attr("src", post.heroImage);
          $("#blogHeroTitle").text(post.title.toUpperCase());
          $("#blogPostTitle").text(post.title);
          $("#blogPostCategoryBadge")
            .text(post.category)
            .addClass(post.categoryBadgeClass);
          $("#blogPostDate").html(
            `<i class="fas fa-calendar-alt"></i> ${post.date}`
          );
          $("#blogPostAuthor").html(
            `<i class="fas fa-user"></i> ${post.author}`
          );
          $("#blogPostContent").html(post.content);
          document.title = `Wanderlust Adventures - ${post.title}`; 
        } else {
          $("#blogHeroTitle").text("POST NOT FOUND");
          $("#blogPostTitle").text("Oops! This blog post could not be found.");
          $("#blogPostContent").html(
            '<p class="text-center text-muted">The article you are looking for might have been removed or never existed.</p>'
          );
          $("#blogHeroImage").attr(
            "src",
            "https://picsum.photos/seed/error-blog/1920/800"
          );
        }
      }

      $(document).ready(function () {
        const postId = "{{ $id }}"; 
        loadBlogPost(postId);

        $("#commentForm").on("submit", function (e) {
          e.preventDefault();
          const name = $(this).find("input:eq(0)").val();
          const commentText = $(this).find("textarea").val();

          if (name && commentText) {
            const newComment = `
                        <div class="comment-box border-bottom pb-3 mb-3">
                            <p class="mb-0 comment-author fw-bold">${name} <span class="comment-date text-muted fw-normal small">| Just Now</span></p>
                            <p class="small mt-1 mb-0">${commentText}</p>
                        </div>
                    `;
            $("#commentList").prepend(newComment);
            $(this)[0].reset();

            const currentCount = $("#commentList .comment-box").length;
            $("#commentsCount").text(`${currentCount} Comments`);
            alert("Comment posted!");
          } else {
            alert("Please enter your name and comment.");
          }
        });
      });
</script>
@endpush
