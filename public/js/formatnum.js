function formatNumber(input) {
    // Remove non-numeric characters
    let value = input.value.replace(/\D/g, '');

    // Check if input field is for CCCD or phone number
    let maxLength = input.id === 'cccd' ? 12 : 10;

    // Limit to the appropriate number of characters
    if (value.length > maxLength) {
        value = value.slice(0, maxLength);
    }

    // Format with spaces for better readability
    if (input.id === 'cccd') {
        // Format CCCD as XXXX XXXX XXXX (groups of 4)
        if (value.length > 4) {
            value = value.slice(0, 4) + ' ' + value.slice(4);
        }
        if (value.length > 9) { // 4 + 1 + 4 = 9
            value = value.slice(0, 9) + ' ' + value.slice(9);
        }
    } else if (input.id === 'soDienThoai') {
        // Format phone as XXXX XXX XXX (4-3-3 format)
        if (value.length > 4) {
            value = value.slice(0, 4) + ' ' + value.slice(4);
        }
        if (value.length > 8) { // 4 + 1 + 3 = 8
            value = value.slice(0, 8) + ' ' + value.slice(8);
        }
    }

    input.value = value;
}
