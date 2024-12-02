<template>
    <div>
        <!-- Header Section -->
        <div class="p-5 mb-4 bg-gray-100 rounded-lg">
            <div class="container py-5 text-center">
                <h1 class="text-4xl font-bold text-ternary">Sesama Berbagi</h1>
                <p class="text-lg text-gray-700 mt-2">
                    Bersama kita bisa membantu mereka yang membutuhkan
                </p>
                <div class="mt-4 flex justify-center">
                    <input type="text" v-model="searchQuery" placeholder="Cari donasi..."
                        class="w-full max-w-md px-4 py-2 border border-ternary rounded-lg focus:outline-none focus:border-primary" />
                    <button @click="searchDonations"
                        class="ml-2 bg-ternary text-white px-4 py-2 rounded-lg hover:bg-ternaryhover">
                        Cari
                    </button>
                </div>
            </div>
        </div>

        <!-- Filters & Sort Section -->
        <div class="container mx-auto mb-6 flex flex-wrap gap-4">
            <!-- Filter by Category -->
            <div class="flex flex-col">
                <label for="category" class="text-gray-700 font-medium">Kategori</label>
                <select id="category" v-model="selectedCategory"
                    class="mt-2 border border-ternary rounded-lg p-2 focus:ring-primary focus:border-primary">
                    <option value="">Semua</option>
                    <option v-for="category in categories" :key="category" :value="category">
                        {{ category }}
                    </option>
                </select>
            </div>

            <!-- Sort Options -->
            <div class="flex flex-col">
                <label for="sort" class="text-gray-700 font-medium">Urutkan</label>
                <select id="sort" v-model="sortOption"
                    class="mt-2 border border-ternary rounded-lg p-2 focus:ring-primary focus:border-primary">
                    <option value="newest">Terbaru</option>
                    <option value="oldest">Terlama</option>
                    <option value="highest">Jumlah Terkumpul Tertinggi</option>
                    <option value="lowest">Jumlah Terkumpul Terendah</option>
                </select>
            </div>
        </div>

        <!-- Filters & Sort Section -->
        <!-- <div class="container mx-auto mb-6 flex justify-end">
            <div class="flex flex-wrap gap-4"> -->
                <!-- Filter by Category -->
                <!-- <div class="flex flex-col">
                    <label for="category" class="text-gray-700 font-medium">Kategori</label>
                    <select id="category" v-model="selectedCategory"
                        class="mt-2 border border-ternary rounded-lg p-2 focus:ring-primary focus:border-primary">
                        <option value="">Semua</option>
                        <option v-for="category in categories" :key="category" :value="category">
                            {{ category }}
                        </option>
                    </select>
                </div> -->

                <!-- Sort Options -->
                <!-- <div class="flex flex-col">
                    <label for="sort" class="text-gray-700 font-medium">Urutkan</label>
                    <select id="sort" v-model="sortOption"
                        class="mt-2 border border-ternary rounded-lg p-2 focus:ring-primary focus:border-primary">
                        <option value="newest">Terbaru</option>
                        <option value="oldest">Terlama</option>
                        <option value="highest">Jumlah Terkumpul Tertinggi</option>
                        <option value="lowest">Jumlah Terkumpul Terendah</option>
                    </select>
                </div> -->
            <!-- </div>
        </div> -->

        <!-- Donation Cards Section -->
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div v-for="donation in filteredDonations" :key="donation.id" class="bg-secondary p-6 rounded-lg relative">
                <img :src="donation.image" :alt="donation.title" class="rounded-lg w-full h-48 object-cover mb-4" />
                <h3 class="text-xl font-semibold text-ternary mb-2">{{ donation.title }}</h3>
                <p class="text-gray-700 mb-4">
                    {{ donation.shortDescription }}
                </p>

                <!-- Progress Bar -->
                <div class="w-full bg-gray-300 rounded-full h-2.5 mb-2 relative">
                    <div class="bg-primary h-2.5 rounded-full" :style="{ width: donation.progress + '%' }"></div>
                    <span class="absolute right-0 top-[-1.5rem] text-sm font-medium text-primary">
                        {{ donation.progress }}%
                    </span>
                </div>
                <p class="text-sm text-gray-600 mb-4">
                    {{ currencyFormat(donation.raised) }} terkumpul dari
                    {{ currencyFormat(donation.target) }}
                </p>

                <div class="flex justify-between">
                    <button @click="viewDetails(donation)"
                        class="bg-primary text-white font-semibold px-4 py-2 rounded hover:bg-primaryhover">
                        Detail
                    </button>
                    <button @click="goToDonation"
                        class="bg-ternary text-white font-semibold px-4 py-2 rounded hover:bg-ternaryhover">
                        Donasi
                    </button>
                </div>
            </div>
        </div>

        <!-- Modal Detail Donasi -->
        <div v-if="selectedDonation" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center">
            <div class="bg-white p-6 rounded-lg max-w-lg w-full">
                <h3 class="text-xl font-semibold text-ternary mb-4">
                    {{ selectedDonation.title }}
                </h3>
                <img :src="selectedDonation.image" :alt="selectedDonation.title"
                    class="rounded-lg w-full h-48 object-cover mb-4" />
                <p class="text-gray-700 mb-4">{{ selectedDonation.description }}</p>
                <button @click="closeModal" class="text-warning font-semibold">
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
            donations: [
                {
                    id: 1,
                    title: "Bantu Anak Yatim",
                    description:
                        "Bantuan Anda dapat meringankan beban anak-anak yatim yang membutuhkan dukungan pendidikan dan kesejahteraan.",
                    category: "Kesejahteraan",
                    target: 10000000,
                    raised: 5000000,
                    createdAt: new Date("2024-12-01"),
                    image: "https://via.placeholder.com/300",
                },
                {
                    id: 2,
                    title: "Bantu Korban Bencana",
                    description: "Bantu mereka yang terdampak bencana alam untuk membangun kembali fasilitas yang terdampak.",
                    category: "Bencana",
                    target: 15000000,
                    raised: 12000000,
                    createdAt: new Date("2024-12-02"),
                    image: "https://via.placeholder.com/300",
                },
                {
                    id: 3,
                    title: "Bantu Pendidikan Anak",
                    description: "Donasi Anda akan membantu anak-anak kurang mampu untuk mendapatkan akses pendidikan yang layak.",
                    category: "Pendidikan",
                    target: 15000000,
                    raised: 12000000,
                    createdAt: new Date("2024-12-02"),
                    image: "https://via.placeholder.com/300",
                },
                {
                    id: 4,
                    title: "Bantu Pembangunan Masjid",
                    description: "Donasi Anda membantu pembangunan tempat ibadah yang nyaman dan layak bagi umat.",
                    category: "Kesejahteraan",
                    target: 25000000,
                    raised: 12000000,
                    createdAt: new Date("2024-12-02"),
                    image: "https://via.placeholder.com/300",
                },
                {
                    id: 5,
                    title: "Bantu Biaya Pengobatan",
                    description: "Bantuan Anda akan meringankan beban biaya pengobatan bagi mereka yang kurang mampu.",
                    category: "Kesehatan",
                    target: 80000000,
                    raised: 12000000,
                    createdAt: new Date("2024-12-02"),
                    image: "https://via.placeholder.com/300",
                },
                {
                    id: 6,
                    title: "Bantu Lansia",
                    description: "Donasi Anda akan memberikan kehidupan yang lebih baik untuk lansia yang memerlukan.",
                    category: "Kesejahteraan",
                    target: 15000000,
                    raised: 12000000,
                    createdAt: new Date("2024-12-02"),
                    image: "https://via.placeholder.com/300",
                },
                {
                    id: 7,
                    title: "Bantu Panti Asuhan",
                    description: "Dukung panti asuhan untuk memberikan lingkungan yang sehat dan bahagia bagi anak-anak",
                    category: "Kesejahteraan",
                    target: 15000000,
                    raised: 15000000,
                    createdAt: new Date("2024-12-03"),
                    image: "https://via.placeholder.com/300",
                },
                {
                    id: 8,
                    title: "Bantu Kesejahteraan Masyarakat",
                    description: "Kontribusi Anda akan membantu program-program peningkatan kesejahteraan masyarakat.",
                    category: "Kesejahteraan",
                    target: 18000000,
                    raised: 17000000,
                    createdAt: new Date("2024-12-04"),
                    image: "https://via.placeholder.com/300",
                },
                {
                    id: 9,
                    title: "Bantu Penghijauan",
                    description: "Bantu kami menanam pohon untuk menjaga lingkungan tetap hijau dan sehat.",
                    category: "Kesejahteraan",
                    target: 25000000,
                    raised: 10000000,
                    createdAt: new Date("2024-12-05"),
                    image: "https://via.placeholder.com/300",
                }
            ],
            searchQuery: "",
            selectedCategory: "",
            sortOption: "newest",
            selectedDonation: null,
            categories: ["Pendidikan", "Bencana", "Kesejahteraan"],
        };
    },
    computed: {
        filteredDonations() {
            let filtered = this.donations;

            if (this.selectedCategory) {
                filtered = filtered.filter(
                    (donation) => donation.category === this.selectedCategory
                );
            }

            if (this.searchQuery) {
                filtered = filtered.filter((donation) =>
                    donation.title.toLowerCase().includes(this.searchQuery.toLowerCase())
                );
            }

            if (this.sortOption === "newest") {
                filtered.sort((a, b) => b.createdAt - a.createdAt);
            } else if (this.sortOption === "oldest") {
                filtered.sort((a, b) => a.createdAt - b.createdAt);
            } else if (this.sortOption === "highest") {
                filtered.sort((a, b) => b.raised - a.raised);
            } else if (this.sortOption === "lowest") {
                filtered.sort((a, b) => a.raised - b.raised);
            }

            return filtered.map((donation) => ({
                ...donation,
                progress: Math.min(
                    Math.round((donation.raised / donation.target) * 100),
                    100
                ),
                shortDescription: donation.description.split(" ").slice(0, 11).join(" ") + " ...",
            }));
        },
    },
    methods: {
        viewDetails(donation) {
            this.selectedDonation = donation;
        },
        closeModal() {
            this.selectedDonation = null;
        },
        goToDonation() {
            this.$router.push("/donation");
        },
        currencyFormat(value) {
            if (value === null || value === undefined) return 'Rp. 0,00';
            return new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR",
                minimumFractionDigits: 2,
                maximumFractionDigits: 2,
            }).format(value);
        }
    },
};
</script>

<style scoped>
/* Tambahkan styling tambahan jika diperlukan */
</style>