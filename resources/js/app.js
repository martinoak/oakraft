import './bootstrap';

// Mobile menu functionality
document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenuClose = document.getElementById('mobile-menu-close');
    const mobileMenu = document.getElementById('mobile-menu');

    if (mobileMenuButton && mobileMenu && mobileMenuClose) {
        mobileMenuButton.addEventListener('click', function() {
            mobileMenu.classList.remove('hidden');
        });

        mobileMenuClose.addEventListener('click', function() {
            mobileMenu.classList.add('hidden');
        });

        // Close menu when clicking outside
        document.addEventListener('click', function(event) {
            if (!mobileMenu.contains(event.target) && !mobileMenuButton.contains(event.target)) {
                mobileMenu.classList.add('hidden');
            }
        });
    }

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Search functionality enhancements
    const searchForm = document.querySelector('form[action*="home"]');
    const searchInput = document.querySelector('input[name="search"]');
    const categorySelect = document.querySelector('select[name="category"]');

    if (searchForm && categorySelect) {
        // Auto-submit form on category change
        categorySelect.addEventListener('change', function() {
            searchForm.submit();
        });
    }

    // --- Mobile filter off-canvas ---
    const mobileFilterDialog = document.querySelector('.lg\\:hidden[role="dialog"]');
    const mobileFilterBackdrop = mobileFilterDialog?.querySelector('.fixed.inset-0.bg-black\\/25');
    const mobileFilterPanel = mobileFilterDialog?.querySelector('.fixed.inset-0.z-40.flex');

    // Helper for :contains polyfill
    function findButtonBySrOnlyText(text) {
        return Array.from(document.querySelectorAll('button')).find(btn => {
            const sr = btn.querySelector('.sr-only');
            return sr && sr.textContent.trim() === text;
        });
    }

    const openMobileBtn = findButtonBySrOnlyText('Filters');
    const closeMobileBtn = findButtonBySrOnlyText('Close menu');

    function openMobileFilter() {
        mobileFilterDialog.style.display = '';
        setTimeout(() => {
            mobileFilterBackdrop.classList.add('opacity-100');
            mobileFilterPanel.classList.remove('translate-x-full');
            mobileFilterPanel.classList.add('translate-x-0');
        }, 10);
        document.body.style.overflow = 'hidden';
    }
    function closeMobileFilter() {
        mobileFilterBackdrop.classList.remove('opacity-100');
        mobileFilterPanel.classList.remove('translate-x-0');
        mobileFilterPanel.classList.add('translate-x-full');
        setTimeout(() => {
            mobileFilterDialog.style.display = 'none';
            document.body.style.overflow = '';
        }, 300);
    }
    if (openMobileBtn && mobileFilterDialog) {
        mobileFilterDialog.style.display = 'none';
        openMobileBtn.addEventListener('click', openMobileFilter);
    }
    if (closeMobileBtn && mobileFilterDialog) {
        closeMobileBtn.addEventListener('click', closeMobileFilter);
    }
    if (mobileFilterBackdrop) {
        mobileFilterBackdrop.addEventListener('click', closeMobileFilter);
    }

    // --- Admin mobile sidebar ---
    const adminMobileMenuButton = document.getElementById('admin-mobile-menu-button');
    const adminMobileMenuClose = document.getElementById('admin-mobile-menu-close');
    const adminMobileMenu = document.getElementById('admin-mobile-menu');

    if (adminMobileMenuButton && adminMobileMenu && adminMobileMenuClose) {
        adminMobileMenuButton.addEventListener('click', function() {
            adminMobileMenu.classList.remove('hidden');
        });

        adminMobileMenuClose.addEventListener('click', function() {
            adminMobileMenu.classList.add('hidden');
        });

        // Close menu when clicking outside
        document.addEventListener('click', function(event) {
            if (!adminMobileMenu.contains(event.target) && !adminMobileMenuButton.contains(event.target)) {
                adminMobileMenu.classList.add('hidden');
            }
        });
    }
});
