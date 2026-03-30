/**
 * GSAP Homepage Animations
 * 
 * Configures GSAP ScrollTrigger for homepage animations
 * @see _bmad/bmm/3-solutioning/fixcity-homepage-architecture.md
 */

import gsap from 'gsap';
import ScrollTrigger from 'gsap/ScrollTrigger';

// Register ScrollTrigger plugin
gsap.registerPlugin(ScrollTrigger);

/**
 * Initialize homepage animations
 */
export function initHomepageAnimations() {
    // Check for reduced motion preference
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    
    if (prefersReducedMotion) {
        // Disable all animations for accessibility
        gsap.globalTimeline.timeScale(0);
        return;
    }
    
    // Hero section fade-in
    gsap.from('.hero-section', {
        opacity: 0,
        y: 50,
        duration: 1.5,
        ease: 'power3.out',
        delay: 0.2
    });
    
    // Hero headline stagger animation
    gsap.from('#hero-heading', {
        opacity: 0,
        y: 30,
        duration: 1.2,
        ease: 'power3.out',
        delay: 0.4
    });
    
    // Badge animation
    gsap.from('[class*="badge"]', {
        opacity: 0,
        scale: 0.8,
        duration: 0.8,
        ease: 'back.out(1.7)',
        delay: 0.6
    });
    
    // CTA buttons animation
    gsap.from('a[href*="predicts"], a[href*="register"]', {
        opacity: 0,
        y: 20,
        duration: 0.8,
        stagger: 0.2,
        ease: 'power2.out',
        delay: 0.8
    });
    
    // Stats counter animation with ScrollTrigger
    const counters = document.querySelectorAll('.counter-value');
    
    counters.forEach(counter => {
        const target = parseInt(counter.getAttribute('data-target')) || 0;
        const duration = 2;
        const suffix = counter.getAttribute('data-suffix') || '';
        const prefix = counter.getAttribute('data-prefix') || '';
        
        // Create animation
        gsap.to(counter, {
            innerText: target,
            duration: duration,
            ease: 'power2.out',
            snap: { innerText: 1 },
            scrollTrigger: {
                trigger: counter,
                start: 'top 85%',
                once: true // Only animate once
            },
            onUpdate: function() {
                // Format number with commas and suffix
                const value = Math.round(this.targets()[0].innerText);
                counter.innerText = prefix + value.toLocaleString() + suffix;
            }
        });
    });
    
    // Section fade-in animations
    const sections = document.querySelectorAll('section[aria-labelledby]');
    
    sections.forEach((section, index) => {
        gsap.from(section, {
            opacity: 0,
            y: 30,
            duration: 1,
            ease: 'power2.out',
            scrollTrigger: {
                trigger: section,
                start: 'top 85%',
                once: true
            },
            delay: index * 0.1 // Stagger sections
        });
    });
    
    // Market cards stagger animation
    gsap.from('[class*="market-card"], [class*="featured-grid"] a', {
        opacity: 0,
        y: 30,
        duration: 0.8,
        stagger: 0.1,
        ease: 'power2.out',
        scrollTrigger: {
            trigger: '[class*="featured-grid"]',
            start: 'top 80%',
            once: true
        }
    });
    
    // Parallax effect for particles (subtle)
    gsap.to('.particles-container', {
        y: 50,
        scrollTrigger: {
            trigger: 'body',
            start: 'top top',
            end: 'bottom top',
            scrub: 1
        },
        ease: 'none'
    });
}

/**
 * Initialize kinetic counters (alternative to GSAP)
 */
export function initKineticCounters() {
    const counters = document.querySelectorAll('[data-kinetic-counter]');
    
    counters.forEach(counter => {
        const target = parseInt(counter.getAttribute('data-kinetic-counter')) || 0;
        const duration = parseInt(counter.getAttribute('data-kinetic-duration')) || 2000;
        const delay = parseInt(counter.getAttribute('data-kinetic-delay')) || 0;
        const suffix = counter.getAttribute('data-suffix') || '';
        const prefix = counter.getAttribute('data-prefix') || '';
        
        // Use Intersection Observer for scroll-triggered animation
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                        animateCounter(counter, target, duration, prefix, suffix);
                    }, delay);
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });
        
        observer.observe(counter);
    });
}

/**
 * Animate counter value
 */
function animateCounter(element, target, duration, prefix, suffix) {
    const start = 0;
    const startTime = performance.now();
    
    function update(currentTime) {
        const elapsed = currentTime - startTime;
        const progress = Math.min(elapsed / duration, 1);
        
        // Easing function (easeOutQuart)
        const ease = 1 - Math.pow(1 - progress, 4);
        const current = Math.round(start + (target - start) * ease);
        
        element.innerText = prefix + current.toLocaleString() + suffix;
        
        if (progress < 1) {
            requestAnimationFrame(update);
        }
    }
    
    requestAnimationFrame(update);
}

/**
 * Initialize on DOM ready
 */
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => {
        initHomepageAnimations();
        initKineticCounters();
    });
} else {
    initHomepageAnimations();
    initKineticCounters();
}

// Export for external usage
window.FixCityHomepage = {
    init: initHomepageAnimations,
    initCounters: initKineticCounters
};
