<template>
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md mx-auto">
        <h2 class="text-2xl font-semibold text-center text-primary mb-6">Donasi Sekarang</h2>
        <p class="text-center text-gray-600 mb-6">Bantu kami untuk terus berbagi dengan sesama.</p>

        <!-- Form Donasi -->
        <form @submit.prevent="submitDonation">
            <div class="mb-4">
                <label for="amount" class="block text-sm font-medium text-gray-700">Jumlah Donasi</label>
                <input type="number" id="amount" v-model="donationAmount"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary"
                    placeholder="Masukkan jumlah donasi" min="1" required />
            </div>

            <!-- Pilihan Metode Pembayaran -->
            <div class="mb-4">
                <label for="paymentMethod" class="block text-sm font-medium text-gray-700">Metode Pembayaran</label>
                <select id="paymentMethod" v-model="paymentMethod"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary"
                    required>
                    <option value="bank">Transfer Bank</option>
                    <option value="e-wallet">E-wallet (OVO, GoPay, DANA)</option>
                    <option value="credit-card">Kartu Kredit</option>
                </select>
            </div>

            <!-- Tombol Submit -->
            <button type="submit"
                class="w-full py-2 px-4 bg-primary text-white font-semibold rounded-md hover:bg-primaryhover transition duration-300">
                Donasi Sekarang
            </button>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            donationAmount: 0,
            paymentMethod: 'bank',
        };
    },
    methods: {
        submitDonation() {
            if (this.donationAmount > 0) {
                alert(`Terima kasih atas donasi Anda sebesar Rp${this.donationAmount} melalui ${this.paymentMethod}.`);
                // Anda dapat mengganti alert dengan logika pengiriman data ke server atau API
                this.donationAmount = 0;
                this.paymentMethod = 'bank';
            } else {
                alert('Jumlah donasi harus lebih dari 0.');
            }
        },
    },
};
</script>

<style scoped>
/* Styling tambahan jika diperlukan */
</style>