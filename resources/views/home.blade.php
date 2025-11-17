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
            <div class="hero-overlay"></div>
            <div class="hero-content">
                <h1 itemprop="name">Welkom bij Gastouderopvang Kiki</h1>
                <p itemprop="description">Een warme, huiselijke plek waar uw kind zich veilig en geliefd voelt. Met veel
                    aandacht, plezier en persoonlijke zorg voor kinderen van 0-4 jaar in Schollevaar, Capelle aan den
                    IJssel.</p>
                <a href="#contact" class="cta-button" aria-label="Ga naar contactformulier">Laten we kennismaken</a>
            </div>
        </section>

        <section id="services" class="services" role="main" aria-labelledby="services-title">
            <div class="container">
                <h2 id="services-title" class="section-title">Onze Diensten</h2>
                <div class="services-grid">
                    <article class="service-card" itemscope itemtype="https://schema.org/Service">
                        <div class="service-icon" aria-hidden="true"><i class="fas fa-heart"></i></div>
                        <h3 itemprop="name">Persoonlijke Aandacht</h3>
                        <p itemprop="description">Kleinschalige opvang waar ik elk kind goed leer kennen. Samen
                            ontdekken we wat uw kindje leuk vindt en waar het in uitblinkt.</p>
                    </article>
                    <article class="service-card" itemscope itemtype="https://schema.org/Service">
                        <div class="service-icon" aria-hidden="true"><i class="fas fa-palette"></i></div>
                        <h3 itemprop="name">Spelen & Ontwikkelen</h3>
                        <p itemprop="description">Van knutselen tot buitenspelen: elke dag nieuwe avonturen die
                            aansluiten bij de leeftijd en interesses van uw kind.</p>
                    </article>
                    <article class="service-card" itemscope itemtype="https://schema.org/Service">
                        <div class="service-icon" aria-hidden="true"><i class="fas fa-home"></i></div>
                        <h3 itemprop="name">Huiselijke Sfeer</h3>
                        <p itemprop="description">Opvang in onze gezellige woning met zonnige tuin. Hier voelt uw kind
                            zich thuis en kan het lekker ontspannen spelen.</p>
                    </article>
                </div>
            </div>
        </section>

        <section id="about" class="about" role="main" aria-labelledby="about-title">
            <div class="container">
                <div class="about-content">
                    <div class="about-text">
                        <h2 id="about-title">
                            Hallo, ik ben Marjolein
                            <span class="subtitle">– leuk dat je op mijn website kijkt!</span>
                        </h2>

                        <p>
                            Samen met mijn man Jack, hondje Jip en valkparkiet Kiki woon ik in een ruime
                            eengezinswoning. Onze 2 volwassen zonen zijn het huis al uit.
                        </p>

                        <p>
                            Ik ben deze gastouderopvang begonnen omdat ik graag met kinderen werk. Ik wil ervoor zorgen
                            dat zij een fijne dag hebben terwijl hun ouders studeren en/of werken. Mijn man Jack
                            ondersteunt mij met hand- en spandiensten, maar de verzorgende en pedagogische taken zijn
                            voor mijn rekening.
                        </p>

                        <p>
                            Ik ben een gecertificeerd gastouder, waardoor je bij mijn opvang recht hebt op
                            kinderopvangtoeslag.
                        </p>

                        <p>
                            In ons eigen huis creëren we een warme plek waar de kinderen zich thuis voelen en zorgen we
                            ervoor dat zij zich ontwikkelen in hun eigen tempo. Dit doe ik met een uitgebreid aanbod van
                            speelgoed en ontwikkelingsgerichte materialen. Zo kunnen ze zich op een speelse manier
                            ontwikkelen en daag ik ze uit op diverse gebieden.
                        </p>

                        <p>
                            Van creatief bezig zijn, een treinbaan maken, buiten spelen of lekker ontprikkelen met
                            sensorische materialen: elke dag zijn er bij ons nieuwe avonturen te beleven.
                        </p>

                        <p>
                            <strong>Neem gerust contact met mij op om een afspraak te maken!</strong>
                        </p>

                        <ul class="about-features">
                            <li>Kleinschalig, dus veel persoonlijke aandacht</li>
                            <li>Flexibel en meedenkend met uw gezin</li>
                            <li>Zonnige tuin waar we elke dag buiten zijn</li>
                            <li>Dichtbij natuur, speeltuinen en voorzieningen</li>
                            <li>Een luisterend oor en open communicatie</li>
                        </ul>
                    </div>
                    <div class="about-image">
                        <img
                            src="https://images.unsplash.com/photo-1621293051751-6514b7f9515d?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&q=80&w=1712"
                            alt="Gelukkige kinderen bij Gastouderopvang Kiki">
                        <div class="image-caption">
                            <p>💚 Waar elk kind zich thuis voelt</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="gallery" role="main" aria-labelledby="gallery-title">
            <div class="container">
                <h2 id="gallery-title" class="section-title">Onze Opvang</h2>
                <div class="gallery-grid">
                    <div class="gallery-item">
                        <img
                            src="https://images.unsplash.com/photo-1503454537195-1dcabb73ffb9?ixlib=rb-4.1.0&auto=format&fit=crop&w=800&q=80"
                            alt="Speelhoek voor kinderen">
                        <div class="gallery-caption">Gezellige speelhoek</div>
                    </div>
                    <div class="gallery-item">
                        <img
                            src="https://images.unsplash.com/photo-1576495199011-eb94736d05d6?ixlib=rb-4.1.0&auto=format&fit=crop&w=800&q=80"
                            alt="Zonnige tuin">
                        <div class="gallery-caption">Onze zonnige tuin</div>
                    </div>
                    <div class="gallery-item">
                        <img
                            src="https://images.unsplash.com/photo-1587654780291-39c9404d746b?ixlib=rb-4.1.0&auto=format&fit=crop&w=800&q=80"
                            alt="Creatieve activiteiten">
                        <div class="gallery-caption">Creatief bezig zijn</div>
                    </div>
                </div>
            </div>
        </section>

        <section id="contact" class="contact" role="main" aria-labelledby="contact-title">
            <div class="container">
                <h2 id="contact-title" class="section-title">Contact</h2>
                <div class="contact-content">
                    <div class="contact-info">
                        <h3>Zullen we kennismaken?</h3>
                        <p class="contact-intro">Nieuwsgierig geworden? Neem gerust contact op voor een vrijblijvend
                            kennismakingsgesprek!</p>
                        <div class="contact-details">
                            <div class="contact-detail-item" itemscope itemtype="https://schema.org/PostalAddress">
                                <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                                <a href="https://www.google.com/maps/search/?api=1&query=Vreugdedans+18,+2907TJ+Capelle+aan+den+IJssel" target="_blank" rel="noopener noreferrer" aria-label="Open adres in Google Maps">
                                    <span itemprop="streetAddress">Vreugdedans 18</span><br>
                                    <span itemprop="postalCode">2907TJ</span> <span itemprop="addressLocality">Capelle aan den IJssel</span>
                                </a>
                            </div>
                            <div class="contact-detail-item">
                                <i class="fas fa-phone" aria-hidden="true"></i>
                                <a href="tel:+31611313969" itemprop="telephone">06-11313969</a>
                            </div>
                            <div class="contact-detail-item">
                                <i class="fas fa-envelope" aria-hidden="true"></i>
                                <a href="mailto:marjolein@kimol.nl" itemprop="email">marjolein@kimol.nl</a>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="contact-item-header">
                                <div class="contact-item-icon"><i class="fas fa-clock"></i></div>
                                <strong>Openingstijden</strong>
                            </div>
                            <div class="contact-item-content opening-hours">
                                <div class="hours-row">
                                    <span class="day">Maandag</span>
                                    <span class="time">8:00 - 18:00</span>
                                </div>
                                <div class="hours-row">
                                    <span class="day">Dinsdag</span>
                                    <span class="time">8:00 - 18:00</span>
                                </div>
                                <div class="hours-row closed">
                                    <span class="day">Woensdag</span>
                                    <span class="time">Gesloten</span>
                                </div>
                                <div class="hours-row">
                                    <span class="day">Donderdag</span>
                                    <span class="time">8:00 - 18:00</span>
                                </div>
                                <div class="hours-row">
                                    <span class="day">Vrijdag</span>
                                    <span class="time">8:00 - 18:00</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <livewire:contact-form />
                </div>
            </div>
        </section>
    </main>

    <footer role="contentinfo">
        <p>&copy; {{ date('Y') }} Gastouderopvang Kiki. Alle rechten voorbehouden.</p>
        <p>Website door <a href="https://librus.nl" target="_blank">Librus</a></p>
    </footer>

@endsection
