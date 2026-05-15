// JavaScript for accessibility features - elements styling

document.addEventListener('DOMContentLoaded', function() {
    // Get elements
    const header = document.querySelector('header');
    const navbar = document.getElementById('navbar-tag');
    const footer = document.querySelector('footer');
    
    // Get buttons
    const loadPreferencesBtn = document.getElementById('load-preferences-btn');
    const resetPreferencesBtn = document.getElementById('reset-preferences-btn');
    const savePreferencesBtn = document.getElementById('save-preferences-btn');
    const resetAllPreferencesBtn = document.getElementById('reset-all-preferences');
    
    // Font size buttons
    const fontSizeButtons = document.querySelectorAll('.font-size');
    // Color scheme buttons
    const colorSchemeButtons = document.querySelectorAll('.color-scheme');
    // Checkbox elements
    const toggleImages = document.getElementById('toggle-images');
    const toggleHighContrast = document.getElementById('toggle-high-contrast');
    const toggleFocusIndicator = document.getElementById('toggle-focus-indicator');
    const toggleTextSpacing = document.getElementById('toggle-text-spacing');
    
    // Load preferences from localStorage
    function loadPreferences() {
        const preferences = JSON.parse(localStorage.getItem('accessibilityPreferences')) || {};
        
        // Apply font size
        if (preferences.fontSize) {
            document.body.classList.remove('font-small', 'font-large');
            if (preferences.fontSize !== 'normal') {
                document.body.classList.add(`font-${preferences.fontSize}`);
            }
        }
        
        // Apply color scheme
        if (preferences.colorScheme) {
            // Remove all color scheme classes
            document.body.classList.remove(
                'dark-white', 'dark-green', 'white-black', 
                'beige-brown', 'blue-navy'
            );
            // Add selected scheme
            document.body.classList.add(preferences.colorScheme);
        }
        
        // Apply image toggle
        if (preferences.disableImages) {
            document.body.classList.add('no-images');
            toggleImages.checked = true;
        } else {
            document.body.classList.remove('no-images');
            toggleImages.checked = false;
        }
        
        // Apply high contrast
        if (preferences.highContrast) {
            document.body.classList.add('high-contrast');
            toggleHighContrast.checked = true;
        } else {
            document.body.classList.remove('high-contrast');
            toggleHighContrast.checked = false;
        }
        
        // Apply focus indicator
        if (preferences.focusIndicator) {
            document.body.classList.add('focus-indicator');
            toggleFocusIndicator.checked = true;
        } else {
            document.body.classList.remove('focus-indicator');
            toggleFocusIndicator.checked = false;
        }
        
        // Apply text spacing
        if (preferences.textSpacing) {
            document.body.classList.add('text-spaced');
            toggleTextSpacing.checked = true;
        } else {
            document.body.classList.remove('text-spaced');
            toggleTextSpacing.checked = false;
        }
    }
    
    // Save preferences to localStorage
    function savePreferences() {
        const preferences = {
            fontSize: document.body.classList.contains('font-small') ? 'small' :
                     document.body.classList.contains('font-large') ? 'large' : 'normal',
            colorScheme: document.body.classList.contains('dark-white') ? 'dark-white' :
                        document.body.classList.contains('dark-green') ? 'dark-green' :
                        document.body.classList.contains('white-black') ? 'white-black' :
                        document.body.classList.contains('beige-brown') ? 'beige-brown' :
                        document.body.classList.contains('blue-navy') ? 'blue-navy' : null,
            disableImages: document.body.classList.contains('no-images'),
            highContrast: document.body.classList.contains('high-contrast'),
            focusIndicator: document.body.classList.contains('focus-indicator'),
            textSpacing: document.body.classList.contains('text-spaced')
        };
        
        localStorage.setItem('accessibilityPreferences', JSON.stringify(preferences));
    }
    
    // Reset all preferences
    function resetPreferences() {
        // Remove all accessibility classes
        document.body.classList.remove(
            'font-small', 'font-large',
            'dark-white', 'dark-green', 'white-black', 'beige-brown', 'blue-navy',
            'no-images', 'high-contrast', 'focus-indicator', 'text-spaced'
        );
        
        // Reset checkboxes
        toggleImages.checked = false;
        toggleHighContrast.checked = false;
        toggleFocusIndicator.checked = false;
        toggleTextSpacing.checked = false;
        
        // Save empty preferences
        localStorage.removeItem('accessibilityPreferences');
    }
    
    // Event listeners for font size buttons
    fontSizeButtons.forEach(button => {
        button.addEventListener('click', function() {
            const size = this.getAttribute('data-size');
            
            // Remove existing font size classes
            document.body.classList.remove('font-small', 'font-large');
            
            // Add new class if not normal
            if (size !== 'normal') {
                document.body.classList.add(`font-${size}`);
            }
            
            // Save preferences
            savePreferences();
        });
    });
    
    // Event listeners for color scheme buttons
    colorSchemeButtons.forEach(button => {
        button.addEventListener('click', function() {
            const scheme = this.getAttribute('data-scheme');
            
            // Remove all color scheme classes
            document.body.classList.remove(
                'dark-white', 'dark-green', 'white-black', 
                'beige-brown', 'blue-navy'
            );
            
            // Add selected scheme
            document.body.classList.add(scheme);
            
            // Save preferences
            savePreferences();
        });
    });
    
    // Event listener for toggle images
    toggleImages.addEventListener('change', function() {
        if (this.checked) {
            document.body.classList.add('no-images');
        } else {
            document.body.classList.remove('no-images');
        }
        savePreferences();
    });
    
    // Event listener for high contrast
    toggleHighContrast.addEventListener('change', function() {
        if (this.checked) {
            document.body.classList.add('high-contrast');
            // When high contrast is enabled, disable color scheme
            document.body.classList.remove(
                'dark-white', 'dark-green', 'white-black', 
                'beige-brown', 'blue-navy'
            );
        } else {
            document.body.classList.remove('high-contrast');
        }
        savePreferences();
    });
    
    // Event listener for focus indicator
    toggleFocusIndicator.addEventListener('change', function() {
        if (this.checked) {
            document.body.classList.add('focus-indicator');
        } else {
            document.body.classList.remove('focus-indicator');
        }
        savePreferences();
    });
    
    // Event listener for text spacing
    toggleTextSpacing.addEventListener('change', function() {
        if (this.checked) {
            document.body.classList.add('text-spaced');
        } else {
            document.body.classList.remove('text-spaced');
        }
        savePreferences();
    });
    
    // Event listener for save preferences button
    if (savePreferencesBtn) {
        savePreferencesBtn.addEventListener('click', function() {
            savePreferences();
            // Close modal
            const modal = bootstrap.Modal.getInstance(document.getElementById('visionModal'));
            if (modal) {
                modal.hide();
            }
        });
    }
    
    // Event listener for reset all preferences button
    if (resetAllPreferencesBtn) {
        resetAllPreferencesBtn.addEventListener('click', function() {
            resetPreferences();
        });
    }
    
    // Event listener for reset preferences button
    if (resetPreferencesBtn) {
        resetPreferencesBtn.addEventListener('click', function() {
            resetPreferences();
        });
    }
    
    // Load preferences on page load
    loadPreferences();
});