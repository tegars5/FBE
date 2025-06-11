<!DOCTYPE html>
<html lang="en">
<x-layout.head title="Homes" />

<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <a href="">
                    <img src="{{ asset('assets/logo.png') }}" class="logo" />
                </a>
            </div>
            <ul class="nav-links">
                <li><a href="#home">About</a></li>
                <li><a href="#faq">Services</a></li>
                <li><a href="#location">Location</a></li>
                <li><a href="#project">Our Strength</a></li>
                <li><a href="#cta">Customer Care</a></li>
            </ul>
            <div class="auth-buttons">
                <a href="#location" class="track-btn">Track</a>
                <a href="{{ route('admin.login') }}" class="login-btn">Login</a>
            </div>
        </nav>
    </header>
    <main>
        <section class="hero-section" id="home">
            <div class="hero-top">
                <div class="hero-title">
                    <h1>We provide logistics solution tailor-made for individual customer!</h1>
                </div>
                <div class="hero-description">
                    <p>Generix Express provides customized services for customers around the world from 50+ leading
                        industries. For more information please</p>
                </div>
            </div>
            <div class="hero-image">
                <img src="{{ asset('assets/content2.jpg') }}" alt="hero" />
            </div>
        </section>
        <section class="project-section" id="about">
            <div class="hero-title">
                <h1>Why choose us?</h1>
            </div>
            <div class="project-container">
                <!-- Box 1: Top Team -->
                <div class="project-box">
                    <i class="uil uil-user-arrows icon"></i>
                    <h3>Top Team</h3>
                    <p>
                        We have a team of experts with extensive experience in managing palm kernel shells,
                        ready to provide the best solutions for your industrial needs.
                        <span class="extra-detail" style="display: none;">
                            We offer some of the most competitive rates in the industry without compromising on quality.
                        </span>
                    </p>
                    <a href="#" class="learn-more">Show more →</a>
                </div>

                <!-- Box 2: Customer Support -->
                <div class="project-box">
                    <i class="uil-headphones icon"></i>
                    <h3>Customer Support</h3>
                    <p>
                        In logistics, timing is everything—and so is communication. That's why we provide
                        round-the-clock customer support to assist you at every stage of your delivery process.
                        <span class="extra-detail" style="display: none;">
                            Our dedicated support staff are always ready to respond to inquiries, resolve issues, and
                            provide updates. Whether it's a last-minute change, a customs question, or an urgent
                            delivery need, we're only one message away. Our goal is to give you complete peace of mind.
                        </span>
                    </p>
                    <a href="#" class="learn-more">Show more →</a>
                </div>

                <!-- Box 3: Competitive Rates -->
                <div class="project-box">
                    <i class="uil-tag-alt icon"></i>
                    <h3>Competitive Rates</h3>
                    <p>
                        At our core, we believe that exceptional logistics services should be accessible to all. That's
                        why we offer competitive pricing structures without compromising quality.
                        <span class="extra-detail" style="display: none;">
                            Our team works diligently to optimize every route, reduce unnecessary costs, and provide
                            value-driven solutions
                            for individuals, startups, and corporations alike. Whether you're shipping one box or
                            multiple containers, you can count on cost-effective services that deliver more than just
                            your goods—delivering trust and satisfaction.
                        </span>
                    </p>
                    <a href="#" class="learn-more">Show more →</a>
                </div>
            </div>
        </section>
        <!-- future section -->
        <section class="project-section" id="project">
            <div class="hero-title">
                <h1>The tools you need to win and keep more client</h1>
            </div>
            <div class="project-container">
                <div class="project-box">
                    <i class="uil-ship icon"></i>
                    <h3>Air Cargo Services</h3>
                    <p>
                        We provide international and domestic sea freight services with global reach. Using modern cargo
                        ships and
                        <span class="extra-detail" style="display: none;">
                            real-time tracking systems, we ensure your goods arrive safely and on time, even for
                            long-distance and high-volume shipments.
                        </span>
                    </p>
                    <a href="#" class="learn-more">Show more →</a>
                </div>
                <div class="project-box">
                    <i class="uil-plane icon"></i>
                    <h3>Air Cargo Services</h3>
                    <p>
                        If speed is your top priority, our air freight service is the perfect choice. We partner with
                        trusted airlines to
                        <span class="extra-detail" style="display: none;">
                            guarantee fast and secure delivery—ideal for high-value goods or urgent shipments.
                        </span>
                    </p>
                    <a href="#" class="learn-more">Show more →</a>
                </div>
                <div class="project-box">
                    <i class="uil-truck icon"></i>
                    <h3>Inland Cargo Services</h3>
                    <p>
                        Our reliable inland freight service is coordinated using a modern fleet of trucks and logistics
                        vehicles. Perfect for
                        <span class="extra-detail" style="display: none;">
                            intercity and inter-province distribution, we offer door-to-door delivery—even to remote
                            areas.
                        </span>
                    </p>
                    <a href="#" class="learn-more">Show more →</a>
                </div>
            </div>
            <div class="project-container">
                <div class="project-box">
                    <i class="uil-constructor icon"></i>
                    <h3>Heavy Equipment Services</h3>
                    <p>
                        Transporting heavy equipment and industrial goods requires special handling. We offer
                        specialized
                        <span class="extra-detail" style="display: none;">
                            services for heavy-duty transport with high safety standards, including escorting,
                            protection, and licensed drivers.
                        </span>
                    </p>
                    <a href="#" class="learn-more">Show more →</a>
                </div>
                <div class="project-box">
                    <i class="uil-car icon"></i>
                    <h3>Car Shipping Services</h3>
                    <p>
                        Our vehicle transportation service is designed with maximum safety and care. Whether for
                        personal use,
                        <span class="extra-detail" style="display: none;">
                            dealerships, or corporate fleets, we ensure your vehicle arrives at its destination in
                            perfect condition.
                        </span>
                    </p>
                    <a href="#" class="learn-more">Show more →</a>
                </div>
                <div class="project-box">
                    <i class="uil-box icon"></i>
                    <h3>Container Sea Cargo</h3>
                    <p>
                        Shipping by sea container is the best solution for bulk deliveries. We offer various types of
                        containers tailored to
                        <span class="extra-detail" style="display: none;">
                            your cargo needs, along with comprehensive tracking and document management services.
                        </span>
                    </p>
                    <a href="#" class="learn-more">Show more →</a>
                </div>
            </div>
        </section>
        <section class="industry-section" id="location">
            <div class="industry-header">
                <div class="top-header">
                    <h3>Industry Knowledge</h3>
                </div>
                <div class="top-industry">
                    <h1>Powering innovation across industries, globally.</h1>
                </div>
            </div>
            <div class="industry-map">
                <img src="{{ asset('assets/map2.png') }}" alt="World Map" />
            </div>
            <div class="industry-stats">
                <div class="stat-box">
                    <h2>$5b+</h2>
                    <p>Equity value</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi officia dicta accusantium
                        explicabo odit dolor id, aliquam totam! Sequi veritatis quibusdam laborum tenetur adipisci
                        minima alias sed eaque dolor vero?</p>
                </div>
                <div class="stat-box">
                    <h2>932</h2>
                    <p>Ventures</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi dolore maxime vel libero eaque
                        numquam aspernatur eum magnam, rem, ipsam provident amet, nulla nobis delectus possimus ab dicta
                        sint nemo?</p>
                </div>
                <div class="stat-box">
                    <h2>81%</h2>
                    <p>Successful pilots</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non asperiores itaque cumque ut, quia
                        porro aliquid accusantium voluptatum earum qui quod explicabo necessitatibus, incidunt eum
                        exercitationem beatae atque harum repellendus?</p>
                </div>
                <div class="stat-box">
                    <h2>85+</h2>
                    <p>Fortune 500 partners</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatibus.</p>
                </div>
            </div>
        </section>
        <section class="testimonial-section" id="testimonial">
            <div class="testimonial-box">
                <img src="{{ asset('assets/testimoni.jpg') }}" alt="Port image" class="testimonial-image" />
                <div class="testimonial-text">
                    <p class="quote">
                        “Designspace has consistently delivered above and beyond my expectations!<br />
                        Brilliant design work, incredible response time and a really friendly team”
                    </p>
                    <div class="author">
                        <p><strong> Dennis of Amazon </strong><br />CEO of Amazon</p>
                        <br />
                        <img src="{{ asset('assets/logo-brand/Amazon.png') }}" alt="Amazon Logo"
                            class="brand-logo" />
                    </div>
                </div>
            </div>
            <div class="brand-logos">
                <div class="brand-logo"> <img src="{{ asset('assets/logo-brand/Amazon.png') }}" alt="Amazon" />
                </div>
                <div class="brand-logo"> <img src="{{ asset('assets/logo-brand/Creative-Market.png') }}"
                        alt="Creative Market" /></div>
                <div class="brand-logo"><img src="{{ asset('assets/logo-brand/Airbnb.png') }}" alt="Airbnb" />
                </div>
                <div class="brand-logo"><img src="{{ asset('assets/logo-brand/Shopify.com.png') }}" alt="Shopify" />
                </div>
            </div>
        </section>
        {{-- Articles Section --}}
        <section class="articles-section" id="articles">
            <div class="hero-title">
                <h1>The latest articles and industry insights</h1>
                <a href="{{ route('articles.index') }}" class="learn-more">View All →</a>
            </div>
            <div class="articles-grid">
                @if ($articles->isNotEmpty())
                    @php $featured = $articles->first(); @endphp
                    <div class="article-card featured">
                        <a href="{{ route('articles.show', $featured->id) }}" class="article-link">
                            @if ($featured->photo)
                                <img src="{{ Storage::disk('s3')->url($featured->photo) }}"
                                    alt="{{ $featured->title }}" />
                            @else
                                <img src="{{ asset('images/no-image.png') }}" alt="No Image" />
                            @endif
                            <h3>{{ $featured->title }}</h3>
                            <p class="meta">Article — {{ $featured->created_at->format('F j, Y') }}</p>
                        </a>
                    </div>
                @endif

                <!-- Tampilkan artikel lainnya -->
                @foreach ($articles->skip(1)->take(4) as $article)
                    <div class="article-card">
                        <a href="{{ route('articles.show', $article->id) }}" class="article-link">
                            @if ($article->photo)
                                <img src="{{ Storage::disk('s3')->url($article->photo) }}"
                                    alt="{{ $article->title }}" />
                            @else
                                <img src="{{ asset('images/no-image.png') }}" alt="No Image" />
                            @endif
                            <h3>{{ $article->title }}</h3>
                            <p class="meta">Article — {{ $article->created_at->format('F j, Y') }}</p>
                        </a>
                    </div>
                @endforeach
            </div>
        </section>
        <section class="questions-section" id="faq">
            <div class="question-header">
                <h1>Frequently Asked <br>Questions</h1>
            </div>

            <div class="faq-item">
                <div class="faq-question">What is a palm kernel shell (PKS) company? <span class="toggle">+</span>
                </div>
                <div class="faq-answer">
                    A palm kernel shell company is a business that processes and supplies palm kernel shells — a
                    byproduct of palm oil production — commonly used as biofuel and biomass energy.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">What are the main uses of palm kernel shells? <span class="toggle">+</span>
                </div>
                <div class="faq-answer">
                    Palm kernel shells are primarily used as renewable energy sources in power plants, boilers, and
                    cement factories due to their high calorific value and eco-friendly characteristics.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">Where do you source your palm kernel shells? <span class="toggle">+</span>
                </div>
                <div class="faq-answer">
                    We source our PKS directly from certified palm oil mills across Indonesia, ensuring sustainability
                    and consistent supply quality.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">Do you export palm kernel shells internationally? <span
                        class="toggle">+</span></div>
                <div class="faq-answer">
                    Yes, we export PKS to various countries in Asia and Europe, complying with international shipping
                    standards and biomass quality certifications.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">How can I partner or purchase from your company? <span
                        class="toggle">+</span></div>
                <div class="faq-answer">
                    You can reach out to us through our contact page. We offer flexible contract terms for both domestic
                    and international clients.
                </div>
            </div>
        </section>

        <section class="cta-footer-section" id="cta">
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
                    <h3><img src="{{ asset('assets/logo.png') }}" alt="fujiyama Logo" class="logo"> fujiyama</h3>
                    <p>Generix Express provides customized services for customers around the world from 50+ leading
                        industries. For more information please</p>
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
