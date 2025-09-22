// Simple scroll-triggered counter animation
let hasAnimated = false;

function startCounterAnimation() {
    if (hasAnimated) return;
    hasAnimated = true;
    
    const counters = document.querySelectorAll('.counter');
    
    counters.forEach(counter => {
        const target = parseInt(counter.getAttribute('data-target'));
        const suffix = counter.getAttribute('data-suffix') || '';
        const decimal = parseInt(counter.getAttribute('data-decimal')) || 0;
        const duration = 2000;
        const startTime = performance.now();
        
        const updateCount = (currentTime) => {
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);
            const easedProgress = 1 - Math.pow(1 - progress, 3);
            const currentCount = Math.floor(easedProgress * target);
            
            let displayValue;
            if (suffix === 'K') {
                displayValue = (currentCount / 1000).toFixed(decimal) + suffix;
            } else {
                displayValue = currentCount + suffix;
            }
            
            counter.innerText = displayValue;
            
            if (progress < 1) {
                requestAnimationFrame(updateCount);
            } else {
                let finalValue;
                if (suffix === 'K') {
                    finalValue = (target / 1000).toFixed(decimal) + suffix;
                } else {
                    finalValue = target + suffix;
                }
                counter.innerText = finalValue;
            }
        };
        
        const delay = Array.from(counters).indexOf(counter) * 200;
        setTimeout(() => requestAnimationFrame(updateCount), delay);
    });
}

function checkVisibility() {
    const statsSection = document.getElementById('stats-section');
    const rect = statsSection.getBoundingClientRect();
    const isVisible = rect.top < window.innerHeight && rect.bottom > 0;
    
    if (isVisible) {
        startCounterAnimation();
        window.removeEventListener('scroll', checkVisibility);
    }
}

// Add scroll listener only when page is fully loaded
window.addEventListener('load', () => {
    window.addEventListener('scroll', checkVisibility);
    checkVisibility(); // Check initial state
});