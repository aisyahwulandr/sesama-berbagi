<template>
    <div class="max-w-lg mx-auto bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-semibold text-center mb-4">Hubungi Kami</h2>
        <form @submit.prevent="submitForm">
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" id="name" v-model="name"
                    class="mt-1 p-2 block w-full border border-gray-300 rounded-md focus:ring-primary focus:border-primary"
                    required />
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" v-model="email"
                    class="mt-1 p-2 block w-full border border-gray-300 rounded-md focus:ring-primary focus:border-primary"
                    required />
            </div>

            <div class="mb-4">
                <label for="message" class="block text-sm font-medium text-gray-700">Pesan</label>
                <textarea id="message" v-model="message"
                    class="mt-1 p-2 block w-full border border-gray-300 rounded-md focus:ring-primary focus:border-primary"
                    rows="4" required></textarea>
            </div>

            <button type="submit"
                class="w-full bg-primary text-white py-2 px-4 rounded-md hover:bg-primaryhover transition">
                Kirim
            </button>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            name: '',
            email: '',
            message: ''
        };
    },
    methods: {
        submitForm() {
            alert(`Terima kasih, ${this.name}! Pesan Anda telah dikirim.`);
            this.name = '';
            this.email = '';
            this.message = '';
        }
    }
};
</script>