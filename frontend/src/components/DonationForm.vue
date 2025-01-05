<template>
    <div class="bg-white shadow-lg rounded-lg p-8 max-w-lg mx-auto">
        <h2 class="text-2xl font-bold text-center text-primary mb-6">Formulir Donasi</h2>
        <p class="text-center text-gray-600 mb-6">Bantu kami untuk terus berbagi dengan sesama.</p>

        <form @submit.prevent="submitDonation">
            <!-- Nama Lengkap -->
            <div class="mb-4">
                <label for="fullName" class="block text-ternary font-medium mb-2">Nama Lengkap</label>
                <input type="text" id="fullName" v-model="donateName"
                    class="w-full border border-primary rounded-lg p-2" :disabled="isAnonymous" required />
            </div>

            <!-- Pilihan Anonim -->
            <div class="mb-4 flex items-center">
                <input type="checkbox" id="anonymous" v-model="isAnonymous" class="mr-2" />
                <label for="anonymous" class="text-ternary font-medium">Donasi secara anonim</label>
            </div>

            <!-- Email Aktif -->
            <div class="mb-4">
                <label for="email" class="block text-ternary font-medium mb-2">Email Aktif</label>
                <input type="email" id="email" v-model="donateEmail"
                    class="w-full border border-primary rounded-lg p-2" required />
            </div>

            <!-- Jumlah Donasi -->
            <div class="mb-4">
                <label for="amount" class="block text-ternary font-medium mb-2">Jumlah Donasi</label>
                <input type="number" id="amount" v-model="donationAmount"
                    class="w-full border border-primary rounded-lg p-2" required min="10000" />
            </div>

            <!-- Metode Pembayaran -->
            <div class="mb-4">
                <label for="paymentMethod" class="block text-ternary font-medium mb-2">Metode Pembayaran</label>
                <select id="paymentMethod" v-model="selectedPaymentMethod"
                    class="w-full border border-primary rounded-lg p-2" required>
                    <option value="">Pilih Metode Pembayaran</option>
                    <option value="bankTransfer">Transfer Bank</option>
                    <option value="eWallet">E-Wallet</option>
                </select>
            </div>

            <!-- Informasi Tambahan -->
            <div class="mb-4">
                <label for="note" class="block text-ternary font-medium mb-2">Catatan (opsional)</label>
                <textarea id="note" v-model="note"
                    class="w-full border border-primary rounded-lg p-2"
                    rows="3"></textarea>
            </div>

            <!-- Tombol Submit -->
            <button type="submit"
                class="w-full py-2 px-4 bg-primary text-white font-semibold rounded-md hover:bg-primaryhover transition duration-300">
                Donasi Sekarang
            </button>
        </form>

        <!-- Modal Popup -->
        <div v-if="showModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
            <div class="bg-white p-6 rounded-lg shadow-lg w-3/4 max-w-md">
                <h3 class="text-xl font-semibold mb-4">Terima Kasih!</h3>
                <p class="mb-4">{{ modalMessage }}</p>
                <button @click="closeModal"
                    class="w-full py-2 px-4 bg-primary text-white font-semibold rounded-md hover:bg-primaryhover transition duration-300">
                    Tutup
                </button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            donateName: '',
            donationAmount: null,
            donateEmail: '',
            selectedPaymentMethod: '',
            note: '',
            isAnonymous: false,
            showModal: false,
            modalMessage: ''
        };
    },
    watch: {
        isAnonymous(newValue) {
            if (newValue) {
                this.donateName = 'Anonim';
            }
        }
    },
    methods: {
        submitDonation() {
            // Validasi dan kirim data donasi
            if (!this.donateName || !this.donationAmount || !this.donateEmail || !this.selectedPaymentMethod ) {
                alert("Harap mengisi semua data.");
                return;
            }

            this.modalMessage = this.isAnonymous 
                ? `Donasi anonim Anda sebesar Rp. ${this.donationAmount} telah diterima.` 
                : `Terima kasih, ${this.donateName}! Donasi Anda sebesar Rp. ${this.donationAmount} telah diterima.`;

            this.showModal = true;
            this.resetForm();
        },
        closeModal() {
            this.showModal = false;
        },
        resetForm() {
            this.donateName = '';
            this.donationAmount = null;
            this.donateEmail = '';
            this.selectedPaymentMethod = '';
            this.note = '';
            this.isAnonymous = false;
        }
    }
};
</script>

<style scoped>

</style>
