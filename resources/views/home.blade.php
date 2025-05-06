<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css" />

    <link rel="stylesheet" href="{{ asset('FBE/style.css') }}">
    <script src="{{ asset('FBE/main.js') }}"></script>   
    <title>Website FBE</title>
  </head>
  <body>
    <header>
      <nav class="navbar">
        <div class="logo">
          <a href="">
            <img src="{{ asset('FBE/assets/logo.png') }}" class="logo" />
          </a>
        </div>
        <ul class="nav-links">
          <li><a href="#">About</a></li>
          <li><a href="#">Services</a></li>
          <li><a href="#">Location</a></li>
          <li><a href="#">Our Strength</a></li>
          <li><a href="#">Customer Care</a></li>
        </ul>
        <div class="auth-buttons">
          <a href="#" class="track-btn">Track</a>
          <a href="{{ route('admin.login') }}" class="login-btn">Login</a>
        </div>
      </nav>
    </header>

    <main>
      <section class="hero-section">
        <div class="hero-top">
          <div class="hero-title">
            <h1>We provide logistics solution tailor-made for individual customer!</h1>
          </div>
          <div class="hero-description">
            <p>Generix Express provides customized services for customers around the world from 50+ leading industries. For more information please</p>
          </div>
        </div>
        <div class="hero-image">
          <img src="{{ asset('FBE/assets/content2.jpg') }}" alt="hero" />
        </div>
      </section>
      <section class="project-section">
        <div class="hero-title">
          <h1>Why choose us?</h1>
        </div>
        <div class="project-container">
          <div class="project-box">
            <i class="uil uil-user-arrows icon"></i>
            <h3>Top Team</h3>
            <p>Sometimes features require a short description. This can be detailed description or just a short text.</p>
            <a href="#" class="learn-more">Learn More →</a>
          </div>
          <div class="project-box">
            <i class="uil uil-user-arrows icon"></i>
            <h3>Customer Support</h3>
            <p>Sometimes features require a short description. This can be detailed description or just a short text.</p>
            <a href="#" class="learn-more">Learn More →</a>
          </div>
          <div class="project-box">
            <i class="uil uil-tag icon"></i>
            <h3>Competitive Rates</h3>
            <p>Sometimes features require a short description. This can be detailed description or just a short text.</p>
            <a href="#" class="learn-more">Learn More →</a>
          </div>
        </div>
      </section>

      <!-- future section -->
      <section class="project-section">
        <div class="hero-title">
          <h1>The tools you need to win and keep more client</h1>
        </div>
        <div class="project-container">
          <div class="project-box">
            <i class="uil uil-user-arrows icon"></i>
            <h3>Top Team</h3>
            <p>Sometimes features require a short description. This can be detailed description or just a short text.</p>
            <a href="#" class="learn-more">Learn More →</a>
          </div>
          <div class="project-box">
            <i class="uil uil-user-arrows icon"></i>
            <h3>Customer Support</h3>
            <p>Sometimes features require a short description. This can be detailed description or just a short text.</p>
            <a href="#" class="learn-more">Learn More →</a>
          </div>
          <div class="project-box">
            <i class="uil uil-tag icon"></i>
            <h3>Competitive Rates</h3>
            <p>Sometimes features require a short description. This can be detailed description or just a short text.</p>
            <a href="#" class="learn-more">Learn More →</a>
          </div>
        </div>
        <div class="project-container">
          <div class="project-box">
            <i class="uil uil-user-arrows icon"></i>
            <h3>Top Team</h3>
            <p>Sometimes features require a short description. This can be detailed description or just a short text.</p>
            <a href="#" class="learn-more">Learn More →</a>
          </div>
          <div class="project-box">
            <i class="uil uil-user-arrows icon"></i>
            <h3>Customer Support</h3>
            <p>Sometimes features require a short description. This can be detailed description or just a short text.</p>
            <a href="#" class="learn-more">Learn More →</a>
          </div>
          <div class="project-box">
            <i class="uil uil-tag icon"></i>
            <h3>Competitive Rates</h3>
            <p>Sometimes features require a short description. This can be detailed description or just a short text.</p>
            <a href="#" class="learn-more">Learn More →</a>
          </div>
        </div>
      </section>
      <section class="industry-section">
        <div class="industry-header">
          <div class="top-header">
            <h3>Industry Knowledge</h3>
          </div>
          <div class="top-industry">
            <h1>Powering innovation across industries, globally.</h1>
          </div>
        </div>
        <div class="industry-map">
          <img src="{{ asset('FBE/assets/map2.png') }}" alt="World Map" />
        </div>
        <div class="industry-stats">
          <div class="stat-box">
            <h2>$5b+</h2>
            <p>Equity value</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi officia dicta accusantium explicabo odit dolor id, aliquam totam! Sequi veritatis quibusdam laborum tenetur adipisci minima alias sed eaque dolor vero?</p>
          </div>
          <div class="stat-box">
            <h2>932</h2>
            <p>Ventures</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi dolore maxime vel libero eaque numquam aspernatur eum magnam, rem, ipsam provident amet, nulla nobis delectus possimus ab dicta sint nemo?</p>
          </div>
          <div class="stat-box">
            <h2>81%</h2>
            <p>Successful pilots</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non asperiores itaque cumque ut, quia porro aliquid accusantium voluptatum earum qui quod explicabo necessitatibus, incidunt eum exercitationem beatae atque harum repellendus?</p>
          </div>
          <div class="stat-box">
            <h2>85+</h2>
            <p>Fortune 500 partners</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatibus.</p>
          </div>
        </div>
      </section>
      <section class="testimonial-section">
        <div class="testimonial-box">
          <img src="{{ asset('FBE/assets/testimoni.jpg') }}" alt="Port image" class="testimonial-image" />
          <div class="testimonial-text">
            <p class="quote">
              “Designspace has consistently delivered above and beyond my expectations!<br />
              Brilliant design work, incredible response time and a really friendly team”
            </p>
            <div class="author">
              <p><strong> Dennis of Amazon </strong><br />CEO of Amazon</p>
              <br />
              <img src="{{ asset('FBE/assets/logo-brand/Amazon.png') }}" alt="Amazon Logo" class="brand-logo" />
            </div>
          </div>
        </div>
        <div class="brand-logos">
          <div class="brand-logo"> <img src="{{ asset('FBE/assets/logo-brand/Amazon.png') }}" alt="Amazon" /></div>
          <div class="brand-logo"> <img src="{{ asset('FBE/assets/logo-brand/Creative-Market.png') }}" alt="Creative Market" /></div>
          <div class="brand-logo"><img src="{{ asset('FBE/assets/logo-brand/Airbnb.png') }}" alt="Airbnb" /></div>
          <div class="brand-logo"><img src="{{ asset('FBE/assets/logo-brand/Shopify.com.png') }}" alt="Shopify" /></div>
        </div>
      </section>
      <section class="articles-section">
        <div class="hero-title">
          <h1>The latest articles and industry insights</h1>
          <a href="#" class="learn-more">View All →</a>
        </div>
        </div>
        <div class="articles-grid">
          {{-- Artikel unggulan --}}
          @if($articles->isNotEmpty())
          <div class="article-card featured">
              @php $featured = $articles->first(); @endphp
              @if($featured->photo)
                  <img src="{{ asset('storage/' . $featured->photo) }}" alt="Article Image" />
              @else
                  <img src="{{ asset('images/no-image.png') }}" alt="No Image" />
              @endif
              <h3>{{ $featured->title }}</h3>
              <p class="meta">Article — {{ $featured->created_at->format('F j, Y') }}</p>
          </div>
          @endif
      
          {{-- Artikel lainnya --}}
          @foreach ($articles->skip(1) as $article)
          <div class="article-card">
              @if($article->photo)
                  <img src="{{ asset('storage/' . $article->photo) }}" alt="Article Image" />
              @else
                  <img src="{{ asset('images/no-image.png') }}" alt="No Image" />
              @endif
              <h3>{{ $article->title }}</h3>
              <p class="meta">Article — {{ $article->created_at->format('F j, Y') }}</p>
          </div>
          @endforeach
      </div>       
      </section>
      <section class="questions-section">
        <div class="question-header">
          <h1>Frequently Asked <br>Questions</h1>
        </div>
        <div class="faq-item">
          <div class="faq-question">What mostly people want to ask no.1 ? <span class="toggle">+</span></div>
          <div class="faq-answer">Lorem ipsum dolor sit amet, consectetur adipiscing elit...</div>
        </div>
      
        <div class="faq-item">
          <div class="faq-question">What mostly people want to ask no.2 ? <span class="toggle">+</span></div>
          <div class="faq-answer">Lorem ipsum dolor sit amet, consectetur adipiscing elit...</div>
        </div>
      
        <div class="faq-item">
          <div class="faq-question">What mostly people want to ask no.3 ? <span class="toggle">+</span></div>
          <div class="faq-answer">Lorem ipsum dolor sit amet, consectetur adipiscing elit...</div>
        </div>
        <div class="faq-item">
          <div class="faq-question">What mostly people want to ask no.4 ? <span class="toggle">+</span></div>
          <div class="faq-answer">Lorem ipsum dolor sit amet, consectetur adipiscing elit...</div>
        </div>
        <div class="faq-item">
          <div class="faq-question">What mostly people want to ask no.5 ? <span class="toggle">+</span></div>
          <div class="faq-answer">Lorem ipsum dolor sit amet, consectetur adipiscing elit...</div>
        </div>
          </div>
      </section>
      <section class="cta-footer-section">
        <div class="cta-container">
          <div class="cta-text">
            <h2>Make sure you choose<br> the right expedition<br> services for your delivery</h2>
          </div>
          <div class="cta-button">
            <a href="#" class="btn">Contact Us →</a>
          </div>
        </div>
        <hr>
      
        <footer class="footer">
          <div class="footer-column brand">
            <h3><img src="{{ asset('FBE/assets/logo.png') }}" alt="fujiyama Logo" class="logo"> fujiyama</h3>
            <p>Generix Express provides customized services for customers around the world from 50+ leading industries. For more information please</p>
            <p class="copyright">© 2025 All rights reserved – fujiyama</p>
          </div>
      
          <div class="footer-column">
            <h4>Products</h4>
            <ul>
              <li>Features</li>
              <li>Enterprise</li>
              <li>Security</li>
              <li>Customer Stories</li>
              <li>Pricing</li>
              <li>Demo</li>
            </ul>
          </div>
      
          <div class="footer-column">
            <h4>Company</h4>
            <ul>
              <li>About Us</li>
              <li>Leadership</li>
              <li>News</li>
              <li>Media Kit</li>
              <li>Career</li>
              <li>Documentation</li>
            </ul>
          </div>
      
          <div class="footer-column">
            <h4>Office -</h4>
            <p>123 Anywhere St., Any City, ST 12345</p>
            <h4>Contact us -</h4>
            <p>support@designspace.io</p>
          </div>
        </footer>
      </section>  
    </main>
  </body>
</html>
