document.getElementById('payment-select').addEventListener('change', function () {
        const selected = this.value;
        document.getElementById('payment-summary').textContent = selected;
    });