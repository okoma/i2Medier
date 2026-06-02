window.costCalculator = function costCalculator() {
    return {
        projectType: 'brochure',
        features: { blog: false, booking: false, payment: false, animations: false, urgent: false },
        minCost: 0,
        maxCost: 0,
        emailSubmitted: false,
        gateEmail: '',
        gateError: '',

        projectPrices: {
            brochure: { min: 150000, max: 400000 },
            business: { min: 400000, max: 900000 },
            ecommerce: { min: 600000, max: 1500000 },
            webapp: { min: 1200000, max: 4000000 },
        },

        featurePrices: {
            blog: { min: 100000, max: 250000 },
            booking: { min: 150000, max: 400000 },
            payment: { min: 100000, max: 300000 },
            animations: { min: 80000, max: 200000 },
        },

        updateEstimate() {
            const base = this.projectPrices[this.projectType];
            let min = base.min;
            let max = base.max;

            for (const [key, active] of Object.entries(this.features)) {
                if (active && key !== 'urgent' && this.featurePrices[key]) {
                    min += this.featurePrices[key].min;
                    max += this.featurePrices[key].max;
                }
            }

            if (this.features.urgent) {
                min = Math.round(min * 1.2);
                max = Math.round(max * 1.2);
            }

            this.minCost = min;
            this.maxCost = max;
        },

        formatRange() {
            return '₦' + this.minCost.toLocaleString() + ' – ₦' + this.maxCost.toLocaleString();
        },

        async submitEmail() {
            this.gateError = '';

            const response = await fetch('/tools/leads', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify({ tool: 'website-cost-calculator', email: this.gateEmail }),
            });
            const data = await response.json();

            if (data.success) {
                this.emailSubmitted = true;
                return;
            }

            this.gateError = data.error || 'Something went wrong. Try again.';
        },
    };
};
