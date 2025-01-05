<template>
    <div class="min-h-screen bg-gray-100 p-8">
        <div class="bg-white shadow-lg rounded-lg p-6 max-w-4xl mx-auto">
            <!-- Gambar Cover -->
            <div class="mb-4">
                <img :src="program.coverImage" alt="Cover Program" class="w-full rounded-lg shadow-md" />
            </div>

            <!-- Judul -->
            <h1 class="text-2xl font-bold text-primary mb-4">{{ program.title }}</h1>

            <!-- Deskripsi Program -->
            <section class="mb-6">
                <h2 class="text-xl font-semibold text-secondary mb-2">Deskripsi Program</h2>
                <p class="text-gray-700">{{ program.description }}</p>
            </section>

            <!-- Fundraiser -->
            <section class="mb-6">
                <h2 class="text-xl font-semibold text-secondary mb-2">Penggalang Program</h2>
                <p class="text-gray-700">
                    Nama: <strong>{{ program.fundraiser.name }}</strong><br />
                    Instansi: <strong>{{ program.fundraiser.organization }}</strong>
                </p>
            </section>

            <!-- Status Terbaru -->
            <section class="mb-6">
                <h2 class="text-xl font-semibold text-secondary mb-2">Status Terbaru</h2>
                <div class="p-4 border border-gray-300 rounded-lg">
                    <!-- Status Sedang Berlangsung -->
                    <template v-if="program.status.type === 'Sedang Berlangsung'">
                        <p class="font-semibold text-primary">Sedang Berlangsung</p>
                    </template>

                    <!-- Status Pencairan Dana -->
                    <template v-else-if="program.status.type === 'Pencairan Dana'">
                        <p class="font-semibold text-primary">Pencairan Dana</p>
                        <p class="mt-2">
                            Rekening: {{ program.status.details.account.number }}
                            (Pemilik: {{ program.status.details.account.owner }})
                        </p>
                        <p>Rincian Distribusi Dana: {{ program.status.details.distribution }}</p>
                    </template>

                    <!-- Status Proses Penyaluran -->
                    <template v-else-if="program.status.type === 'Proses Penyaluran'">
                        <p class="font-semibold text-primary">Proses Penyaluran</p>
                        <div class="mt-4">
                            <h3 class="font-semibold text-secondary mb-2">Dokumentasi Penyaluran:</h3>
                            <div class="grid grid-cols-3 gap-4">
                                <div v-for="(media, index) in program.status.details.media" :key="index">
                                    <img :src="media.url" alt="Dokumentasi" class="rounded-lg" />
                                </div>
                            </div>
                        </div>
                    </template>

                    <!-- Status Telah Disalurkan -->
                    <template v-else-if="program.status.type === 'Telah Disalurkan'">
                        <p class="font-semibold text-primary">Telah Disalurkan</p>
                        <div class="mt-4">
                            <h3 class="font-semibold text-secondary mb-2">Dokumentasi Penyaluran:</h3>
                            <div class="grid grid-cols-3 gap-4">
                                <div v-for="(media, index) in program.status.details.media" :key="index">
                                    <img :src="media.url" alt="Dokumentasi" class="rounded-lg" />
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
            </section>

            <!-- Donasi Masuk -->
            <section class="mb-6">
                <h2 class="text-xl font-semibold text-secondary mb-2">Donasi Masuk</h2>
                <ul class="divide-y divide-gray-300">
                    <li v-for="(donation, index) in program.donations" :key="index" class="py-2">
                        <p>
                            <strong>{{ donation.name }}</strong> menyumbang
                            <strong>Rp. {{ donation.amount }}</strong><br />
                            <span class="text-gray-600 text-sm">{{ donation.date }}</span>
                        </p>
                    </li>
                </ul>
            </section>

            <!-- Pesan Donatur -->
            <section class="mb-6">
                <h2 class="text-xl font-semibold text-secondary mb-2">Pesan Donatur</h2>
                <ul class="divide-y divide-gray-300">
                    <li v-for="(message, index) in program.messages" :key="index" class="py-2">
                        <p>
                            <strong>{{ message.name }}</strong>: {{ message.content }}
                            <br />
                            <span class="text-gray-600 text-sm">
                                {{ message.date }}
                            </span>
                        </p>
                    </li>
                </ul>
            </section>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            program: {
                coverImage: "https://via.placeholder.com/800x400",
                title: "Program Bantuan Pendidikan",
                description: "Program ini bertujuan untuk mendukung pendidikan anak-anak yang kurang mampu.",
                fundraiser: {
                    name: "Yayasan Pendidikan Harapan",
                    organization: "Yayasan Pendidikan Indonesia"
                },
                status: {
                    type: "Sedang Berlangsung", // Bisa "Pencairan Dana", "Proses Penyaluran", atau "Telah Disalurkan"
                    details: {
                        account: {
                            number: "1234-XXXX-5678",
                            owner: "Yayasan Pendidikan Harapan"
                        },
                        distribution: "Dana akan digunakan untuk membeli perlengkapan sekolah.",
                        media: [
                            { url: "https://via.placeholder.com/150" },
                            { url: "https://via.placeholder.com/150" },
                            { url: "https://via.placeholder.com/150" }
                        ]
                    }
                },
                donations: [
                    {
                        name: "John Doe",
                        amount: 500000,
                        date: "2025-01-01 10:00"
                    },
                    {
                        name: "Jane Smith",
                        amount: 250000,
                        date: "2025-01-02 15:30"
                    }
                ],
                messages: [
                    {
                        name: "John Doe",
                        content: "Semoga program ini berjalan lancar!",
                        date: "2025-01-01 14:30"
                    },
                    {
                        name: "Jane Smith",
                        content: "Terima kasih sudah menggalang dana untuk pendidikan.",
                        date: "2025-01-02 08:45"
                    }
                ]
            }
        };
    }
};
</script>

<style scoped></style>
