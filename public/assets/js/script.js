function navMenu() {
    return {
      mobileMenu: false,
      dropdown: null,
      headerShrink: false,
      openDropdown(menu) {
        if (window.innerWidth >= 768) this.dropdown = menu;
      },
      closeDropdown() {
        if (window.innerWidth >= 768) this.dropdown = null;
      },
      toggleMobileMenu() {
        this.mobileMenu = !this.mobileMenu;
        if (!this.mobileMenu) this.mobileDropdown = null;
      },
      closeMobileMenu() {
        this.mobileMenu = false;
        this.mobileDropdown = null;
      },
      init() {
        window.addEventListener('scroll', () => {
          this.headerShrink = window.scrollY > 24;
        });
        window.addEventListener('resize', () => {
          if (window.innerWidth >= 768) {
            this.mobileMenu = false;
            this.mobileDropdown = null;
          }
          this.dropdown = null;
        });
      }
    }
  }
  function header() {
    return {
      headerShrink: false,
      mobileMenuOpen: false,
      currentOpenMobileDropdown: null, // Tracks which mobile dropdown (e.g., 'services', 'resources') is open

      init() {
        window.addEventListener('scroll', () => {
          this.headerShrink = window.scrollY > 50; // Adjust scroll threshold as needed
        });
        // Close mobile menu and any open dropdowns on resize to desktop sizes
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 768) { // Tailwind's 'md' breakpoint
                this.mobileMenuOpen = false;
                this.currentOpenMobileDropdown = null; // Also close any open dropdowns
            }
        });
      },
      toggleMobileMenu() {
        this.mobileMenuOpen = !this.mobileMenuOpen;
        if (!this.mobileMenuOpen) {
          this.currentOpenMobileDropdown = null; // Close all dropdowns when main menu is closed
        }
      },
      toggleMobileSubMenu(dropdownName) {
        if (this.currentOpenMobileDropdown === dropdownName) {
          this.currentOpenMobileDropdown = null; // Close if already open
        } else {
          this.currentOpenMobileDropdown = dropdownName; // Open the new one, automatically closing others
        }
      }
    }
  }