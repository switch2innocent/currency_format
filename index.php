<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Currency Input Auto 2 Decimals</title>
</head>

<body>

    <label for="currency-input">Enter amount:</label>
    <input type="text" id="currency-input" placeholder="0.00" />

    <script>
        const input = document.getElementById('currency-input');

        function formatCurrency(value) {
            // Remove all non-digit characters
            value = value.replace(/\D/g, '');

            // Parse value as integer cents
            let intValue = parseInt(value, 10);
            if (isNaN(intValue)) intValue = 0;

            // Convert to a fixed 2-decimal string
            let formatted = (intValue / 100).toLocaleString('en-US', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2,
            });

            return formatted;
        }

        input.addEventListener('input', (e) => {
            const cursorPosition = e.target.selectionStart;
            const oldLength = e.target.value.length;

            e.target.value = formatCurrency(e.target.value);

            // Adjust cursor position to the right place after formatting
            const newLength = e.target.value.length;
            e.target.selectionEnd = cursorPosition + (newLength - oldLength);
        });

        // Initialize with 0.00
        input.value = formatCurrency('');
    </script>

</body>

</html>