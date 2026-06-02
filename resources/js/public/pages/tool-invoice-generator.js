window.invoiceGenerator = function invoiceGenerator() {
    return {
        from: { name: '', email: '', address: '' },
        to: { name: '', email: '', address: '' },
        invoiceNumber: 'INV-001',
        invoiceDate: new Date().toISOString().split('T')[0],
        dueDate: '',
        items: [{ description: '', qty: 1, price: 0 }],
        taxType: 'none',
        customTax: 0,
        notes: '',

        addItem() {
            this.items.push({ description: '', qty: 1, price: 0 });
        },

        removeItem(index) {
            if (this.items.length > 1) {
                this.items.splice(index, 1);
            }
        },

        subtotal() {
            return this.items.reduce((sum, item) => sum + item.qty * item.price, 0);
        },

        taxRate() {
            if (this.taxType === 'vat') {
                return 7.5;
            }

            if (this.taxType === 'custom') {
                return this.customTax;
            }

            return 0;
        },

        taxAmount() {
            return Math.round(this.subtotal() * this.taxRate() / 100);
        },

        total() {
            return this.subtotal() + this.taxAmount();
        },

        printInvoice() {
            window.print();
        },
    };
};
