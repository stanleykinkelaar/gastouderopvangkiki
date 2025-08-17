@extends('layouts.seo')

@section('content')
    <header role="banner">
        <nav role="navigation" aria-label="Hoofdnavigatie">
            <a href="#home" class="logo">
                <span class="logo-full">Gastouderopvang Kiki</span>
                <span class="logo-short">Kiki</span>
            </a>
            <button class="mobile-menu-toggle" aria-label="Menu">
                <i class="fas fa-bars"></i>
            </button>
            <ul class="nav-links">
                <li><a href="#home">Home</a></li>
                <li><a href="#services">Diensten</a></li>
                <li><a href="#about">Over Mij</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
    </header>

    <main>
    <section id="home" class="hero" role="banner">
        <div class="hero-content">
            <h1 itemprop="name">Welkom bij Gastouderopvang Kiki</h1>
            <p itemprop="description">Liefevolle en professionele kinderopvang voor kinderen van 0-8 jaar in Capelle aan den IJssel, wijk Schollevaar</p>
            <a href="#contact" class="cta-button" aria-label="Ga naar contactformulier">Neem Contact Op</a>
        </div>
    </section>

    <section id="services" class="services" role="main" aria-labelledby="services-title">
        <div class="container">
            <h2 id="services-title" class="section-title">Onze Diensten</h2>
            <div class="services-grid">
                <article class="service-card" itemscope itemtype="https://schema.org/Service">
                    <div class="service-icon" aria-hidden="true"><i class="fas fa-baby"></i></div>
                    <h3 itemprop="name">Dagopvang</h3>
                    <p itemprop="description">Volledige dagopvang in een warme, huiselijke omgeving met veel aandacht voor elk individueel kind.</p>
                </article>
                <article class="service-card" itemscope itemtype="https://schema.org/Service">
                    <div class="service-icon" aria-hidden="true"><i class="fas fa-palette"></i></div>
                    <h3 itemprop="name">Creatieve Activiteiten</h3>
                    <p itemprop="description">Dagelijks gevarieerde activiteiten die de creativiteit en ontwikkeling van uw kind stimuleren.</p>
                </article>
                <article class="service-card" itemscope itemtype="https://schema.org/Service">
                    <div class="service-icon" aria-hidden="true"><i class="fas fa-tree"></i></div>
                    <h3 itemprop="name">Buitenspel</h3>
                    <p itemprop="description">Zonnige achtertuin en nabij het Schollebos voor veel buitenspel en natuurontdekking.</p>
                </article>
            </div>
        </div>
    </section>

    <section id="about" class="about" role="main" aria-labelledby="about-title">
        <div class="container">
            <div class="about-content">
                <div class="about-text">
                    <h2 id="about-title">Over Gastouderopvang Kiki</h2>
                    <p>Welkom bij gastouderopvang Kiki! Ik bied liefevolle kinderopvang voor kinderen in de leeftijd van 0-4 jaar in de kindvriendelijke wijk Schollevaar in Capelle aan den IJssel.</p>
                    <p>De opvang vindt plaats in onze gezellige eengezinswoning met een mooie zonnige achtertuin waarin heerlijk gespeeld kan worden. Wij bevinden ons nabij het openbaar vervoer, het Schollebos, speeltuinen en scholen.</p>

                    <ul class="about-features">
                        <li>Kleinschalige opvang in huiselijke sfeer</li>
                        <li>Nabij openbaar vervoer en voorzieningen</li>
                        <li>Zonnige achtertuin voor buitenspel</li>
                        <li>Dicht bij Schollebos en speeltuinen</li>
                        <li>Voldoende parkeergelegenheid</li>
                    </ul>
                </div>
                <div class="about-image">
                    <div>
                        <p><i class="fas fa-home"></i></p>
                        <p>Huiselijke opvang in<br>Schollevaar, Capelle a/d IJssel</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="contact" role="main" aria-labelledby="contact-title">
        <div class="container">
            <h2 id="contact-title" class="section-title">Contact</h2>
            <div class="contact-content">
                <div class="contact-info">
                    <h3>Neem Contact Op</h3>
                    <div class="contact-item" itemscope itemtype="https://schema.org/PostalAddress">
                        <div class="contact-item-header">
                            <div class="contact-item-icon" aria-hidden="true"><i class="fas fa-map-marker-alt"></i></div>
                            <strong>Locatie</strong>
                        </div>
                        <div class="contact-item-content">
                            <span itemprop="streetAddress">Vreugdedans 18</span><br>
                            <span itemprop="postalCode">2907TJ</span> <span itemprop="addressLocality">Capelle aan den IJssel</span>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-item-header">
                            <div class="contact-item-icon" aria-hidden="true"><i class="fas fa-phone"></i></div>
                            <strong>Telefoon</strong>
                        </div>
                        <div class="contact-item-content">
                            <a href="tel:+31611313969" itemprop="telephone">06-11313969</a>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-item-header">
                            <div class="contact-item-icon" aria-hidden="true"><i class="fas fa-envelope"></i></div>
                            <strong>E-mail</strong>
                        </div>
                        <div class="contact-item-content">
                            <a href="mailto:info@gastouderopvangkiki.nl" itemprop="email">info@gastouderopvangkiki.nl</a>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-item-header">
                            <div class="contact-item-icon"><i class="fas fa-clock"></i></div>
                            <strong>Openingstijden</strong>
                        </div>
                        <div class="contact-item-content">
                            Maandag t/m Vrijdag<br>
                            8:00 - 18:00
                        </div>
                    </div>
                </div>

                <form class="contact-form" id="contact-form" action="{{ route('contact.store') }}" method="POST" aria-labelledby="contact-form-title">
                    <h3 id="contact-form-title">Stuur ons een bericht</h3>
                    <p>Heeft u vragen over onze opvang of wilt u een kennismakingsgesprek plannen? Vul het formulier in en wij nemen zo snel mogelijk contact met u op.</p>
                    @csrf
                    <div class="form-group">
                        <label for="name">Naam *</label>
                        <input type="text" id="name" name="name" required aria-required="true" autocomplete="name">
                        <div class="error-message" id="name-error"></div>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail *</label>
                        <input type="email" id="email" name="email" required aria-required="true" autocomplete="email">
                        <div class="error-message" id="email-error"></div>
                    </div>
                    <div class="form-group">
                        <label for="phone">Telefoon</label>
                        <input type="tel" id="phone" name="phone" autocomplete="tel">
                        <div class="error-message" id="phone-error"></div>
                    </div>
                    <div class="form-group">
                        <label for="message">Bericht *</label>
                        <textarea id="message" name="message" rows="5" placeholder="Vertel ons over uw kind en uw opvangwensen..." required aria-required="true"></textarea>
                        <div class="error-message" id="message-error"></div>
                    </div>
                    <button type="submit" class="submit-btn">
                        <span class="btn-text">Verstuur Bericht</span>
                        <span class="btn-loading" style="display: none;">Verzenden...</span>
                    </button>
                    <div class="form-message" id="form-message"></div>
                </form>
            </div>
        </div>
    </section>
    </main>

    <footer role="contentinfo">
        <p>&copy; {{ date('Y') }} Gastouderopvang Kiki. Alle rechten voorbehouden.</p>
        <p>Website door <a href="https://librus.nl" target="_blank">Librus</a></p>
    </footer>

@endsection
