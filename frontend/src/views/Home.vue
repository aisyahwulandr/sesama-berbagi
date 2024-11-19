<template>
    <div> <!-- Root element yang membungkus semua elemen lainnya -->
        <!-- Header Section -->
        <div class="p-5 mb-4 bg-gray-100 rounded-lg">
            <div class="container py-5 text-center">
                <h1 class="text-4xl font-bold text-ternary">Sesama Berbagi</h1>
                <p class="text-lg text-gray-700 mt-2">Bersama kita bisa membantu mereka yang membutuhkan</p>
                <div class="mt-4 flex justify-center">
                    <input type="text" placeholder="Cari donasi..."
                        class="w-full max-w-md px-4 py-2 border border-ternary rounded-lg focus:outline-none focus:border-primary">
                    <button class="ml-2 bg-ternary text-white px-4 py-2 rounded-lg hover:bg-ternaryhover">
                        Cari
                    </button>
                </div>
            </div>
        </div>

        <!-- Donation Cards Section -->
        <div class="container mx-auto py-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-secondary p-6 rounded-lg">
                <img src="https://via.placeholder.com/300" alt="Bantu Anak Yatim"
                    class="rounded-lg w-full h-48 object-cover mb-4">
                <h3 class="text-xl font-semibold text-ternary mb-2">Bantu Anak Yatim</h3>
                <p class="text-gray-700 mb-4">Bantuan Anda dapat meringankan beban anak-anak yatim yang membutuhkan dukungan pendidikan dan kesejahteraan.</p>
                <button @click="goToDonation" class="bg-ternary text-white font-semibold px-4 py-2 rounded hover:bg-primaryhover">
                    Donasi Sekarang
                </button>
            </div>
            <div class="bg-secondary p-6 rounded-lg">
                <img src="https://via.placeholder.com/300" alt="Bantu Korban Bencana"
                    class="rounded-lg w-full h-48 object-cover mb-4">
                <h3 class="text-xl font-semibold text-ternary mb-2">Bantu Korban Bencana</h3>
                <p class="text-gray-700 mb-4">Salurkan bantuan untuk mereka yang terdampak bencana alam, memberikan mereka kebutuhan dasar dan perlindungan.</p>
                <button @click="goToDonation" class="bg-ternary text-white font-semibold px-4 py-2 rounded hover:bg-primaryhover">
                    Donasi Sekarang
                </button>
            </div>
            <div class="bg-secondary p-6 rounded-lg">
                <img src="https://via.placeholder.com/300" alt="Bantu Pendidikan Anak"
                    class="rounded-lg w-full h-48 object-cover mb-4">
                <h3 class="text-xl font-semibold text-ternary mb-2">Bantu Pendidikan Anak</h3>
                <p class="text-gray-700 mb-4">Donasi Anda akan membantu anak-anak kurang mampu untuk mendapatkan akses pendidikan yang layak.</p>
                <button @click="goToDonation" class="bg-ternary text-white font-semibold px-4 py-2 rounded hover:bg-primaryhover">
                    Donasi Sekarang
                </button>
            </div>
            <div class="bg-secondary p-6 rounded-lg">
                <img src="https://via.placeholder.com/300" alt="Bantu Pembangunan Masjid"
                    class="rounded-lg w-full h-48 object-cover mb-4">
                <h3 class="text-xl font-semibold text-ternary mb-2">Bantu Pembangunan Masjid</h3>
                <p class="text-gray-700 mb-4">Donasi Anda membantu pembangunan tempat ibadah yang nyaman dan layak bagi umat.</p>
                <button @click="goToDonation" class="bg-ternary text-white font-semibold px-4 py-2 rounded hover:bg-primaryhover">
                    Donasi Sekarang
                </button>
            </div>
            <div class="bg-secondary p-6 rounded-lg">
                <img src="https://via.placeholder.com/300" alt="Bantu Biaya Pengobatan"
                    class="rounded-lg w-full h-48 object-cover mb-4">
                <h3 class="text-xl font-semibold text-ternary mb-2">Bantu Biaya Pengobatan</h3>
                <p class="text-gray-700 mb-4">Bantuan Anda akan meringankan beban biaya pengobatan bagi mereka yang kurang mampu.</p>
                <button @click="goToDonation" class="bg-ternary text-white font-semibold px-4 py-2 rounded hover:bg-primaryhover">
                    Donasi Sekarang
                </button>
            </div>
            <div class="bg-secondary p-6 rounded-lg">
                <img src="https://via.placeholder.com/300" alt="Bantu Lansia"
                    class="rounded-lg w-full h-48 object-cover mb-4">
                <h3 class="text-xl font-semibold text-ternary mb-2">Bantu Lansia</h3>
                <p class="text-gray-700 mb-4">Donasi Anda akan memberikan kehidupan yang lebih baik untuk lansia yang memerlukan.</p>
                <button @click="goToDonation" class="bg-ternary text-white font-semibold px-4 py-2 rounded hover:bg-primaryhover">
                    Donasi Sekarang
                </button>
            </div>
            <div class="bg-secondary p-6 rounded-lg">
                <img src="https://via.placeholder.com/300" alt="Bantu Panti Asuhan"
                    class="rounded-lg w-full h-48 object-cover mb-4">
                <h3 class="text-xl font-semibold text-ternary mb-2">Bantu Panti Asuhan</h3>
                <p class="text-gray-700 mb-4">Dukung panti asuhan untuk memberikan lingkungan yang sehat dan bahagia bagi anak-anak.</p>
                <button @click="goToDonation" class="bg-ternary text-white font-semibold px-4 py-2 rounded hover:bg-primaryhover">
                    Donasi Sekarang
                </button>
            </div>
            <div class="bg-secondary p-6 rounded-lg">
                <img src="https://via.placeholder.com/300" alt="Bantu Kesejahteraan Masyarakat"
                    class="rounded-lg w-full h-48 object-cover mb-4">
                <h3 class="text-xl font-semibold text-ternary mb-2">Bantu Kesejahteraan Masyarakat</h3>
                <p class="text-gray-700 mb-4">Kontribusi Anda akan membantu program-program peningkatan kesejahteraan masyarakat.</p>
                <button @click="goToDonation" class="bg-ternary text-white font-semibold px-4 py-2 rounded hover:bg-primaryhover">
                    Donasi Sekarang
                </button>
            </div>
            <div class="bg-secondary p-6 rounded-lg">
                <img src="https://via.placeholder.com/300" alt="Bantu Penghijauan"
                    class="rounded-lg w-full h-48 object-cover mb-4">
                <h3 class="text-xl font-semibold text-ternary mb-2">Bantu Penghijauan</h3>
                <p class="text-gray-700 mb-4">Bantu kami menanam pohon untuk menjaga lingkungan tetap hijau dan sehat.</p>
                <button @click="goToDonation" class="bg-ternary text-white font-semibold px-4 py-2 rounded hover:bg-primaryhover">
                    Donasi Sekarang
                </button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    methods: {
        goToDonation() {
            this.$router.push('/donation');
        },
    },
};
</script>
