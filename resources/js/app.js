import './bootstrap';

document.addEventListener('DOMContentLoaded', function() {
    // Mobile menu toggle
    const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
    const navLinks = document.querySelector('.nav-links');
    
    if (mobileMenuToggle && navLinks) {
        const menuIcon = mobileMenuToggle.querySelector('i');
        mobileMenuToggle.addEventListener('click', function() {
            navLinks.classList.toggle('active');
            
            // Toggle hamburger/close icon
            if (navLinks.classList.contains('active')) {
                menuIcon.classList.remove('fa-bars');
                menuIcon.classList.add('fa-times');
            } else {
                menuIcon.classList.remove('fa-times');
                menuIcon.classList.add('fa-bars');
            }
        });
        
        // Close menu when clicking on a link
        navLinks.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', function() {
                navLinks.classList.remove('active');
                menuIcon.classList.remove('fa-times');
                menuIcon.classList.add('fa-bars');
            });
        });
        
        // Close menu when clicking outside
        document.addEventListener('click', function(e) {
            if (!mobileMenuToggle.contains(e.target) && !navLinks.contains(e.target)) {
                navLinks.classList.remove('active');
                menuIcon.classList.remove('fa-times');
                menuIcon.classList.add('fa-bars');
            }
        });
    }


    // Smooth scrolling for navigation links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            e.stopPropagation();
            
            const href = this.getAttribute('href');
            
            // Skip empty or invalid selectors
            if (!href || href === '#' || href.length <= 1) {
                return;
            }
            
            const target = document.querySelector(href);
            if (target) {
                // Smooth scroll without changing URL
                const headerHeight = document.querySelector('header').offsetHeight;
                const targetPosition = target.offsetTop - headerHeight;
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
                
                // Close mobile menu if open
                const mobileNav = document.querySelector('.nav-links');
                const menuIcon = document.querySelector('.mobile-menu-toggle i');
                if (mobileNav && mobileNav.classList.contains('active')) {
                    mobileNav.classList.remove('active');
                    if (menuIcon) {
                        menuIcon.classList.remove('fa-times');
                        menuIcon.classList.add('fa-bars');
                    }
                }
            }
        });
    });

    // Form submission
    const contactForm = document.querySelector('.contact-form');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Clear previous errors
            document.querySelectorAll('.error-message').forEach(el => el.textContent = '');
            document.getElementById('form-message').textContent = '';
            
            // Show loading state
            const submitBtn = this.querySelector('.submit-btn');
            const btnText = submitBtn.querySelector('.btn-text');
            const btnLoading = submitBtn.querySelector('.btn-loading');
            
            submitBtn.disabled = true;
            btnText.style.display = 'none';
            btnLoading.style.display = 'inline';
            
            // Prepare form data
            const formData = new FormData(this);
            
            // Submit form
            fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Show success message
                    document.getElementById('form-message').innerHTML = `
                        <div class="success" style="background: rgba(16, 185, 129, 0.1); border: 1px solid rgba(16, 185, 129, 0.2); color: #059669; padding: 1rem; border-radius: 10px; animation: slideIn 0.3s ease;">
                            <i class="fas fa-check-circle" style="margin-right: 0.5rem;"></i>
                            ${data.message}
                        </div>
                    `;
                    this.reset();
                    
                    // Add celebration effect
                    setTimeout(() => {
                        const successEl = document.querySelector('.success');
                        if (successEl) {
                            successEl.style.animation = 'pulse 0.5s ease';
                        }
                    }, 300);
                } else {
                    // Show validation errors
                    if (data.errors) {
                        Object.keys(data.errors).forEach(field => {
                            const errorElement = document.getElementById(field + '-error');
                            if (errorElement) {
                                errorElement.textContent = data.errors[field][0];
                            }
                        });
                    }
                    
                    if (data.message) {
                        document.getElementById('form-message').innerHTML = `
                            <div class="error" style="background: rgba(239, 68, 68, 0.1); border: 1px solid rgba(239, 68, 68, 0.2); color: #dc2626; padding: 1rem; border-radius: 10px; animation: shake 0.5s ease;">
                                <i class="fas fa-exclamation-circle" style="margin-right: 0.5rem;"></i>
                                ${data.message}
                            </div>
                        `;
                    }
                }
            })
            .catch(error => {
                console.error('Error:', error);
                document.getElementById('form-message').innerHTML = `
                    <div style="color: #ef4444; background: rgba(239, 68, 68, 0.1); padding: 1rem; border-radius: 5px; margin-top: 1rem;">
                        Er is een fout opgetreden. Probeer het later opnieuw.
                    </div>
                `;
            })
            .finally(() => {
                // Reset button state
                submitBtn.disabled = false;
                btnText.style.display = 'inline';
                btnLoading.style.display = 'none';
            });
        });
    }

    // Performance optimizations
    
    // Lazy loading for images
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.classList.remove('lazy');
                    img.classList.add('loaded');
                    observer.unobserve(img);
                }
            });
        });

        document.querySelectorAll('img[data-src]').forEach(img => {
            imageObserver.observe(img);
        });
    } else {
        // Fallback for older browsers
        document.querySelectorAll('img[data-src]').forEach(img => {
            img.src = img.dataset.src;
            img.classList.add('loaded');
        });
    }

    // Preload and inject critical resources
    function preloadCriticalResources() {
        const criticalResources = [
            'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css'
        ];

        criticalResources.forEach(resource => {
            // Check if the stylesheet is already loaded
            const existingLink = document.querySelector(`link[href="${resource}"]`);
            if (existingLink) return;
            
            // Create stylesheet link instead of preload
            const link = document.createElement('link');
            link.rel = 'stylesheet';
            link.href = resource;
            link.crossOrigin = 'anonymous';
            document.head.appendChild(link);
        });
    }

    // Performance monitoring (disabled in development)
    // Uncomment below for production performance monitoring
    /*
    if ('PerformanceObserver' in window && window.location.hostname !== 'gastouderopvangkiki.test') {
        // Monitor Largest Contentful Paint
        const lcpObserver = new PerformanceObserver((list) => {
            const entries = list.getEntries();
            const lastEntry = entries[entries.length - 1];
            console.log('LCP:', lastEntry.startTime);
        });
        lcpObserver.observe({ entryTypes: ['largest-contentful-paint'] });

        // Monitor First Input Delay
        const fidObserver = new PerformanceObserver((list) => {
            list.getEntries().forEach((entry) => {
                const delay = entry.processingStart - entry.startTime;
                console.log('FID:', delay);
            });
        });
        fidObserver.observe({ entryTypes: ['first-input'] });

        // Monitor Cumulative Layout Shift
        let clsValue = 0;
        const clsObserver = new PerformanceObserver((list) => {
            list.getEntries().forEach((entry) => {
                if (!entry.hadRecentInput) {
                    clsValue += entry.value;
                    console.log('CLS:', clsValue);
                }
            });
        });
        clsObserver.observe({ entryTypes: ['layout-shift'] });
    }
    */

    // Service Worker registration for caching
    if ('serviceWorker' in navigator && window.location.protocol === 'https:') {
        navigator.serviceWorker.register('/sw.js')
            .then(registration => {
                console.log('Service Worker registered:', registration);
            })
            .catch(error => {
                console.log('Service Worker registration failed:', error);
            });
    }

    // Critical resource hints
    preloadCriticalResources();

    // Optimize font loading
    if ('fonts' in document) {
        document.fonts.ready.then(() => {
            document.body.classList.add('fonts-loaded');
        });
    }

    // Optimize images with Intersection Observer for animations
    const animationObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.animation = 'fadeInUp 0.6s ease forwards';
                animationObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });

    // Observe service cards and contact items for animations
    document.querySelectorAll('.service-card, .contact-item, .about-text').forEach(el => {
        animationObserver.observe(el);
    });

    // No JavaScript needed for the new CSS-only carousel
});
