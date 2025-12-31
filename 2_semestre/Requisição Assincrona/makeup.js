const app = {
    formData: {
        tipo: '',
        marca: '',
         precoMax: '', 
        avaliacaoMin: ''
    },
    produtos: [],

    marcas: [
        'almay',
        'alva',
        'anna sui',
        'annabelle',
        'benefit',
        'boosh',
        "burt's bees",
        'butter london',
        "c'est moi",
        'cargo cosmetics',
        'china glaze',
        'clinique',
        'coastal classic creation',
        'colourpop',
        'covergirl',
        'dalish',
        'deciem',
        'dior',
        'dr. hauschka',
        'e.l.f.',
        'essie',
        'fenty',
        'glossier',
        'green people',
        'iman',
        "l'oreal",
        'lotus cosmetics usa',
        "maia's mineral galaxy",
        'marcelle',
        'marienatie',
        'maybelline',
        'milani',
        'mineral fusion',
        'misa',
        'mistura',
        'moov',
        'nudus',
        'nyx',
        'orly',
        'pacifica',
        'penny lane organics',
        'physicians formula',
        'piggy paint',
        'pure anada',
        'rejuva minerals',
        'revlon',
        "sally b's skin yummies",
        'salon perfect',
        'sante',
        'sinful colours',
        'smashbox',
        'stila',
        'suncoat',
        'w3llpeople',
        'wet n wild',
        'zorah',
        'zorah biocosmetiques'
    ],
    tipos: [
        'Blush',
        'Bronzer',
        'Eyebrow',
        'Eyeliner',
        'Eyeshadow',
        'Foundation',
        'Lip liner',
        'Lipstick',
        'Mascara',
        'Nail polish',
    ],

    async filtrar() {
        const filtros = [];
        if (this.formData.marca != '') {
            filtros.push(`brand=${this.formData.marca}`);
        }
        if (this.formData.tipo != '') {
            filtros.push(`product_type=${this.formData.tipo}`);
        }

        const url = `http://makeup-api.herokuapp.com/api/v1/products.json?${filtros.join('&')}`;
        
        try {
            const response = await fetch(url);
            if (!response.ok) {
                throw new Error(`Erro na rede: ${response.status}`);
            }
            let produtos = await response.json();

            if (this.formData.precoMax) {
                const precoMax = parseFloat(this.formData.precoMax);
                produtos = produtos.filter(produto => {
                    const precoProduto = parseFloat(produto.price) || 0;
                    return precoProduto <= precoMax;
                });
            }

            if (this.formData.avaliacaoMin) {
                const avaliacaoMin = parseFloat(this.formData.avaliacaoMin);
                produtos = produtos.filter(produto => {
                    const ratingProduto = parseFloat(produto.rating) || 0;
                    return ratingProduto >= avaliacaoMin;
                });
            }

            this.produtos = produtos;
        } catch (error) {
            console.error("Falha ao buscar produtos:", error);
    }
    }
}
document.addEventListener ("DOMContentLoaded", () => {
    PetiteVue.createApp({app}).mount();
});
// Fazer Preço e Avaliação