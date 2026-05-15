/* custom phone-mask */
const phoneInput = document.getElementById('phone');

phoneInput.addEventListener('input', function (e) {
    let value = e.target.value.replace(/\D/g, '');

    if (!value.startsWith('7') && !value.startsWith('8')) {
        value = '7' + value;
    }
    if (value.length > 11) value = value.substring(0, 11);

    let formattedValue = '+7';
    if (value.length >= 2) {
        formattedValue += '(' + value.substring(1, 4);
    }
    if (value.length >= 5) {
        formattedValue += ') ' + value.substring(4, 7);
    } else if (value.length > 4) {
        formattedValue += ') ' + value.substring(4);
    }
    if (value.length >= 8) {
        formattedValue += '-' + value.substring(7, 9);
    } else if (value.length > 7) {
        formattedValue += '-' + value.substring(7);
    }
    if (value.length >= 10) {
        formattedValue += '-' + value.substring(9, 11);
    } else if (value.length > 9) {
        formattedValue += '-' + value.substring(9);
    }

    e.target.value = formattedValue;
});

/* bakspace button */
phoneInput.addEventListener('keydown', function (e) {
    if (!/[0-9]/.test(e.key) && e.key !== 'Backspace') {
        e.preventDefault();
    }
});