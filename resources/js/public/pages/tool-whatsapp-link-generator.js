window.waGenerator = function waGenerator() {
    return {
        countryCode: '234',
        phone: '',
        message: '',
        link: '',
        copied: false,
        _qr: null,

        generate() {
            const number = this.phone.replace(/\D/g, '');

            if (!number) {
                this.link = '';
                return;
            }

            const encoded = this.message ? '?text=' + encodeURIComponent(this.message) : '';
            this.link = 'https://wa.me/' + this.countryCode + number + encoded;
            this.$nextTick(() => this.renderQr());
        },

        renderQr() {
            const element = document.getElementById('wa-qr');

            if (!element || !this.link || typeof QRCode === 'undefined') {
                return;
            }

            element.replaceChildren();
            this._qr = new QRCode(element, {
                text: this.link,
                width: 128,
                height: 128,
                colorDark: '#000000',
                colorLight: '#ffffff',
            });
        },

        copyLink() {
            navigator.clipboard.writeText(this.link);
            this.copied = true;
            setTimeout(() => {
                this.copied = false;
            }, 2000);
        },
    };
};
