<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>jQuery Currency Input Auto 2 Decimals</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

    <label for="currency-input">Enter amount:</label>
    <input type="text" id="currency-input" placeholder="0.00" />

    <script>
        $(document).ready(function() {
            function formatCurrency(value) {
                // Remove all non-digit characters
                value = value.replace(/\D/g, '');

                // Parse as integer cents
                let intValue = parseInt(value, 10);
                if (isNaN(intValue)) intValue = 0;

                // Format number with commas and 2 decimals
                return (intValue / 100).toLocaleString('en-US', {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                });
            }

            $('#currency-input').on('input', function() {
                const $this = $(this);
                const cursorPosition = this.selectionStart;
                const oldLength = $this.val().length;

                $this.val(formatCurrency($this.val()));

                const newLength = $this.val().length;
                this.selectionEnd = cursorPosition + (newLength - oldLength);
            });

            // Initialize input value
            $('#currency-input').val(formatCurrency(''));
        });
    </script>

</body>

</html>